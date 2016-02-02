<?php

namespace BES\FrontBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BESFrontBundle extends Bundle
{
    public function getParent()
    {
        return 'SKCMSFrontBundle';
    }
}
