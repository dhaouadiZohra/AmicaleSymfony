<?php

namespace AmicaleBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AmicaleBundle extends Bundle
{
    public function getParent(){

        return 'FOSUserBundle';

    }
}
