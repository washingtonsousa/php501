<?php

namespace DexterApp\Front\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Front\Models\Service\Contato;

class ContatoController extends AbstractController
{

    private $model;

    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Contato();
        }
        return $this->model;
    }

    public function setModel(Contato $model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Página inicial
     */
    public function actionIndex(R $req, V $view)
    {
        $view->msg = '';

        if ($req->isPost()) {
            $this->getModel()->save($req->getParams());
            $view->msg = 'Formulário enviado com sucesso!';
        }
    }
}
