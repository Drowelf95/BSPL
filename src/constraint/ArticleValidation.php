<?php

namespace App\src\constraint;
use App\config\Parameter;

class ArticleValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if($name === 'chapter') {
            $error = $this->checkChapter($name, $value);
            $this->addError($name, $error);
        }
        if($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        if($name === 'mytextarea') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
        if($name === 'author') {
            $error = $this->checkAuthor($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkChapter($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('chapitre', $value);
        }
        if($this->constraint->minLength($name, $value, 1)) {
            return $this->constraint->minLength('chapitre', $value, 1);
        }
        if($this->constraint->maxLength($name, $value, 2)) {
            return $this->constraint->maxLength('chapitre', $value, 255);
        }
    }

    private function checkTitle($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('titre', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('titre', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('titre', $value, 255);
        }
    }

    private function checkContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('contenu', $value);
        }
        if($this->constraint->minLength($name, $value, 1)) {
            return $this->constraint->minLength('contenu', $value, 1);
        }
        if($this->constraint->maxLength($name, $value, 100000)) {
            return $this->constraint->maxLength('contenu', $value, 100000);
        }
    }

    private function checkAuthor($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('auteur', $value);
        }
        if($this->constraint->minLength($name, $value, 3)) {
            return $this->constraint->minLength('auteur', $value, 3);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('auteur', $value, 255);
        }
    }
}