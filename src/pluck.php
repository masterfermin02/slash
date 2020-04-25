<?php

namespace Slash;

/**
 * Given a list of objects, return a list of the values
 * for property 'prop' in each object
 * @param $list
 * @param $prop
 * @return mixed
 */
function pluck($list, $prop) {
    return call_user_func(mapWith(getWith($prop)),$list);
}
