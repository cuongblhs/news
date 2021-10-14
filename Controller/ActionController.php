<?php
require_once "Controller.php";
class ActionController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function addCommentAction($data){
        $res = $this->commentObj->addItem($data);
        if($res) notice_and_nextpage("Thành công!", "./?link=news_detail&n_id={$data['news_id']}");
        else notice_and_nextpage("Bình luận chưa được gửi!", "./?link=news_detail&n_id={$data['news_id']}");
    }

}
?>