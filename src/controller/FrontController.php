<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
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
                    return $this->view->render('login', [
                        'post'=> $post
                    ]);
                }
            }
            return $this->view->render('login');
            
        } else {
            header('Location: ../public/index.php?path=backOffice');
        }
    }
}