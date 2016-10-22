<?php
namespace app\Model\Clientes;

use lib\Db\AbstractEntity;

class Cliente extends AbstractEntity
{

    private $nomeRazao;

    private $cpfCnpj;

    private $email;

    private $telefone;

    /**
     *
     * @return the $nomeRazao
     */
    public function getNomeRazao()
    {
        return $this->nomeRazao;
    }

    /**
     *
     * @return the $cpfCnpj
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     *
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @return the $telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     *
     * @param field_type $nomeRazao            
     */
    public function setNomeRazao($nomeRazao)
    {
        $this->nomeRazao = $nomeRazao;
    }

    /**
     *
     * @param field_type $cpfCnpj            
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    /**
     *
     * @param field_type $email            
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @param field_type $telefone            
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
}
