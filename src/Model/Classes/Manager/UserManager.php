<?php

namespace Mika\App\Model\Classes\Manager;

use Mika\App\Model\Classes\{cleanInput, Db};
use Mika\App\Model\Classes\Entity\user;


class UserManager {

    /**
     * @return array
     */
    public function getUsers()
    {
        $conn = new Db();
        $users = [];
        $req = $conn->connect()->prepare("SELECT * FROM users");
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $data_user) {
            $users[] = new user($data_user['id'], $data_user['nom'], $data_user['prenom'], $data_user['email']);
        }
        return $users;
    }

    /**
     * @param int $id
     * @return user|null
     */
    public function getUser(int $id) {
        $conn = new Db();
        $req = $conn->connect()->prepare("SELECT * FROM users WHERE id = :id");
        $req->bindValue(':id', $id);
        $req->execute();
        $data = $req->fetch();
        if ($data) {
            return $user = new user($data['id'], $data['nom'], $data['prenom'], $data['email']);
        } else {
            return null;
        }
    }

    /**
     * @param $nom
     * @param $prenom
     * @param $email
     */
    public function addUser($nom, $prenom, $email) {

        $conn = new Db();
        $verif = new cleanInput();

        $nom = $verif->verifInput($nom);
        $prenom = $verif->verifInput($prenom);
        $email = $verif->verifInput($email);

        $req = $conn->connect()->prepare("INSERT INTO users(nom, prenom, email) VALUES (:nom,:prenom, :email)");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':email', $email);
        $req->execute();
    }

    /**
     * @param $user
     */
    public function editUser($user) {
        $conn = new Db();
        $req = $conn->connect()->prepare("UPDATE users SET nom = :nom WHERE id =:id");
        $req->bindParam(':nom', $user->getuser());
        $req->bindParam(':id', $user->getId());
        $req->execute();
    }

    /**
     * @param $userId
     * @return string
     */
    public function deleteUser($userId) {
        $conn = new Db();
        $req = $conn->connect()->prepare("SELECT nom FROM users WHERE id = :id");
        $req->bindParam(':id', $userId);
        $req = $conn->connect()->prepare("DELETE FROM users WHERE id = :id");
        $req->execute();
    }
}


