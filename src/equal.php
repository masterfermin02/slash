<?php

namespace Slash;

/**
 * Compare if value $a is equal to $b
 * @param $a
 * @param $b
 * @return bool
 *
 * @example
 *
 * equal(1, 2); // false
 * equal(1,1); // true
 */
function equal($a, $b) { return $a === $b; }
