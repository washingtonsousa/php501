<?php

$rotas = [
    '/' => function () {
        include( '../views/front/layout/_topo.phtml' );
        include( '../views/front/site/index.phtml' );
        include( '../views/front/layout/_rodape.phtml' );
    },
    'site/index' => function () {
        include( '../views/front/layout/_topo.phtml' );
        include( '../views/front/site/index.phtml' );
        include( '../views/front/layout/_rodape.phtml' );
    },
    'site/sobre' => function () {
        include( '../views/front/layout/_topo.phtml' );
        include( '../views/front/site/sobre.phtml' );
        include( '../views/front/layout/_rodape.phtml' );
    },
    'site/servicos' => function () {
        include( '../views/front/layout/_topo.phtml' );
        include( '../views/front/site/servicos.phtml' );
        include( '../views/front/layout/_rodape.phtml' );
    },
    'site/contato' => function () {
        include( '../views/front/layout/_topo.phtml' );
        include( '../views/front/site/contato.phtml' );
        include( '../views/front/layout/_rodape.phtml' );
    },
    'site/cadastro' => function () {
        include( '../views/front/layout/_topo.phtml' );
        include( '../views/front/site/cadastro.phtml' );
        include( '../views/front/layout/_rodape.phtml' );
    },
];

$r = ( isset( $_GET[ 'r' ] ) && strlen( $_GET[ 'r' ] ) > 0 ) ? $_GET[ 'r' ] : '/';
if ( array_key_exists( $r, $rotas ) ) {

    if ( !is_callable( $rotas[ $r ] ) ) {
        header( "HTTP/1.0 500 Fatal Error" );
        exit();
    }

    $rotas[ $r ]();

} else {
    header( "HTTP/1.0 404 Not Found" );
    exit();
}