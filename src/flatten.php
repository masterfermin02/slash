<?php

namespace Slash;

// Return a copy of the array 'list' flattened by one level, ie [[1,2],[3,4]] = [1,2,3,4]
function flatten($list) {
    return reduce($list,function($items,$item){
        return is_array($item) ? array_merge($items,$item) : $item;
    },[]);
}
