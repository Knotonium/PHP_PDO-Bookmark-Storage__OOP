<?php

declare(strict_types=1);
session_start();
require_once 'inc/nicoloader.inc.php';
require_once 'inc/session.inc.php'; 

class IndexPage extends Page {
    
    public function __construct() {
        parent::__construct('Bookmarks', 'Bookmarks');
    }
      
    function viewContent() : void {
        $itemsDao = new ItemsDao();
        $items = $itemsDao->readAll();
        include 'html/items.html.php';
    }  
}
 
$page = new IndexPage();
$page->view();
