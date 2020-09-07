<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        return $this->view->render('home');
    }

    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            //$result = $this->userDAO->login($post);
            if($post->get('password') == 'test' && $post->get('pseudo') == 'Jean' ) {
                //$this->session->set('login', 'Content de vous revoir');
                //$this->session->set('id', $result['result']['id']);
                //$this->session->set('pseudo', $post->get('pseudo'));
                header('Location: ../public/index.php?path=backOffice');
            }
            else {
                /*$this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);*/
                echo'KO';
            }
        }
        return $this->view->render('login');
    }
}
