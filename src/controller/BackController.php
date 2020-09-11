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
        if ($this->checkLoggedIn()) {
        $articles = $this->articleDAO->getArticles();
        return $this->view->renderBO('backOfficeReader', [
            'articles' => $articles
        ]);
        }
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

    public function comments()
    {
        $comments = $this->commentDAO->getCommentsFromArticle2();
        return $this->view->renderBO('backOfficeCom', [
            'comments' => $comments
        ]);
    }

    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                if ($post->get('password') == $post->get('password_conf') ){
                    $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                    header('Location: ../public/index.php?path=backOffice');
                    return $this->view->renderBO('backOfficeReader');
                } else {
                    $this->session->set('errorMdp', 'Le mot de passe et la confirmation ne correspondent pas.');
                    return $this->view->renderBO('profil');
                    $this->session->set('errorMdp');
                }
            }
        $this->session->remove('errorMdp');
        return $this->view->renderBO('profil');
        }
    }

    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->session->set('loginOut', 'logoff');
            header('Location: ../public/index.php?path=backOffice');
            return $this->view->renderBO('backOffice');
        }
    }

    public function logoutConf()
    {
        if ($this->checkLoggedIn()) {
            $this->session->remove('loginOut');
            $this->session->stop();
            $this->session->start();
            header('Location: ../public/index.php');
        }
    }

    public function logoutCancel()
    {
        if ($this->checkLoggedIn()) {
            $this->session->remove('loginOut');
            header('Location: ../public/index.php?path=backOffice');
        }
    }
}