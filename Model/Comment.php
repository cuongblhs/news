<?php
require_once "functions.php";
require_once "DB.php";

class Comment extends DB{

	public function __construct(){
		parent::__construct();
	}

	public function getList($cond = "1", $order = ""){
		$news_id = $_GET['n_id'];
		$cond = "comment.id_news = news.id and news.id = {$news_id}";
		$list = $this->select("comment, news", "comment.*, news.title", $cond, $order);
		return $list;
	}

	public function addItem($data){
		if($this->insert("comment", array('id_news' => $data['news_id'],
											'email' => $data['email'],
											'content' => $data['content']))) return true;
		else return false;
	}

}
?>