<?php

namespace App\src\DAO;

use App\src\model\User;
use App\config\Parameter;

class UserDAO extends DAO
{
    private function buildObject($row)
    {
        $bioText = new User();
        $bioText->setBio($row['bio']);
        return $bioText;
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT id, password FROM user WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    public function updatePassword(Parameter $post)
    {
        $sql = 'UPDATE user SET pseudo = ?, password = ? WHERE id = 1';
        $this->createQuery($sql, [$post->get('pseudo'), password_hash($post->get('password'), PASSWORD_BCRYPT)]);
    }

    public function getBio()
    {
        $sql = 'SELECT bio FROM user WHERE id = 1';
        $result = $this->createQuery($sql);
        $bioText = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($bioText);
    }

    public function getUser()
    {
        $sql = 'SELECT pseudo FROM user WHERE id = 1';
        $result = $this->createQuery($sql);
        $username = $result->fetch();
        $result->closeCursor();
        return $username;
    }
  
    public function updateBio($post)
    {
        $streapText = $post->get('myBio');
        $streapContent = strip_tags ($streapText);
        $sql = 'UPDATE user SET bio=:bio';
        $this->createQuery($sql, [
            'bio' => $streapContent
            ]);
    }
}