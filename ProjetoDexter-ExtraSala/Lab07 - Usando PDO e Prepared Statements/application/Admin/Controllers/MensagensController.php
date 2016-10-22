<?php

namespace DexterApp\Admin\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Admin\Models\Service\Mensagem;

class MensagensController extends AbstractController
{

    /**
     * Armazena instância da model de mensagens
     */
    private $mensagemModel;

    public function actionIndex(R $req, V $view)
    {
        $view->mensagens = $this->getMensagemModel()->getMensagens();
    }

    public function actionEdit(R $req, V $view, $mensagemId)
    {
        $view->mensagem = $this->getMensagemModel()->getMensagem($mensagemId);
        $view->msg = '';

        if ($req->isPost()) {
            try {
                $this->getMensagemModel()->save($req->getParams());
                header('Location: ?q=admin/mensagens');
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
                $this->getMensagemModel()->save($req->getParams());
                header('Location: ?q=admin/mensagens');
                return false;
            } catch (\Exception $e) {
                $view->msg = $e->getMessage();
            }
        }
    }

    /**
     * Recupera a mensagem model
     */
    public function getMensagemModel()
    {
        if (!$this->mensagemModel) {
            $this->mensagemModel = new Mensagem();
        }
        return $this->mensagemModel;
    }

    /**
     * Seta a mensagem model
     */
    public function setmensagemModel(\DexterApp\Admin\Models\Service\Mensagem $mensagemModel)
    {
        $this->mensagemModel = $mensagemModel;
        return $this;
    }
}
