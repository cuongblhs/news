<?php
require_once "functions.php";
require_once "DB.php";

class News extends DB{

	public function __construct(){
		parent::__construct();
	}

	public function getList($cond = "1", $order = ""){
		$group = "news.id";
		$order = " news.id DESC ";
		$cond = 'news.id_author = author.id and news.id_category = category.id ';
		$list = $this->select("news, author, category", " DISTINCT news.*, author.display_name, category.name", $cond, $order, $group);
		return $list;
	}

	public function getListNews($cond = "1", $order = "")
	{
		$list = $this->select("news","*", $cond, $order);
		return $list;
	}

    public function getTotalNews(){
        $cnt = count($this->getListNews());
		return $cnt;
    }

	public function getAlls($news_id, $order="")
	{
		$group = "news.id";
		$order = " news.id DESC ";
		$cond = "news.id_author = author.id and news.id_category = category.id and news.id='$news_id'";
		$list = $this->select("news, author, category", " DISTINCT news.*, author.display_name, category.name", $cond, $order, $group);
		if(count($list) == 1) return $list[0];
		else return "null";
	}

	public function removeItem($news_id){
		return $this->delete("news", "id ='$news_id'");
	}

	public function deleteNewsByAuthor(){ 
		if($this->delete("news", " news.id_author not in (SELECT id FROM author)")) return true;
		else return false;
	}

	public function deleteNewsByCategory(){ 
		if($this->delete("news", " news.id_category not in (SELECT id FROM category)")) return true;
		else return false;
	}

	public function addItem($data){
		$content = $data['content'];
		$banner_info = $_FILES['readUrl'];
		$target_dir = "dist/img/banners/";
        $target_file = $target_dir . htmlspecialchars( basename($banner_info["name"]));

		if($this->insert("news", array('id_author' => $_SESSION['news_id'],
										'id_category' => $data['id_category'],
										'banner_image' => $target_file,
										'title' => $data['title'],
										'content' => $content))) return true;
		else return false;
	}

	public function updateItem($data){
		$content = $data['content'];
		$banner_info = $_FILES['readUrl'];
		$target_dir = "dist/img/banners/";
        $target_file = $target_dir . htmlspecialchars( basename($banner_info["name"]));
		
		if($this->update("news", array('id_author' => $_SESSION['news_id'],
										'id_category' => $data['id_category_update'],
										'banner_image' => $target_file,
										'title' => $data['title_update'],
										'content' => $content,
										'update_at' => date('Y-m-d H:i:s')),
										"id='{$data['id_update']}'")) return true;
		else return false;
	}

	public function updateItem2($data){
		$content = $data['content'];
		
		if($this->update("news", array('id_author' => $_SESSION['news_id'],
										'id_category' => $data['id_category_update'],
										'title' => $data['title_update'],
										'content' => $content,
										'update_at' => date('Y-m-d H:i:s')),
										"id='{$data['id_update']}'")) return true;
		else return false;
	}

}
?>