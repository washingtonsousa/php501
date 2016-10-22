<?php
$rotas = [

    '/' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/home/index.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    /*
     * rotas/cliente
     */

    'cliente/index' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/clientes/index.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'cliente/inserir' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/clientes/insert.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'cliente/editar' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/clientes/edit.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    /*
     * rotas/faleConosco
     */

    'faleConosco/index' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/faleConosco/index.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'faleConosco/see' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/faleConosco/see.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    /*
     * rotas/funcionalidade
     */

    'funcionalidade/index' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/funcionalidades/index.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'funcionalidade/inserir' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/funcionalidades/insert.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'funcionalidade/editar' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/funcionalidades/edit.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    /*
     * rotas/funcionario
     */

    'funcionario/index' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/funcionario/index.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'funcionario/inserir' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/funcionario/insert.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'funcionario/editar' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/funcionario/edit.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    /*
     * rotas/servico
     */

    'servico/index' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/servicos/index.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'servico/inserir' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/servicos/insert.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },

    'servico/editar' => function () {
        include('../views/admin/layout/_topo.phtml');
        include('../views/admin/servicos/edit.phtml');
        include('../views/admin/layout/_rodape.phtml');
    },
];

$r = (isset($_GET['r']) && strlen($_GET['r']) > 0) ? $_GET['r'] : '/';
if (array_key_exists($r, $rotas)) {

    if (!is_callable($rotas[$r])) {
        header("HTTP/1.0 500 Fatal Error");
        exit();
    }

    $rotas[$r]();

} else {
    header("HTTP/1.0 404 Not Found");
    exit();
}