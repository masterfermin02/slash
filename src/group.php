<?php

namespace Slash;

// Returns an object which groups objects in `list` by property `prop`. If
// `prop` is a function, will group the objects in list using the string returned
// by passing each obj through `prop` function.
function group($list, $prop) {
    return reduce($list,function($grouped, $item) use($prop) {
        $key = get($item,$prop);
        $grouped[$key][] = $item;
        return $grouped;
    }, []);
}
