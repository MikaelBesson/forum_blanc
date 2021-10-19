<?php
namespace Mika\App\Model\Classes;


class Controller {
    public function render(string $view, $data = []) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/'. $view . '.view.php';
    }
}