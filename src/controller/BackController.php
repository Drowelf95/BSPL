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
        $postInBin = $this->articleDAO->getArticlesDeleted();
            if (!empty($postInBin)) {
                $this->session->set('postBin', 'full');
            }else {
                $this->session->set('postBin', 'empty');
            }
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
            $this->session->set('alert', 'L\'article a été placé dans la corbeille');
            header('Location: ../public/index.php?path=backOffice');
        }
    }

    public function untrashArticle($articleId)
    {
        if ($this->checkLoggedIn()) {
            $this->articleDAO->untrashArticle($articleId);
            $this->session->set('alert', 'L\'article a été sorti de la corbeille');
            header('Location: ../public/index.php?path=articleBin');
        }
    }

    public function deleteArticle($articleId)
    {
        if ($this->checkLoggedIn()) {
            $this->articleDAO->deleteArticle($articleId);
            $this->session->set('alert', 'L\'article a été définitivement supprimé');
            header('Location: ../public/index.php?path=articleBin');
        }
    }


    public function comments()
    {
        if ($this->checkLoggedIn()) {
            $comments = $this->commentDAO->getCommentsFromArticle2();
            $postInBin = $this->commentDAO->getcommentsDeleted();
            if (!empty($postInBin)) {
                $this->session->set('comBin', 'full');
            }else {
                $this->session->set('comBin', 'empty');
            }
            return $this->view->renderBO('backOfficeCom', [
                'comments' => $comments
            ]);
        }
    }

    public function trashComment($commentId)
    {
        if ($this->checkLoggedIn()) {
            $this->commentDAO->trashComment($commentId);
            $this->session->set('alert', 'Le commentaire a été placé dans la corbeille ');
            header('Location: ../public/index.php?path=comments');
        }   
    }

    public function untrashComment($commentId)
    {
        if ($this->checkLoggedIn()) {
            $this->commentDAO->untrashComment($commentId);
            $this->session->set('alert', 'Le commentaire a été sorti de la corbeille ');
            header('Location: ../public/index.php?path=commentBin');
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

    public function deleteComment($commentId)
    {
        if ($this->checkLoggedIn()) {
            $this->commentDAO->deleteComment($commentId);
            $this->session->set('alert', 'Le commentaire a été définitivement supprimé');
            header('Location: ../public/index.php?path=commentBin');
        }
    }

    public function unflagComment($commentId)
    {
        if ($this->checkLoggedIn()) {
            $this->commentDAO->unflagComment($commentId);
            $this->session->set('alert', 'Le commentaire a bien été désignalé');
            header('Location: ../public/index.php?path=comments');
        }
    }

    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                if ($post->get('password') == $post->get('password_conf') ){
                    $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                    $this->session->set('alert', 'L\'identifiant et le mot de passe ont été mise à jour');
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