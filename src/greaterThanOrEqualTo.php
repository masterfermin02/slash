<?php

namespace Slash;

function greaterThanOrEqualTo($to){

    return curry_right('Slash\greaterThanOrEqual',$to);
}
