<?php

namespace App\config;

use Exception;
use App\src\controller\FrontController;
use App\src\controller\BackController;

class Router
{
    private $request;
    private $frontController;
    private $backController;
    

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();

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
                    $this->backController->article($this->request->getGet()->get('articleId'));
                }
                elseif ($path === 'editor'){
                    $this->backController->addArticle($this->request->getPost());
                }
                elseif ($path === 'editArticle'){
                    $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
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
                    $this->backController->comments($this->request->getGet()->get('articleId'));
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
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif($path === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                elseif($path === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId, articleId'));
                }
                elseif($path === 'unflagComment'){
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
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