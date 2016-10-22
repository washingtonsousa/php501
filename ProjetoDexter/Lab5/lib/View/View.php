<?php

namespace lib\View;

final class View
{
    private $template;
    private $dados = array();

    private $layoutTopo;
    private $layoutRodape;

    private function __construct($template, $dados = array())
    {
        $this->template = $template;
        $this->dados = $dados;
    }

    public function render()
    {
        extract($this->dados);
        $viewsDir = dirname(dirname(__DIR__)) . "/views";
        if ($this->layoutTopo) include("{$viewsDir}/{$this->layoutTopo}.phtml");
        include("{$viewsDir}/{$this->template}.phtml");
        if ($this->layoutRodape) include("{$viewsDir}/{$this->layoutRodape}.phtml");
    }

    public static function admin($template, $dados = array())
    {
        $view = new self("admin/{$template}", $dados);
        $view->layoutTopo = 'admin/layout/_topo';
        $view->layoutRodape = 'admin/layout/_rodape';

        return $view;
    }

    public static function front($template, $dados = array())
    {
        $view = new self("front/{$template}", $dados);
        $view->layoutTopo = 'front/layout/_topo';
        $view->layoutRodape = 'front/layout/_rodape';

        return $view;
    }
}