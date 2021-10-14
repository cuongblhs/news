<?php
require_once "functions.php";
require_once "DB.php";

class Author extends DB{

	public function __construct(){
		parent::__construct();
	}

	// public function getList($order = ""){
	// 	$table = "author, news";
	// 	$keys = " DISTINCT author.*";
	// 	$cond = "author.id = news.id_author";
	// 	$groupby = "author.id";
	// 	$list = $this->select($table, $keys, $cond, "", $groupby);
	// 	return $list;
	// }

	public function getListAuthor($cond = "1", $order = ""){
		$list = $this->select("author", "*", $cond, $order);
		return $list;
	}

    public function getTotalAuthor(){
        $cnt = count($this->getListAuthor());
		return $cnt;
    }

	public function getItem($username){
		$tmp = $this->getListAuthor("username ='$username'");
		if(count($tmp) == 1) return $tmp[0];
		else return null;
	}

	public function getItemById($id){
		$tmp = $this->getListAuthor("id ='$id'");
		if(count($tmp) == 1) return $tmp[0];
		else return null;
	}
}
?>