<?php
 // A list of permitted file extensions
    $allowed = array('png', 'jpg', 'gif','zip');
     if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

     $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
     if(!in_array(strtolower($extension), $allowed)){
     echo '{"status":"error"}';
     exit;
    }
    $target_file = $_SERVER["DOCUMENT_ROOT"].'/demo_news/admin/dist/img/contents/'.$_FILES['file']['name'];
    $result = '/demo_news/admin/dist/img/contents/'.$_FILES['file']['name'];
    if (!file_exists($target_file)){
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
    }
    echo $result;
     exit;
    }
     echo '{"status":"error"}';
     exit;
    ?>