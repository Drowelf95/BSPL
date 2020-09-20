<?php

namespace App\src\model;

class User
{
    /**
     * @var string
     */
    private $bio;

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }
}