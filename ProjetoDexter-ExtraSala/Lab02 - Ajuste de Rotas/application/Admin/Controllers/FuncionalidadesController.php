<?php

namespace DexterApp\Admin\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Admin\Models\Service\Funcionalidade;

class FuncionalidadesController extends AbstractController
{

    /**
     * Armazena instância da model de funcionalidades
     */
    private $funcionalidadeModel;

    public function actionIndex(R $req, V $view)
    {
        $view->funcionalidades = $this->getFuncionalidadeModel()->getFuncionalidades();
    }

    public function actionEdit(R $req, V $view, $funcionalidadeId)
    {
        $view->funcionalidade = $this->getFuncionalidadeModel()->getFuncionalidade($funcionalidadeId);
        $view->msg = '';

        if ($req->isPost()) {
            try {
                $this->getFuncionalidadeModel()->save($req->getParams());
                header('Location: ?q=admin/funcionalidades');
                return false;
            } catch (\Exception $e) {
                $view->msg = $e->getMessage();
            }
        }
    }

    public function actionNew(R $req, V $view)
    {
        $view->msg = '';
        if ($req->isPost()) {
            try {
                $this->getFuncionalidadeModel()->save($req->getParams());
                header('Location: ?q=admin/funcionalidades');
                return false;
            } catch (\Exception $e) {
                $view->msg = $e->getMessage();
            }
        }
    }

    /**
     * Recupera a funcionalidade model
     */
    public function getFuncionalidadeModel()
    {
        if (!$this->funcionalidadeModel) {
            $this->funcionalidadeModel = new Funcionalidade();
        }
        return $this->funcionalidadeModel;
    }

    /**
     * Seta a funcionalidade model
     */
    public function setFuncionalidadeModel(\DexterApp\Admin\Models\Service\Funcionalidade $funcionalidadeModel)
    {
        $this->funcionalidadeModel = $funcionalidadeModel;
        return $this;
    }
}
