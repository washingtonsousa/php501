<?php

namespace lib\Mensagem;
/**
 * Classe para gerenciamento de Mensagens
 *
 * @package View
 */
trait MensagemTrait
{

    /**
     * Verifica se mensagem para ser exibida
     *
     * @return boolean
     */
    static private function exists()
    {
        return isset($_SESSION['mensagem']);
    }

    /**
     * Armazena mensagem da SESSION
     *
     * @param string $mensagem            
     * @param string $tipo            
     */
    static public function set($mensagem, $tipo)
    {
        $_SESSION['mensagem']['tipo'] = $tipo;
        $_SESSION['mensagem']['valor'] = $mensagem;
        session_commit();
    }

    /**
     * Retorna mensagem da SESSION
     *
     * @return string
     */
    static public function get()
    {
        $mensagem = '';
        
        if (self::exists()) {
            $tipo = $_SESSION['mensagem']['tipo'];
            $valor = $_SESSION['mensagem']['valor'];
            
            self::limpar();
            
            $mensagem = '<div class="alert alert-' . $tipo . ' alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			             <span aria-hidden="true">&times;</span></button>
                         <strong>Atenção!</strong>' . $valor . '</div>';
        }
        
        return $mensagem;
    }

    /**
     * Força limpeza da mensagem
     *
     * @return void
     */
    static public function limpar()
    {
        unset($_SESSION['mensagem']);
    }
}
