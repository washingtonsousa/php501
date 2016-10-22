<?php

namespace DexterApp\Admin\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Admin\Models\Service\Cliente;

class ClientesController extends AbstractController
{

    /**
     * Armazena instância da model de clientes
     */
    private $clienteModel;

    public function actionIndex(R $req, V $view)
    {
        $view->clientes = $this->getClienteModel()->getClientes();
    }

    public function actionEdit(R $req, V $view, $clienteId)
    {
        $view->cliente = $this->getClienteModel()->getCliente($clienteId);
        $view->msg = '';

        if ($req->isPost()) {
            try {
                $this->getClienteModel()->save($req->getParams());
                header('Location: ?q=admin/clientes');
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
                $this->getClienteModel()->save($req->getParams());
                header('Location: ?q=admin/clientes');
                return false;
            } catch (\Exception $e) {
                $view->msg = $e->getMessage();
            }
        }
    }

    /**
     * Recupera a cliente model
     */
    public function getClienteModel()
    {
        if (!$this->clienteModel) {
            $this->clienteModel = new Cliente();
        }
        return $this->clienteModel;
    }

    /**
     * Seta a cliente model
     */
    public function setClienteModel(\DexterApp\Admin\Models\Service\Cliente $clienteModel)
    {
        $this->clienteModel = $clienteModel;
        return $this;
    }
}
