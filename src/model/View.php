<?php

namespace App\src\model;

use App\config\Request;

class View
{
    private $file;
    private $title;
    private $styling;
    private $fontAwe;
    private $mediaq;
    private $request;
    private $session;
    private $favIco;
    private $myJs;

    public function __construct()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }

    public function render($template, $data = [])
    {
        $this->file = '../templates/'.$template.'.php';
        $content  = $this->renderFile($this->file, $data);
        $this->styling = '../css/style.css';
        $this->fontAwe = '../fonts/Fontawesome/css/all.css';
        $this->mediaq = '../css/mediaq.css';
        $this->favIco = '../img/fire.png';
        $this->myJs = '../js/behavior.js';
        $view = $this->renderFile('../templates/base.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session,
            'styling' => $this->styling,
            'fontAwe' => $this->fontAwe,
            'mediaq' => $this->mediaq,
            'favIco' => $this->favIco,
            'myJs' => $this->myJs
        ]);
        echo $view;
    }

    public function renderBO($template, $data = [])
    {
        $this->file = '../templates/'.$template.'.php';
        $content  = $this->renderFile($this->file, $data);
        $this->styling = '../css/style.css';
        $this->fontAwe = '../fonts/Fontawesome/css/all.css';
        $this->mediaq = '../css/mediaq.css';
        $this->favIco = '../img/fire.png';
        $this->myJs = '../js/behavior.js';
        $view = $this->renderFile('../templates/baseBO.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session,
            'styling' => $this->styling,
            'fontAwe' => $this->fontAwe,
            'mediaq' => $this->mediaq,
            'favIco' => $this->favIco,
            'myJs' => $this->myJs
        ]);
        echo $view;
    }

    private function renderFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?path=notFound');
    }
}