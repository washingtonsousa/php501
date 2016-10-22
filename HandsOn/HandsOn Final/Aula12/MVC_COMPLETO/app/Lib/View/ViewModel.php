<?php

namespace Lib\View;

class ViewModel
{
    public static function render($path, $dados = null)
    {
        //$path = Controller/action;
        require '../app/View/Layout/topo.phtml';
        require "../app/View/$path.phtml";
    }
}