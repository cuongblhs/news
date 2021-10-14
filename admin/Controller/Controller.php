<?php
if(!defined('__CONTROLLER__')) define('__CONTROLLER__', 'true');
require_once "Model/Author.php";
require_once "Model/News.php";
require_once "Model/Category.php";
require_once "Model/Comment.php";

class Controller{
    protected $authorObj;
    protected $newsObj;
    protected $categoryObj;
    protected $commentObj;

    public function __construct(){
        $this->authorObj = new Author;
        $this->newsObj = new News;
        $this->categoryObj = new Category;
        $this->commentObj = new Comment;

        sessionInit();
        setTimeZone();
    }
}
?>