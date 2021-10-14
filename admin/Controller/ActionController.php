<?php
require_once "Controller.php";
class ActionController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function login($loginData){
        $loginResp = $this->authorObj->login($loginData['username'], _hash($loginData['password']));
        if($loginResp == "loginOK") nextpage("./.");
        else notice_and_nextpage("Sai tài khoản hoặc mật khẩu!", "./.");
    }

    public function logout(){
        $this->authorObj->logout();
        nextpage("./.");
    }

    // Author
    
    public function addAuthorAction($data){
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        
        if(!$this->authorObj->checkUserName($data['username'])) notice_and_nextpage("Tài khoản đã tồn tại. Hãy kiểm tra lại !", "./?link=authors");
        else if($data['password'] !== $data['repassword']) notice_and_nextpage("Hãy chú nhập lại mật khẩu đúng !", "./?link=authors");
        else if($this->authorObj->addItem(($data))){
            notice_and_nextpage("Thêm thành công !", "./?link=authors");
        }else{
            notice_and_nextpage("Thất bại. Hãy thử lại sau!!!", "./?link=authors");
        }
    }

    public function deleteItemAction($data){
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        $username = getSession('news_user');

		if($username != $this->authorObj->getItem($data['item_id'])){
			if($this->authorObj->removeItem($data['item_id'])
            && $this->newsObj->deleteNewsByAuthor()
            && $this->commentObj->deleteCommentByNews())
			// notice_and_nextpage("Thành công", "./?link=authors");
            echo "DeleteItemOK";
		}
		else echo "DeleteItemFailed";//notice_and_nextpage("Thất bại", "./?link=authors");
    }

    public function getAuthorAction($data){
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        echo json_encode($this->authorObj->getItemById($data['author_id']));
    }
    
    public function updateAuthorAction($data)
    {
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        else if($this->authorObj->updateItem(($data))){
            notice_and_nextpage("Sửa thành công !", "./?link=authors");
        }else{
            notice_and_nextpage("Thất bại. Hãy thử lại sau!!!", "./?link=authors");
        }
    }

    public function changePasswordAction($data)
    {
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        if($data['new_password'] != $data['re_new_password']) notice_and_nextpage("Hãy chú nhập lại mật khẩu đúng !", "./?link=authors");
        else if($this->authorObj->changePassword(($data))){
            notice_and_nextpage("Đổi mật khẩu thành công !", "./?link=authors");
        }else{
            notice_and_nextpage("Thất bại. Hãy thử lại sau!!!", "./?link=authors");
        }
    }

    //Category
    public function deleteCategoryAction($data){ 
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        if($this->categoryObj->deleteCategory($data['c_id'])
        && $this->newsObj->deleteNewsByCategory()
        && $this->commentObj->deleteCommentByNews())
        echo "DeleteCategoryOK";
		else echo "DeleteCategoryFailed";
    }

    public function getCategoryAction($data){
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        echo json_encode($this->categoryObj->getItem($data['c_id']));
    }

    public function updateCategoryAction($data)
    {
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        if($this->categoryObj->updateItem($data)){
            notice_and_nextpage("Sửa thành công!", "./?link=category");
        }else 
        notice_and_nextpage("Sửa thất bại. Hãy thử lại sau!", "./?link=category");
    }
    
    public function addCategoryAction($data){
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        if($this->categoryObj->addItem(($data))){
            notice_and_nextpage("Thêm thành công !", "./?link=category");
        }else{
            notice_and_nextpage("Thất bại. Hãy thử lại sau!!!", "./?link=category");
        }
    }

    // Comment
    public function deleteCommentAction($data){ 
        if($this->commentObj->deleteCommentByNewsId($data['cmt_id']))
        echo "DeleteCommentOK";
		else echo "DeleteCommentFailed";
    }

    // News
    
    public function deleteNewsAction($data){ 
        if($this->newsObj->removeItem($data['news_id'])
        && $this->commentObj->deleteCommentByNews())
        echo "DeleteNewsOK";
		else echo "DeleteNewsFailed";
    }

    public function checkUploadBannerImage($file)
    {
        $target_dir = "dist/img/banners/";
        $target_file = $target_dir . date("HisYmd") . htmlspecialchars( basename($file["name"]));
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (!file_exists($target_dir)) mkdir($target_dir, 0777);
        // Check file size
        if ($file["size"] > 5000000) {
            notice("Kích thước ảnh phải < 5MB");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            notice("Chỉ cho phép ảnh là JPG, JPEG, PNG & GIF.");
            $uploadOk = 0;
        }
        return $uploadOk;

    }
    
    public function addNewsAction($data){
        if($this->authorObj->checkLoggedIn() == "Role_None") return;

        // Check if image file is a actual image or fake image
        if(isset($_POST["addNewsBtn"])) {
            $check = getimagesize($_FILES["readUrl"]["tmp_name"]);
            if($check !== false) {
                $check = $this->checkUploadBannerImage($_FILES["readUrl"]);
                if($check){
                    $target_dir = "dist/img/banners/";
                    $target_file = $target_dir . htmlspecialchars( basename($_FILES["readUrl"]["name"]));
                    if (!file_exists($target_file))
                        move_uploaded_file($_FILES["readUrl"]["tmp_name"], $target_file);
                    if($this->newsObj->addItem(($data))){
                        notice_and_nextpage("Thêm thành công !", "./?link=news_add");
                    }else{
                        notice_and_nextpage("Thất bại. Hãy thử lại sau!!!", "./?link=news");
                    }
                }else{
                    nextpage("./?link=news_add");
                }
            } else {
                notice("Hãy upload banner là ảnh!!!");
            }
        }
    }

    public function getNewsAction($data)
    {
        if($this->authorObj->checkLoggedIn() == "Role_None") return;
        echo json_encode($this->newsObj->getAlls($data['news_id']));
    }

    public function updateNewsAction($data)
    {
        if(isset($_POST["updateNewsBtn"])) {
            $check = getimagesize($_FILES["readUrl"]["tmp_name"]);
            if($check !== false) {
                $check = $this->checkUploadBannerImage($_FILES["readUrl"]);
                if($check){
                    $target_dir = "dist/img/banners/";
                    $target_file = $target_dir . htmlspecialchars( basename($_FILES["readUrl"]["name"]));
                    if (!file_exists($target_file))
                        move_uploaded_file($_FILES["readUrl"]["tmp_name"], $target_file);
                    if($this->newsObj->updateItem(($data))){
                        notice_and_nextpage("Sửa thông tin thành công !", "./?link=news");
                    }else{
                        notice_and_nextpage("Thất bại. Hãy thử lại sau!!!", "./?link=news");
                    }
                }else{
                    nextpage("./?link=news_update&news_id={$data['id_update']}");
                }
            } else {
                if($this->newsObj->updateItem2(($data))){
                    notice_and_nextpage("Sửa thông tin thành công !", "./?link=news");
                }else{
                    notice_and_nextpage("Thất bại. Hãy thử lại sau!!!", "./?link=news");
                }
            }
        }
    }

}
?>