<?php
require_once "Controller.php";
class ViewController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        if (isset($_GET['search']) && $_GET['search'] !== "") {
            getView("news.list", array(
                'title' => 'Trang tin tức',
                'label' => 'Danh sách tin tức',
                'authors' => $this->authorObj->getListAuthor(),
                'news' => $this->newsObj->getListNews(),
                'categories' => $this->categoryObj->getList()
            ));
        } else {
            getView("home", array(
                'title' => 'Trang tin tức',
                'authors' => $this->authorObj->getListAuthor(),
                'news' => $this->newsObj->getListNews(),
                'total_news' => $this->newsObj->getTotalNews(),
                'categories' => $this->categoryObj->getList()
            ));
        }
    }

    public function getListNews()
    {

        if (isset($_GET['search']) && $_GET['search'] !== "") {
            getView("news.list", array(
                'title' => 'Trang tin tức',
                'label' => 'Danh sách tin tức theo từ khóa: ' . $_GET['search'],
                'authors' => $this->authorObj->getListAuthor(),
                'news' => $this->newsObj->getListNewsPagination(),
                'total_news' => $this->newsObj->getTotalNews(),
                'categories' => $this->categoryObj->getList()
            ));
        } else if (isset($_GET['cate_id'])) {
            getView("news.category", array(
                'title' => 'Trang tin tức',
                'label' => 'Danh sách theo chủ đề',
                'category_name' => $this->categoryObj->getItem($_GET['cate_id']),
                'authors' => $this->authorObj->getListAuthor(),
                'news_detail' => $this->newsObj->getNewsByCategory($_GET['cate_id']),
                'news' => $this->newsObj->getListNews(),
                'categories' => $this->categoryObj->getList()
            ));
        } else {
            getView("news.list", array(
                'title' => 'Trang tin tức',
                'label' => 'Danh sách tin tức',
                'authors' => $this->authorObj->getListAuthor(),
                'news' => $this->newsObj->getListNewsPagination(),
                'total_news' => $this->newsObj->getTotalNews(),
                'categories' => $this->categoryObj->getList()
            ));
        }
    }

    public function getDetailNews()
    {
        if (isset($_GET['n_id']) && !isset($_GET['search'])) {
            getView("news.detail", array(
                'title' => 'Trang tin tức',
                'label' => 'Chi tiết tin tức',
                'authors' => $this->authorObj->getListAuthor(),
                'news_detail' => $this->newsObj->getAlls($_GET['n_id']),
                'news' => $this->newsObj->getListNews(),
                'categories' => $this->categoryObj->getList(),
                'comments' => $this->commentObj->getList()
            ));
        } else {
            getView("news.list", array(
                'title' => 'Trang tin tức',
                'label' => 'Danh sách tin tức',
                'authors' => $this->authorObj->getListAuthor(),
                'news' => $this->newsObj->getListNewsPagination(),
                'total_news' => $this->newsObj->getTotalNews(),
                'categories' => $this->categoryObj->getList()
            ));
        }
    }

    public function getAboutUsView()
    {
        if (!isset($_GET['search'])) {
            getView("about.us", array(
                'title' => 'Trang tin tức',
                'news' => $this->newsObj->getList(),
                'categories' => $this->categoryObj->getList()
            ));
        } else {
            getView("news.list", array(
                'title' => 'Trang tin tức',
                'label' => 'Danh sách tin tức',
                'authors' => $this->authorObj->getListAuthor(),
                'news' => $this->newsObj->getListNewsPagination(),
                'total_news' => $this->newsObj->getTotalNews(),
                'categories' => $this->categoryObj->getList()
            ));
        }
    }
}
