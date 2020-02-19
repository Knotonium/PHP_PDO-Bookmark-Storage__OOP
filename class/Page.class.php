<?php

declare(strict_types=1);

abstract class Page {
    
    private $title;
    private $headline;
    
    function __construct(string $title, string $headline) {
        $this->title = $title;
        $this->headline = $headline;
    }

    function view() : void {
        $this->init();
        
        $this->viewHeader();
        $this->viewForm();
        $this->viewContent();
        $this->viewFooter();
    }
    
    function init() : void {}
    
    function viewHeader() : void {
        $title = $this->title;
        $headline = $this->headline;
        include 'html/head.html.php';
    }
    
    function viewForm() : void {
        include 'html/form.html.php';
    }
    
    abstract function viewContent() : void;
    
    function viewFooter() : void {
        include 'html/foot.html.php';
    }
    
}
