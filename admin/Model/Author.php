<?php
require_once "functions.php";
require_once "DB.php";

class Author extends DB{

	public function __construct(){
		parent::__construct();
	}

	public function getList($order = ""){
		$table = "author, news";
		$keys = " DISTINCT author.*, count(news.id) as cnt";
		$order = " author.id DESC ";
		$cond = "author.id = news.id_author";
		$groupby = "author.id";
		$limit = "";
		$list = $this->select($table, $keys, $cond, $order, $groupby, $limit);
		return $list;
	}

	public function getListAuthor($cond = "1", $order = ""){
		$current_page = isset($_GET['page'])? $_GET['page']: 1;
		$rownum = 6;
		// tổng số trang
		$total_records = count($this->getAlls());
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

		$order = " author.id DESC ";
		$groupby = "author.id";
		$limit = " LIMIT {$start}, {$rownum} ";
		
		$list = $this->select("author", "*", $cond, $order, $groupby, $limit);
		return $list;
	}

	public function getAlls($cond = "1", $order = "")
	{
		$list = $this->select("author", "*");
		return $list;
	}

    public function getTotalAuthor(){
        $cnt = count($this->getAlls());
		return $cnt;
    }

	public function getItem($username){
		$tmp = $this->select("author", "*", "username ='$username'");
		if(count($tmp) == 1) return $tmp[0];
		else return null;
	}

	public function getItemById($id){
		$tmp = $this->getAlls("id ='$id'");
		if(count($tmp) == 1) return $tmp[0];
		else return null;
	}

	public function login($username, $password){
		$cond = "username='$username' AND password='$password'";
		$check = $this->select("author", "*", $cond, "", "");
        
		if(count($check) == 1){
			$_SESSION['news_id'] = $check[0]['id'];
			$_SESSION['news_user'] = $check[0]['username'];
			$_SESSION['news_pass'] = $password;
            
			return "loginOK";
		}
		else{
			return "loginFailed";
		}
	}

	public function logout(){
		unset($_SESSION['news_id']);
		unset($_SESSION['news_user']);
		unset($_SESSION['news_pass']);
	}

	public function checkLoggedIn(){
		if(!isset($_SESSION['news_user']) || !isset($_SESSION['news_pass'])) return "Role_None";
		$check = $this->select("author", "*", "username ='{$_SESSION['news_user']}' AND password='{$_SESSION['news_pass']}'");
		if(count($check) != 1){
			$this->logout();
			return "Role_None";
		}
		else{
			return "Role_User";
		}
	}

	public function checkUsername($username){
		return count($this->getListAuthor("username='$username'")) == 0;
	}


	public function removeItem($author_id){
		if($this->delete("author", "id ='$author_id'")) return true;
		else return false;
	}

	public function addItem($data){
		$img_dir = "./dist/img/avatar.png";
		if($this->insert("author", array('username' => $data['username'],
										'password' => _hash($data['password']),
										'avatar' => $img_dir,
										'display_name' => $data['display_name'],
										'phone' => $data['phone']
										))) return true;
		else return false;
	}

	public function updateItem($data){
		if($this->update("author", 
						array('display_name' => $data['update_display_name'],
							'phone' => $data['update_phone'],
							'update_at' => date('Y-m-d H:i:s')),
						"id='{$data['update_id']}'")) return true;
		else return false;
	}
	
	public function changePassword($data){
		if($this->update("author", 
						array('password' => _hash($data['new_password']),
							'update_at' => date('Y-m-d H:i:s')),
						"id='{$data['author_id']}'")) return true;
		else return false;
	}
}
?>