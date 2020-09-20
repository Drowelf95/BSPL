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
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $post->get('pseudo')]);
    }

    public function getBio()
    {
        $sql = 'SELECT bio FROM user WHERE id = ?';
        $result = $this->createQuery($sql, [1]);
        $bioText = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($bioText);
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