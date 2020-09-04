<?php

namespace App\config;

use Exception;

class Router
{
    private $request;

    public function __construct()
    {
        $this->request = new Request();

    }

    public function run()
    {
        $path = $this->request->getGet()->get('path');
        try{
            if(isset($path))
            {
                /*if($path === 'article'){
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif($path === 'addArticle'){
                    $this->backController->addArticle($this->request->getPost());
                }*/
            }
            else{
                require '../templates/home.php';
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}