<?php

namespace Slash;

/**
 * This function allows creating a new function from two functions passed into it
 * Compose: f(g(x)) for variable number of arguments (recursive)
 * Takes two or more functions as arguments and returns a function
 * that will compose those functions passing its input to the
 * right-most, inner function.
 * ie., compose(f,g,h) == f(g(h()))
 * @param $args
 * @return \Closure|mixed
 *
 * @example:
 *
 * $pipelines = compose(
 *   cleanString,
 *   turnFirstLetterUp,
 *   addPoint
 *   );
 *
 * echo $pipelines("hello world----"); // === "Hello world."
 *
 *
 */
function compose(...$args) {
    $fn = array_shift($args);
    $gn = array_shift($args);
    // if have more that one args create a new function from two functions passed
    // if  have one args will return it as fun
    $fog = $gn ? function() use($fn,$gn) {
        return call_user_func($fn,
            call_user_func_array($gn,func_get_args())
        );
    }
    : $fn;

    // if have more than 2 args will call the compose again pass the new function as args with the reminders args
    // else will return $fog (all the functions composed).
    return count($args) > 0 ? call_user_func_array('Slash\compose', array_merge([$fog],$args)) : $fog;
}
