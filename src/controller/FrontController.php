<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $firstChapt = $this->articleDAO->firstChapt();
        $this->session->set('firstChaptNumber', $firstChapt['minChapter']);
        $this->session->set('firstChaptId', $firstChapt['chapterId']);
        return $this->view->render('home');
    }

    public function read()
    {
        return $this->view->render('frontView');
    }

    public function login(Parameter $post)
    {
        if(!$this->session->get('pseudo')) {
            if($post->get('submit')) {
                $result = $this->userDAO->login($post);
                if($result && $result['isPasswordValid']) {
                    $this->session->set('id', $result['result']['id']);
                    $this->session->set('pseudo', $post->get('pseudo'));
                    header('Location: ../public/index.php?path=backOffice');
                }
                else {
                    $this->session->set('errorMdp', 'Il y a une erreur sur le pseudonyme ou le mot de passe.');
                    return $this->view->render('login', [
                        'post'=> $post
                    ]);
                }
            }
            $this->session->remove('errorMdp');
            return $this->view->render('login');
            
        } else {
            header('Location: ../public/index.php?path=backOffice');
        }
    }

    public function article($chapterId, $articleId)
    {
        //$articles = $this->articleDAO->getArticles();
        $article = $this->articleDAO->getChapter($chapterId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('frontView', [
            //'articles' => $articles,
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function addComment(Parameter $post, $chapterId, $articleId)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
                if(!$errors){
                    $this->commentDAO->addComment($post, $articleId);
                    $this->session->set('alert', 'Le commentaire a bien été posté.');
                    header('Location: ../public/index.php?path=frontView&chapterId=' . $chapterId . '&articleId=' .$articleId);
                } else {
                    $this->session->set('alert', 'Le pseudo ou le contenu du commentaire est trop court, veuillez le changer.');
                    header('Location: ../public/index.php?path=frontView&chapterId=' . $chapterId . '&articleId=' .$articleId);
                } 
        }
    }

    public function flagComment($commentId, $chapterId, $articleId)
    {
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php?path=frontView&chapterId=' . $chapterId . '&articleId=' .$articleId);
    }

    public function bio()
    {
        $bioText = $this->userDAO->getBio();
        return $this->view->render('bio', [
            'bioText' => $bioText
        ]);
    }
}