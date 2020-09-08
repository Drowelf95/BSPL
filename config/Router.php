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
                elseif ($path === 'profil'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif ($path === 'logOut'){
                    $this->backController->logout();
                }
                elseif ($path === 'frontView'){
                    $this->frontController->read();
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