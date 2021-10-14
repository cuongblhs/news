<?php
require_once "functions.php";
require_once "DB.php";

class Category extends DB{

	public function __construct(){
		parent::__construct();
	}

	public function getList($cond = "1", $order = ""){
		$list = $this->select("category", "*", $cond, $order);
		return $list;
	}

    public function getTotalCategory(){
        $cnt = count($this->getList());
		return $cnt;
    }

	public function getItem($cate_id){
		$tmp = $this->getList("id='$cate_id'");
		if(count($tmp) == 1) return $tmp[0];
		else return "null";
	}
}
?>