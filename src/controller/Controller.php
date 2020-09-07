<?php

namespace App\src\controller;

use App\config\Request;
use App\src\DAO\ArticleDAO;
use App\src\DAO\UserDAO;
use App\src\model\View;

abstract class Controller
{
    protected $userDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;
    protected $articleDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}