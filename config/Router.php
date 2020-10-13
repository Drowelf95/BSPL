<?php

namespace App\config;

use Exception;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;

class Router
{
    private $request;
    private $frontController;
    private $backController;
    private $errorController;
    

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {

        $path = $this->request->getGet()->get('path');
        try{
            if(isset($path))
            {
                if($path === 'login'){
                    $this->frontController->login($this->request->getPost());
                } 
                elseif ($path === 'backOffice'){
                    $this->backController->article();
                }
                elseif ($path === 'editor'){
                    $this->backController->addArticle($this->request->getPost());
                }
                elseif ($path === 'editArticle'){
                    $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'deletePicture'){
                    $this->backController->deletePicture($this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'articleBin'){
                    $this->backController->articleBin($this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'trashArticle'){
                    $this->backController->trashArticle($this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'untrashArticle'){
                    $this->backController->untrashArticle($this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'deleteArticle'){
                    $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'comments'){
                    $this->backController->comments();
                }
                elseif ($path === 'trashComment'){
                    $this->backController->trashComment($this->request->getGet()->get('commentId'));
                }
                elseif ($path === 'untrashComment'){
                    $this->backController->untrashComment($this->request->getGet()->get('commentId'));
                }
                elseif ($path === 'commentBin'){
                    $this->backController->commentBin($this->request->getGet()->get('commentId'));
                }
                elseif ($path === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                }
                elseif ($path === 'profil'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif ($path === 'logoutConf'){
                    $this->backController->logoutConf();
                }
                elseif ($path === 'logoutCancel'){
                    $this->backController->logoutCancel();
                }
                elseif ($path === 'frontView'){
                    $this->frontController->article($this->request->getGet()->get('chapterId'), $this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'btnNxt'){
                    $this->frontController->nextChapter($this->request->getGet()->get('chapterId'), $this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'btnPrev'){
                    $this->frontController->prevChapter($this->request->getGet()->get('chapterId'), $this->request->getGet()->get('articleId'));
                }
                elseif($path === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('chapterId'), $this->request->getGet()->get('articleId'));
                }
                elseif($path === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'), $this->request->getGet()->get('chapterId'), $this->request->getGet()->get('articleId'));
                }
                elseif($path === 'unflagComment'){
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                }
                elseif($path === 'bio'){
                    $this->frontController->bio();
                }
                elseif($path === 'bioUpdate'){
                    $this->backController->updateBio($this->request->getPost());
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}