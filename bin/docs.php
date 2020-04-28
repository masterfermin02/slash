#!/usr/bin/php
<?php

require_once 'vendor/autoload.php';

use function Slash\mapWith;
use function Slash\pipeLine;
use function Slash\filterWith;
use function Slash\rejectWith;
use function Slash\sortBy;
use function Slash\getWith;
use function Slash\useWith;
use function Slash\curry_right;
use function Slash\any;
use function Slash\firstWith;

$sourceDir = $argv[1];
$destFilepath = $argv[2];
makeDocs($sourceDir, $destFilepath);

function nameSorted()
{
    return useWith('strnatcmp',getWith('name'), getWith('name'));
}

function makeDocs($sourceDir, $destFilepath)
{
    $files = iterator_to_array(new FilesystemIterator($sourceDir, FilesystemIterator::SKIP_DOTS));
    $nameFilter = nameSorted();
    $ops = pipeLine(
        filterWith(function ($fileinfo) { return !$fileinfo->isDir(); }),
        mapWith(function ($fileinfo) { return pathinfo($fileinfo)['filename']; }),
        mapWith(function ($name) { return "src/$name.php"; }),
        filterWith(function ($filepath) { return file_exists($filepath); }),
        mapWith('createOp'),
        filterWith(function ($op) { return !$op->isIncomplete; }),
        sortBy($nameFilter)
    )($files);

    $opDocs = pipeLine(
        mapWith('renderOp'),
        joinWith("\n")
    )($ops);

    $tableOfContents = renderTableOfContents($ops);

    file_put_contents($destFilepath, "$tableOfContents\n\n$opDocs");
}

function createOp($filepath)
{
    $docblock = extractDocblockString($filepath);
    if(!$docblock) {
        return (object) ["isIncomplete" => true];
    }

    $op = parseDocblock($docblock);

    $op->name = pathinfo($filepath)['filename'];
    $op->signature = extractFunctionSignature($filepath);

    $op->slug = pipeLine(
        mapWith('strtolower'),
        joinWith("--")
    )(array_merge([$op->name], $op->aliases));

    return $op;
}

function joinWith($func) {
    return curry_right('join', $func);
}

function extractDocblockString($filepath)
{
    $content = file_get_contents($filepath);
    $matches = [];

    // Extracts docblock
    $hasOp = preg_match('/\/\**\n([\s\S]+?)\*\//', $content, $matches);
    $docblock = $hasOp ? $matches[1] : '';

    // Removes leading asterisks and whitespace
    $docblock = preg_replace('/^[ ]*\*[ ]*(.*)$/m', '$1', $docblock);
    $docblock = trim($docblock);

    return $docblock;
}

function extractFunctionSignature($filepath)
{
    $content = file_get_contents($filepath);
    $hasFunction = preg_match('/^function &?(\w+\([^\)]*\))$/m', $content, $matches);
    $signature = $hasFunction ? $matches[1] : '';
    return $signature;
}

