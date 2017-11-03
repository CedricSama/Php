<?php
    namespace Lddt\UserBundle;
    use FOS\UserBundle\FOSUserBundle;
    use Symfony\Component\HttpKernel\Bundle\Bundle;
    class LddtUserBundle extends Bundle{
        /**
         * Pour prendre la main
         * sur les views du Bundle téléchargé FOSUser
         *
         * @return string
         */
        public function getParent(){
            return 'FOSUserBundle';
        }
    }
