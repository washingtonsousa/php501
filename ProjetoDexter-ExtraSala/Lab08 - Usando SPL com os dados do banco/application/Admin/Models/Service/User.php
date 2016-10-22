<?php

namespace DexterApp\Admin\Models\Service;

use Dexter\Session\Manager;
use Dexter\Session\Segment;
use DexterApp\Admin\Models\Collection;
use DexterApp\Admin\Models\DataMapper;
use DexterApp\Admin\Models\Entity;
use DexterApp\Admin\Models\Strategy;

/**
 * Rotinas para lidar com usuários
 */
class User
{

    private $segment;

    /**
     * Armazena qual será a estratégia de login
     * @var Strategy\LoginStrategy
     */
    private $loginStrategy;

    private $userMapper;

    /**
     * Configura a estratégia de login (login via banco? via LDAP? etc.)
     */
    public function __construct(Strategy\LoginStrategy $loginStrategy = null)
    {
        $this->loginStrategy = $loginStrategy;
    }

    /**
     * Executa via strategy o método login da estratégia passada de login
     */
    public function login($user, $pass)
    {
        $this->loginStrategy->login($user, $pass);
        $this->getUser()->login = $user;
    }

    public function logout()
    {
        $user = $this->getUser();
        unset($user->login);
    }

    public function getUser($userId = null)
    {
        if ($userId) {
            $user = $this->getUserMapper()->fetchById($userId);
            $user->id = (int) $user->id;
            return new Entity\User((array) $user);
        }

        return $this->getSegment();
    }

    public function getUsers()
    {
        $users = $this->getUserMapper()->fetchAll();
        $userCollection = new Collection\User();
        foreach ($users as $user) {
            $userCollection[] = new Entity\User(array(
                'id'    => (int) $user->id,
                'login' => $user->login,
                'senha' => $user->senha
            ));
        }
        return $userCollection;
    }

    public function save(array $dados)
    {

        if (!isset($dados['id'])) {
            // verifica se bate senha e confirma senha
            if ($dados['senha_usuario'] !== $dados['conf_senha_usuario']) {
                throw new \InvalidArgumentException('Senhas não batem');
            }

            $user = new Entity\User(array(
                'login' => $dados['login_usuario'],
                'senha' => md5($dados['senha_usuario'])
            ));

            $this->getUserMapper()->insert($user);
        } else {
            $user = new Entity\User(array(
                'id'    => (int) $dados['id'],
                'login' => $dados['login_usuario']
            ));
            $this->getUserMapper()->update($user);
        }
    }

    public function getUserMapper()
    {
        if (!$this->userMapper) {
            $this->userMapper = new DataMapper\User();
        }
        return $this->userMapper;
    }

    public function setUserMapper(DataMapper\User $mapper)
    {
        $this->userMapper = $mapper;
        return $this;
    }

    public function getSegment()
    {
        if (!$this->segment) {
            $this->segment = new Segment(Manager::getInstance(), 'user');
        }
        return $this->segment;
    }

    public function setSegment(Segment $segment)
    {
        $this->segment = $segment;
        return $this;
    }
}
