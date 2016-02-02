<?php

namespace BES\ContactBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BESContactBundle extends Bundle
{
    
    public function getParent() {
        return 'SKCMSContactBundle';
    }
}
