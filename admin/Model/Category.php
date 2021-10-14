<?php
require_once "functions.php";
require_once "DB.php";

class Category extends DB{

	public function __construct(){
		parent::__construct();
	}

	public function getList($cond = "1", $order = ""){
		$order = " category.id DESC ";
		$list = $this->select("category", "*", $cond, $order);
		return $list;
	}

    public function getTotalCategory(){
        $cnt = count($this->getList());
		return $cnt;
    }

	public function deleteCategory($cate_id){
        if($this->delete("category", "id = '{$cate_id}'")) return true;
		else return false;
    }

	public function getItem($cate_id){
		$tmp = $this->getList("id='$cate_id'");
		if(count($tmp) == 1) return $tmp[0];
		else return "null";
	}

	public function updateItem($data){
		if($this->update("category", 
						array('name' => $data['name_update'],
							'update_at' => date('Y-m-d H:i:s')),
						"id='{$data['id_update']}'")) return true;
		else return false;
	}

	public function addItem($data){
		if($this->insert("category", array('name' => $data['name']))) return true;
		else return false;
	}

}
?>