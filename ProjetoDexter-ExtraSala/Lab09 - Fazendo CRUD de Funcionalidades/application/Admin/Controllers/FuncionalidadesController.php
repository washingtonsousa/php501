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
        // [Lab09] Fazendo CRUD de Funcionalidades
    }

    public function actionEdit(R $req, V $view, $funcionalidadeId)
    {
        // [Lab09] Fazendo CRUD de Funcionalidades
    }

    public function actionNew(R $req, V $view)
    {
        // [Lab09] Fazendo CRUD de Funcionalidades
    }

    /**
     * Recupera a funcionalidade model
     */
    public function getFuncionalidadeModel()
    {
        // [Lab09] Fazendo CRUD de Funcionalidades
    }

    /**
     * Seta a funcionalidade model
     */
    public function setFuncionalidadeModel(\DexterApp\Admin\Models\Service\Funcionalidade $funcionalidadeModel)
    {
        // [Lab09] Fazendo CRUD de Funcionalidades
        return $this;
    }
}
