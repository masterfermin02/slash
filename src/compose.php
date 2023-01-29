<?php

namespace Slash;

if (!function_exists('compose')) {
    /**
     * This function allows creating a new function from two functions passed into it
     * Compose: f(g(x)) for variable number of arguments (recursive)
     * Takes two or more functions as arguments and returns a function
     * that will compose those functions passing its input to the
     * right-most, inner function.
     * ie., compose(f,g,h) == f(g(h()))
     *
     * @return mixed
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
    function compose()
    {
        $args = func_get_args();
        $fn   = array_shift($args);
        $gn   = array_shift($args);
        // If it has more than one args create a new function from two functions passed
        // If it has one args will return it as fun
        $fog = is_callable($gn) && is_callable($fn) ? fn() => call_user_func(
            $fn,
            call_user_func_array($gn, func_get_args())
        ) : $fn;

        // If it has more than 2 args will call compose again pass the new function as args with the reminders args
        // else will return $fog (all the functions composed).
        return count($args) > 0 ? call_user_func_array('Slash\compose', [...[$fog], ...$args]) : $fog;
    }
}
