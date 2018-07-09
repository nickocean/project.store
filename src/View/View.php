<?php

namespace Src\View;

class View
{
    public function getView($view) {
        require_once "../../public/".$view;
    }
}