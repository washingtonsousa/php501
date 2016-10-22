<?php

namespace DexterApp\Front\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Front\Models\Service\CadastreSe;

class CadastreSeController extends AbstractController
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
        $view->msg = '';
        $view->estados = $this->getModel()->getEstados();

        if ($req->isPost()) {
            $this->getModel()->save($req->getParams());
            $view->msg = 'Formulário enviado com sucesso!';
        }
    }

    /**
     * Recupera a model Façade
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new CadastreSe();
        }
        return $this->model;
    }

    /**
     * Seta a model
     */
    public function setModel(CadastreSe $model)
    {
        $this->model = $model;
        return $this;
    }
}
