<?php
    namespace Semio\UserBundle;
    use Symfony\Component\HttpKernel\Bundle\Bundle;
    class SemioUserBundle extends Bundle{
        public function getParent(){
            return 'FOSUserBundle';
        }
    }
