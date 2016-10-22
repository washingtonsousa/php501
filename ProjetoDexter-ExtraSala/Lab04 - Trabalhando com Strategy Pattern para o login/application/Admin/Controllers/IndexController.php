<?php

namespace DexterApp\Admin\Controllers;

use Dexter\Router\Request   as R;
use Dexter\View\View        as V;

use DexterApp\AbstractController;
use DexterApp\Admin\Models\Exceptions\InvalidUserOrPasswordException;
use DexterApp\Admin\Models\Service\User;
use DexterApp\Admin\Models\Strategy\LoginDatabase as StrategyLoginDatabase;

class IndexController extends AbstractController
{

    /**
     * Armazena instância da model de usuários
     */
    private $userModel;

    public function actionIndex(R $req, V $view)
    {
        $view->user = $this->getUserModel()->getUser()->login;
    }

    /**
     * Página de login
     */
    public function actionLogin(R $req, V $view)
    {
        $view->msg = '';
        if ($req->isPost()) {
            try {
                $this->getUserModel()->login(
                    $req->getParam('user_login'),
                    $req->getParam('pass_login')
                );
                header('Location: ?q=admin');
                return false;
            } catch (InvalidUserOrPasswordException $e) {
                $view->msg = 'Usuário e/ou senha inválidos!';
            } catch (\Exception $e) {
                $view->msg = 'Ocorreu um erro: ' . $e->getMessage();
            };
        }
    }

    public function actionLogout(R $req, V $view)
    {
        $this->getUserModel()->logout();
        header('Location: ?q=admin');
        return false;
    }

    /**
     * Recupera a user model
     * Caso a mesma não esteja criada, criamos-na utilizando a estratégia
     * login via banco de dados
     */
    public function getUserModel()
    {
        if (!$this->userModel) {
            // [Lab04] Trabalhando com Strategy Pattern para o login
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
