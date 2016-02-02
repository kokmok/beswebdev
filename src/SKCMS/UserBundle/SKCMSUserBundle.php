<?php

namespace SKCMS\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SKCMSUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
