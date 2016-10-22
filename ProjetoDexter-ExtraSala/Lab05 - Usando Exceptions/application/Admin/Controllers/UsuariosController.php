<?php

namespace DexterApp\Admin\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Admin\Models\Service\User;

class UsuariosController extends AbstractController
{

    /**
     * Armazena instância da model de usuários
     */
    private $userModel;

    public function actionIndex(R $req, V $view)
    {
        $view->users = $this->getUserModel()->getUsers();
    }

    public function actionEdit(R $req, V $view, $userId)
    {
        $view->user = $this->getUserModel()->getUser($userId);
        $view->msg = '';

        if ($req->isPost()) {
            try {
                $this->getUserModel()->save($req->getParams());
                header('Location: ?q=admin/usuarios');
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
                $this->getUserModel()->save($req->getParams());
                header('Location: ?q=admin/usuarios');
                return false;
            } catch (\Exception $e) {
                $view->msg = $e->getMessage();
            }
        }
    }

    /**
     * Recupera a user model
     */
    public function getUserModel()
    {
        if (!$this->userModel) {
            $this->userModel = new User();
        }
        return $this->userModel;
    }

    /**
     * Seta a user model
     */
    public function setUserModel(\DexterApp\Admin\Models\Service\User $userModel)
    {
        $this->userModel = $userModel;
        return $this;
    }
}
