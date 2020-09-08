<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    private function checkLoggedIn()
    {
        if(!$this->session->get('pseudo')) {
            header('Location: ../public/index.php?path=login');
        } else {
            return true;
        }
    }

    public function article()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->renderBO('backOfficeReader', [
            'articles' => $articles
        ]);
    }

    public function addArticle(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $this->articleDAO->addArticle($post);
                header('Location: ../public/index.php?path=backOffice');
            }
            return $this->view->renderBO('backOfficeEditor');
        }
    }

     public function editArticle(Parameter $post, $articleId)
    {
        if ($this->checkLoggedIn()) {
            $articles = $this->articleDAO->getArticles();
            $article = $this->articleDAO->getArticle($articleId);
            if ($post->get('submit')) {
                $this->articleDAO->editArticle($post, $articleId, $this->session->get('id'));
                header('Location: ../public/index.php?path=backOffice');
                return $this->view->renderBO('backOfficeReader', [
                    'articles' => $articles
                ]);
                
            }
            return $this->view->renderBO('backOfficeModif', [
                'article' => $article
            ]);
        }
    }

    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            header('Location: ../public/index.php?path=backOffice');
            return $this->view->renderBO('backOfficeReader');
        }
        return $this->view->renderBO('profil');
        }
    }

    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->session->stop();
            $this->session->start();
            header('Location: ../public/index.php');
        }
    }
}