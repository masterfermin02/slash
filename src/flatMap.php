<?php

namespace Slash;

// Return a flattened list which is the result of passing each
// item in `list` thorugh the function `fn`
function flatMap($list, $fn) {
    return flatten(map($list, $fn));
}
