<?php

namespace Slash;

/**
 * @param $list
 * @param $fn
 */
function walk($list, $fn){
    array_walk($list, $fn);
}
