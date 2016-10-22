<?php

namespace DexterApp\Admin\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Admin\Models\Service\Servico;

class ServicosController extends AbstractController
{

    /**
     * Armazena instância da model de servicos
     */
    private $servicoModel;

    public function actionIndex(R $req, V $view)
    {
        $view->servicos = $this->getServicoModel()->getServicos();
    }

    public function actionEdit(R $req, V $view, $servicoId)
    {
        $view->servico = $this->getServicoModel()->getServico($servicoId);
        $view->msg = '';

        if ($req->isPost()) {
            try {
                $this->getServicoModel()->save($req->getParams());
                header('Location: ?q=admin/servicos');
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
                $this->getServicoModel()->save($req->getParams());
                header('Location: ?q=admin/servicos');
                return false;
            } catch (\Exception $e) {
                $view->msg = $e->getMessage();
            }
        }
    }

    /**
     * Recupera a servico model
     */
    public function getServicoModel()
    {
        if (!$this->servicoModel) {
            $this->servicoModel = new Servico();
        }
        return $this->servicoModel;
    }

    /**
     * Seta a servico model
     */
    public function setServicoModel(\DexterApp\Admin\Models\Service\Servico $servicoModel)
    {
        $this->servicoModel = $servicoModel;
        return $this;
    }
}
