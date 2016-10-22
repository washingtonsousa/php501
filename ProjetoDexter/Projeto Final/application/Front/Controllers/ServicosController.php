<?php

namespace DexterApp\Front\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Front\Models\Service\Servicos;

class ServicosController extends AbstractController
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
        $view->servicos = $this->getModel()->getServicos();
    }

    /**
     * Recupera a model Façade
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Servicos();
        }
        return $this->model;
    }

    /**
     * Seta a model
     */
    public function setModel(Servicos $model)
    {
        $this->model = $model;
        return $this;
    }
}
