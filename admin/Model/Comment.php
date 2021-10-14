<?php
require_once "functions.php";
require_once "DB.php";

class Comment extends DB{

	public function __construct(){
		parent::__construct();
	}

	public function getList($cond = "1", $order = ""){
		$cond = "comment.id_news = news.id";
		$order = " comment.id DESC ";
		$list = $this->select("comment, news", "comment.*, news.title", $cond, $order);
		return $list;
	}

    public function deleteCommentByNewsId($comment_id){
		return $this->delete("comment", "id ='$comment_id'");
	}

    public function deleteCommentByNews(){
        if($this->delete("comment", "comment.id_news not in (SELECT id FROM news)")) return true;
		else return false;
    }

}
?>