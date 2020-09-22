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
                $errors = $this->validation->validate($post, 'Article');
                if(!$errors){
                    $target = "../public/img/".basename($_FILES['photo']['name']);
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {    
                        $this->articleDAO->addArticle($post);
                        header('Location: ../public/index.php?path=backOffice');
                    } else {
                        $this->session->set('alert', 'Impossible d\'importer l\'image');
                    }
                }
                    return $this->view->renderBO('backOfficeEditor', [
                    'post' => $post,
                    'errors' => $errors
                ]);
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
                $errors = $this->validation->validate($post, 'Article');
                if(!$errors){
                    $target = "../public/img/".basename($_FILES['photo']['name']);
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {    
                        $this->articleDAO->editArticle($post, $articleId, $this->session->get('id'));
                        header('Location: ../public/index.php?path=backOffice');
                        return $this->view->renderBO('backOfficeReader', [
                            'articles' => $articles
                        ]);
                    } else {
                        $this->session->set('alert', 'Impossible d\'importer l\'image');
                    }
                }
                return $this->view->renderBO('backOfficeModif', [
                    'article' => $article,
                    'post' => $post,
                    'errors' => $errors
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
                    $bioText = $this->userDAO->getBio();
                    return $this->view->renderBO('profil', [ 
                        'bioText' => $bioText 
                        ]);
                } else {
                    $this->session->set('alert', 'Le mot de passe et la confirmation ne correspondent pas.');
                    $bioText = $this->userDAO->getBio();
                    return $this->view->renderBO('profil', [ 
                        'bioText' => $bioText 
                        ]);
                }
            }

        $bioText = $this->userDAO->getBio();
        return $this->view->renderBO('profil', [ 
            'bioText' => $bioText 
            ]);
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


    public function updateBio(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                    $this->userDAO->updateBio($post);
                    $this->session->set('alert', 'La Bio de votre profil est à jour.');
                    $bioText = $this->userDAO->getBio();
                    return $this->view->renderBO('profil', [ 
                        'bioText' => $bioText 
                    ]);
            }
        }
    }
}