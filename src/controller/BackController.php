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

    public function articleBin()
    {
        if ($this->checkLoggedIn()) {
        $articles = $this->articleDAO->getArticlesDeleted();
            if (!empty($articles)) {
            return $this->view->renderBO('backOfficePostTrash', [
                'articles' => $articles
            ]);
            } else {
                header('Location: ../public/index.php?path=backOffice');
            }
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

    public function trashArticle($articleId)
    {
        if ($this->checkLoggedIn()) {
            $this->articleDAO->trashArticle($articleId);
            $this->session->set('alerte', 'L\'article à était placé dans la corbeille ');
            header('Location: ../public/index.php?path=backOffice');
        }
    }

    public function untrashArticle($articleId)
    {
        if ($this->checkLoggedIn()) {
            $this->articleDAO->untrashArticle($articleId);
            header('Location: ../public/index.php?path=articleBin');
        }
    }

    public function deleteArticle($articleId)
    {
        if ($this->checkLoggedIn()) {
            $this->articleDAO->deleteArticle($articleId);
            header('Location: ../public/index.php?path=articleBin');
        }
    }


    public function comments()
    {
        if ($this->checkLoggedIn()) {
            $comments = $this->commentDAO->getCommentsFromArticle2();
            return $this->view->renderBO('backOfficeCom', [
                'comments' => $comments
            ]);
        }
    }

    public function trashComment($commentId)
    {
        if ($this->checkLoggedIn()) {
            $this->commentDAO->trashComment($commentId);
            $this->session->set('alerte', 'Le commentaire à été placé dans la corbeille ');
            header('Location: ../public/index.php?path=comments');
        }   
    }

    public function commentBin()
    {
        if ($this->checkLoggedIn()) {
        $comments = $this->commentDAO->getcommentsDeleted();
            if (!empty($comments)) {
            return $this->view->renderBO('backOfficeComTrash', [
                'comments' => $comments
            ]);
            } else {
                header('Location: ../public/index.php?path=comments');
            }
        }
    }

    public function unflagComment($commentId)
    {
        if ($this->checkLoggedIn()) {
            $this->commentDAO->unflagComment($commentId);
            $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
            header('Location: ../public/index.php?path=comments');
        }
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