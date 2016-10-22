<?php

namespace DexterApp\Front\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Front\Models\Service\Index;

class IndexController extends AbstractController
{

    /**
     * Armazena instância da model Façade
     */
    private $model;

    /**
     * Página inicial
     */
    public function actionIndex(R $req, V $view)
    {
        $view->banners          = $this->getModel()->getBanners();
        $view->vantagens        = $this->getModel()->getVantagens();
        $view->funcionalidades  = $this->getModel()->getFuncionalidades();
    }

    /**
     * Recupera a model Façade
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Index();
        }
        return $this->model;
    }

    /**
     * Seta a model
     */
    public function setModel(Index $model)
    {
        $this->model = $model;
        return $this;
    }
}
