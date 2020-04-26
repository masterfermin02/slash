<?php

namespace Slash;

function averageWith($fn) {
    return curry_right('Slash\average', $fn);
}
