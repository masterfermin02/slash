<?php

namespace Slash;

function last(array $array, $test) {
    return first(array_reverse($array), $test);
}
