<?php

class Controller {

    public function render(string $view, array $data = [], array $data1 =[]) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/'. $view . '.view.php';
    }

}