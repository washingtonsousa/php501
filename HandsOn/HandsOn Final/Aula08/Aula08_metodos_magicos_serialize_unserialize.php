<?php

class Usuarios
{

    protected $nome;

    protected $email;

    private function atribuir($atributo, $valor)
    {
        $atributo = strtolower($atributo);
        
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

    private function retornar($atributo)
    {
        $atributo = strtolower($atributo);
        
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }

    public function __call($metodo, $atributos)
    {
        $prefix = substr($metodo, 0, 3); // Pega os tres primeiros caracteres set ou get
        $nomeAtributo = substr($metodo, 3); // Pega o nome do atributo
        
        switch ($prefix) {
            case 'set':
                $this->atribuir($nomeAtributo, $atributos[0]);
                break;
            case 'get':
                return $this->retornar($nomeAtributo);
                break;
            default:
                '<hr>Echo Metodo Inválido<hr>';
        }
    }

    public static function __callstatic($metodo, $atributos)
    {
        echo "<hr>Metodo $metodo foi chamado de forma estática, porém ele não existe os seguintes parametros forma passados";
        echo '<pre>';
        print_r($atributos);
        echo '<hr>';
    }
    
    public function __sleep()
    {
        return array('nome', 'email');
    }
    
    public function __wakeup()
    {
        echo '<hr>Objeto foi recostruido<hr>';
        exit();
    }
}

$usuario = new Usuarios();
$usuario->setNome('Luciana de Almeida', 'jgjjhgjhgj');
$usuario->setEmail('lu.al@gmail.com');

$serial = serialize($usuario);
echo '<hr>';
echo $serial;
echo '<hr>';
var_dump(unserialize($serial));


