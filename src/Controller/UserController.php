<?php

namespace Mika\App\Controller;

use Mika\App\Model\Classes\Manager\UserManager;

class UserController {
    public function checkUser(){
        $manager = new UserManager();
        $manager->checkLog($_POST['email']);

    }
}