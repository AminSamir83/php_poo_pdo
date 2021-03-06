<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 10:49
 */

class Admin extends Utilisateur
{
private $role;

    /**
     * Admin constructor.
     * @param $role
     */
    public function __construct($id_user, $prenom, $nom, $login, $password, $email, $cin, $telephone, $ville, $code_postal)
    {
        parent::__construct($id_user, $prenom, $nom, $login, $password, $email, $cin, $telephone, $ville, $code_postal);
        $this->role = "Admin";
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function __destruct()
    {

    }
}