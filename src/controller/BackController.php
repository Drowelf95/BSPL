<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function article()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->renderBO('backOfficeReader', [
            'articles' => $articles
        ]);
    }

    public function addArticle(Parameter $post)
    {
        if ($post->get('submit')) {
            $this->articleDAO->addArticle($post);
            header('Location: ../public/index.php?path=backOffice');
        }
        return $this->view->renderBO('backOfficeEditor');
    }

     public function editArticle(Parameter $post, $articleId)
    {
            $article = $this->articleDAO->getArticle($articleId);
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleDAO->editArticle($post, $articleId, $this->session->get('id'));
                    $this->session->set('edit_article', 'L\' article a bien été modifié');
                    header('Location: ../public/index.php?path=backOfficeReader');
                }
                return $this->view->render('backOfficeModif', [
                    'post' => $post,
                    'errors' => $errors
                ]);

            }
            $post->set('id', $article->getId());
            $post->set('title', $article->getTitle());
            $post->set('content', $article->getContent());
            $post->set('author', $article->getAuthor());

            return $this->view->render('backOfficeModif', [
                'post' => $post
            ]);
    }
}