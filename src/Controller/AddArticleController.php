<?php

namespace Mika\App\Controller;


use Mika\App\Model\Classes\Controller;

class AddArticleController extends Controller {
    public function displayAddArticle(){
        $this->render('newArticleForm');
    }
}