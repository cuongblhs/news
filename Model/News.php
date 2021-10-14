<?php
require_once "functions.php";
require_once "DB.php";

class News extends DB{

	public function __construct(){
		parent::__construct();
	}

	public function getListNewsPagination($cond = "1", $order = ""){
		$current_page = isset($_GET['page'])? $_GET['page']: 1;
		$rownum = 5;
		// tổng số trang
		$total_records = count($this->getList());
		$total_page = ceil($total_records / $rownum);
		
		// Giới hạn current_page trong khoảng 1 đến total_page
		if ($current_page > $total_page){
			$current_page = $total_page;
		}
		else if ($current_page < 1){
			$current_page = 1;
		}
		// Tìm Start
		$start = ($current_page - 1) * $rownum;
		$order = " news.id DESC ";
		$group = " news.id";
		$cond = " news.id_author = author.id and news.id_category = category.id ";
		if(isset($_GET['search'])){
			$search = addslashes($_GET['search']);
		 	if($search !== "") $cond .= " and news.title like N'%".$search."%' ";
		}
		$limit = " LIMIT {$start}, {$rownum} ";
		$list = $this->select("news, author, category", " DISTINCT news.*, author.display_name, category.name", $cond, $order, $group, $limit);
	
		return $list;
	}

	public function getListNews($cond = "1", $order = "")
	{
		$group = "news.id";
		$cond = "news.id_author = author.id and news.id_category = category.id";
		$key = " DISTINCT news.*, author.display_name, category.name";
		$list = $this->select("news, author, category", $key, $cond, $order, $group);
		return $list;
	}

	public function getAlls($news_id, $order="")
	{
		$group = "news.id";
		$cond = "news.id_author = author.id and news.id_category = category.id and news.id='$news_id'";
		$list = $this->select("news, author, category", " DISTINCT news.*, author.display_name, category.name", $cond, $order, $group);
		if(count($list) == 1) return $list[0];
		else return "null";
	}
	public function getList($cond = "1", $order = "")
	{
		$list = $this->select("news", "*");
		return $list;
	}

    public function getTotalNews(){
        $cnt = count($this->getList());
		return $cnt;
    }

	public function getNewsByCategory($cate_id)
	{
		$current_page = isset($_GET['page'])? $_GET['page']: 1;
		$rownum = 2;
		// tổng số trang
		$total_records = count($this->getListNews());
		$total_page = ceil($total_records / $rownum);
		
		// Giới hạn current_page trong khoảng 1 đến total_page
		if ($current_page > $total_page){
			$current_page = $total_page;
		}
		else if ($current_page < 1){
			$current_page = 1;
		}
		// Tìm Start
		$start = ($current_page - 1) * $rownum;

		$cond = "news.id_author = author.id AND news.id_category = category.id AND news.id_category = '{$cate_id}'";
		$order = "news.update_at DESC";
		$group = "news.id";
		$limit = " LIMIT {$start}, {$rownum} ";
		$list = $this->select("news, author, category", " DISTINCT news.*, author.display_name, category.name", $cond, $order, $group, $limit);
		return $list;
	}

}
?>