function parseDocblock($docblock)
{

    $op = (object) [];
    $lines = explode("\n", $docblock);

    // Incomplete
    $op->isIncomplete = any($lines, function ($line) { return strpos($line, '@incomplete') === 0; });

    // Description
    $op->description = pipeLine(
      filterWith(function ($line) { return strpos($line, '@') === false; }) ,
        joinWith("\n")
    )($lines);

    // Related
    $op->related = pipeLine(
        filterWith(function ($line) { return strpos($line, '@see') === 0; }),
        mapWith(function ($line) {
            $matches = [];
            preg_match('/^@see\s+(.*)$/', $line, $matches);
            $related = explode(', ', $matches[1]);
            return $related;
        }),
        Slash\reduceWith(function ($flattened, $related) {
            return array_merge($flattened, $related);
        }),
        mapWith(function ($opName) {
            return str_replace('()', '', $opName);
        })
    )($lines);

    // Alias
    $op->aliases = pipeLine(
        filterWith(function ($line) { return strpos($line, '@alias') === 0; }),
        firstWith(function () { return true;}),
        function ($line) {
            $matches = [];
            preg_match('/^@alias\s+(.*)$/', $line, $matches);
            $aliases = isset($matches[1]) ? $matches[1] : false;
            return $aliases ? explode(', ', $aliases) : [];
        }
    )($lines);

    // Return value
    $op->return = pipeLine(
        filterWith(function ($line) { return strpos($line, '@return') === 0; }),
        mapWith(function ($line) {
            $matches = [];
            preg_match('/^@return\s+([\S]+)\s*(.*)?/', $line, $matches);
            $type = $matches[1];
            $description = $matches[2];
            return (object) [
                'type' => $type,
                'description' => $description,
            ];
        }),
        firstWith(function () { return true;})
    )($lines);

    // Parameters
    $allParamLines = filterWith(function ($line) {
        return strpos($line, '@param') !== 0;
    })($lines);

    for ($op->params = []; $allParamLines;) {
        $matches = [];
        $isMatch = preg_match('/^@param\s+([\S]+)\s+([\S]+)\s*(.*)$/', array_shift($allParamLines), $matches);

        if (!$isMatch) {
            continue;
        }

        list($type, $name, $description) = array_slice($matches, 1);
        $descriptionLines = (array) $description;

        while ($description && $allParamLines && strpos($allParamLines[0], '@') !== 0) {
            $descriptionLine = ltrim(array_shift($allParamLines));
            $descriptionLines[] = $descriptionLine;
        }

        $op->params[] = (object) [
            'type' => $type,
            'name' => $name,
            'description' => implode(' ', $descriptionLines),
        ];
    }

    // Examples
    $allExampleLines = filterWith(function ($line) {
        return strpos($line, '@example') !== 0;
    })($lines);

    for ($op->examples = []; $allExampleLines;) {
        $description = str_replace('@example', '', array_shift($allExampleLines));
        $description = trim($description);

        $exampleLines = [];
        while ($allExampleLines && strpos($allExampleLines[0], '@example') !== 0) {
            $exampleLine = array_shift($allExampleLines);
            $exampleLine = preg_replace('/^\t/', '', $exampleLine);
            $exampleLines[] = $exampleLine;
        }

        $op->examples[] = (object) [
            'description' => $description,
            'content' => implode("\n", $exampleLines),
        ];
    }

    return $op;
}

function renderOp($op)
{
    $aliases = $op->aliases ? sprintf(' / %s', implode(' / ', $op->aliases)) : '';

    $related = pipeLine(
        mapWith(function ($opName) {
            return "`$opName()`";
        }),
        joinWith(',')

    )((array) $op->related);

    $related = $related ? "See also: $related" : '';

    if ($op->params) {
        $paramsTable = Slash\reduce($op->params, function ($output, $param) {
            $type = str_replace('|', '\|', $param->type);
            return $output . rtrim("`$param->name` | `$type` | $param->description") . "\n";
        }, "Parameter | Type | Description\n--- | --- | :---\n");
    }
    else {
        $paramsTable = '';
    }

    if ($op->return) {
        $type = str_replace('|', '\|', $op->return->type);
        $description = $op->return->description ? " {$op->return->description}" : '';
        $returnTable = <<<END
**Returns** | `$type` |$description
END;
    }
    else {
        $returnTable = '';
    }

    $examples = pipeLine(
            mapWith(function ($example) {
                $description = $example->description ? " {$example->description}" : '';
                return <<<END
**Example:**{$description}
```php
{$example->content}
```
END;
            }),
        joinWith("\n\n")
    )($op->examples);

    $returnType = isset($op->return->type) ? ": {$op->return->type}" : '';

    if (isset($op->curriedFilepath)) {
        $signature = extractFunctionSignature($op->curriedFilepath);
        $signature = preg_replace('#/\* (.+) \*/#', '$1', $signature);  // Removes wrapping /* comment */
        $curriedSignature = "\n\n" . "# Curried: (all parameters required)\n" . "Curry\\" . $signature;
    }
    else {
        $curriedSignature = '';
    }

    return <<<END
{$op->name}$aliases
---
$related
```php
{$op->signature}$returnType{$curriedSignature}
```
{$op->description}
$paramsTable$returnTable
$examples
[↑ Top](#operations)
END;
}

function renderTableOfContents($ops)
{
    $opSummaries = pipeLine(
        mapWith(function ($op) {
            $returnType = isset($op->return->type) ? ": {$op->return->type}" : '';
            $returnType = str_replace('|', '\\|', $returnType);
            $aliases = $op->aliases ? ' / ' . implode(' / ', $op->aliases) : '';
            $curried = function_exists("\\Dash\\Curry\\{$op->name}") ? "`Curry\\{$op->name}`" : '';
            return "[$op->name](#$op->slug)$aliases | `{$op->signature}{$returnType}` | $curried";
        }),
        joinWith("\n")
    )($ops);

    return <<<END
Operations
===
Is there an operation you'd like to see? [Open an issue](https://github.com/mpetrovich/dash/issues/new?labels=enhancement) or vote on an existing one.
Operation | Signature | Curried
:--- | :--- | :---
$opSummaries
END;
}