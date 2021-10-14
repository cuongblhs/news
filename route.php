<?php
    require_once "Controller/Route.php";
    $route = new Route("ViewController@getIndex");
    $route->get("link", "news_list", "ViewController@getListNews");
    $route->get("link", "news_detail", "ViewController@getDetailNews");
    $route->get("link", "about_us", "ViewController@getAboutUsView");
    $route->post("action", "add_comment_act", "ActionController@addCommentAction");
    
    
    $route->process();
?>