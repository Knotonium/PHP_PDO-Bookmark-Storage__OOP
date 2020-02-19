<?php

declare(strict_types=1);
session_start();
require_once 'inc/nicoloader.inc.php';
require_once 'inc/session.inc.php'; 

class IndexPage extends Page {
    
    public function __construct() {
        parent::__construct('Bookmarks', 'Bookmarks');
    }
    
    function init(){
       // $id = 0;
        $itemsDao = new itemsDao();
        //$items = $itemsDao->readOne(intVal($id));

        // if ($items == null) {
        // $items = new items();
        // }
        if (isSet($_POST['shortbtn'])) {
            $items = new items();  //verschoben
            $items->setUrl($_POST['url']);
            $items->setCode($_POST['code']);
           // if ($id == 0) {
                $itemsDao->create($items);
           // }
        }
    }

    function viewContent() : void {
        $itemsDao = new ItemsDao();
        $items = $itemsDao->readAll();
        include 'html/items.html.php';
    }  
}
 
$page = new IndexPage();
$page->view();
