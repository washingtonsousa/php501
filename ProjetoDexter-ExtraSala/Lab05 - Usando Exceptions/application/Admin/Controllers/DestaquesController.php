<?php

namespace DexterApp\Admin\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Admin\Models\Service\Destaque;

class DestaquesController extends AbstractController
{

    /**
     * Armazena instância da model de destaques
     */
    private $destaqueModel;

    public function actionIndex(R $req, V $view)
    {
        $view->destaques = $this->getDestaqueModel()->getDestaques();
    }

    public function actionEdit(R $req, V $view, $destaqueId)
    {
        $view->destaque = $this->getDestaqueModel()->getDestaque($destaqueId);
        $view->msg = '';

        if ($req->isPost()) {
            try {
                $this->getDestaqueModel()->save($req->getParams());
                header('Location: ?q=admin/destaques');
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
                $this->getDestaqueModel()->save($req->getParams());
                header('Location: ?q=admin/destaques');
                return false;
            } catch (\Exception $e) {
                $view->msg = $e->getMessage();
            }
        }
    }

    /**
     * Recupera a destaque model
     */
    public function getDestaqueModel()
    {
        if (!$this->destaqueModel) {
            $this->destaqueModel = new Destaque();
        }
        return $this->destaqueModel;
    }

    /**
     * Seta a destaque model
     */
    public function setDestaqueModel(\DexterApp\Admin\Models\Service\Destaque $destaqueModel)
    {
        $this->destaqueModel = $destaqueModel;
        return $this;
    }
}
