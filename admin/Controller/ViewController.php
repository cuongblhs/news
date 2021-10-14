<?php
require_once "Controller.php";
class ViewController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function getIndex(){
        
        $check = $this->authorObj->checkLoggedIn();
        if($check == "Role_None"){
            getView("login", array('title' => 'News - Admin page'));
        }
        else{
            getView("home", array('title' => 'News - Admin page',
                'display_name' => $this->authorObj->getItem($_SESSION['news_user'])['display_name'],
                'total_author' => $this->authorObj->getTotalAuthor(),
                'total_news' => $this->newsObj->getTotalNews(),
                'total_category' => $this->categoryObj->getTotalCategory()
            ));
        }
    }

    public function getListAuthor()
    {
        $check = $this->authorObj->checkLoggedIn();
        if($check == "Role_None"){
            getView("login", array('title' => 'News - Admin page'));
        }
        else{
            getView("author.manage", array('title' => 'News - Admin page',
                'display_name' => $this->authorObj->getItem($_SESSION['news_user'])['display_name'],
                'list_author' => $this->authorObj->getAlls(),
                'authors' => $this->authorObj->getListAuthor()
            ));
        }
    }
    
    public function getListCategory()
    {
        $check = $this->authorObj->checkLoggedIn();
        if($check == "Role_None"){
            getView("login", array('title' => 'News - Admin page'));
        }
        else{
            getView("category.manage", array('title' => 'News - Admin page',
                'display_name' => $this->authorObj->getItem($_SESSION['news_user'])['display_name'],
                'categories' => $this->categoryObj->getList()
            ));
        }
    }

    public function getListComment()
    {
        $check = $this->authorObj->checkLoggedIn();
        if($check == "Role_None"){
            getView("login", array('title' => 'News - Admin page'));
        }
        else{
            getView("comment.manage", array('title' => 'News - Admin page',
                'display_name' => $this->authorObj->getItem($_SESSION['news_user'])['display_name'],
                'comments' => $this->commentObj->getList()
            ));
        }
    }
    
    public function getListNews()
    {
        $check = $this->authorObj->checkLoggedIn();
        if($check == "Role_None"){
            getView("login", array('title' => 'News - Admin page'));
        }
        else{
            getView("news.manage", array('title' => 'News - Admin page',
                'display_name' => $this->authorObj->getItem($_SESSION['news_user'])['display_name'],
                'news' => $this->newsObj->getList()
            ));
        }
    }
    
    public function addNewsView()
    {
        $check = $this->authorObj->checkLoggedIn();
        if($check == "Role_None"){
            getView("login", array('title' => 'News - Admin page'));
        }
        else{
            getView("news.add", array('title' => 'News - Admin page',
                'display_name' => $this->authorObj->getItem($_SESSION['news_user'])['display_name'],
                'categories' => $this->categoryObj->getList(),
                'authors' => $this->authorObj->getListAuthor()
            ));
        }
    }
    public function updateNewsView()
    {
        $check = $this->authorObj->checkLoggedIn();
        if($check == "Role_None"){
            getView("login", array('title' => 'News - Admin page'));
        }
        else{
            if(isset($_GET['news_id'])){
                getView("news.update", array('title' => 'News - Admin page',
                'display_name' => $this->authorObj->getItem($_SESSION['news_user'])['display_name'],
                'categories' => $this->categoryObj->getList(),
                'authors' => $this->authorObj->getListAuthor(),
                'news_detail' => $this->newsObj->getAlls($_GET['news_id'])
            ));
            }
        }
    }
}
?>