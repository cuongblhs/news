<?php
    require_once "Controller/Route.php";
    $route = new Route("ViewController@getIndex");

    // Add account for author
    $route->post("action", "add_author", "ActionController@addAuthorAction");
    // Login
    $route->post("action", "loginAct", "ActionController@login");
    // $route->get("action", "loginAct", "ViewController@getIndex");
    $route->get("action", "logout", "ActionController@logout");
    // Personal info
    $route->get("link", "authors", "ViewController@getListAuthor");
    $route->post("action", "delete_author", "ActionController@deleteItemAction");
    $route->post("action", "get_author_act", "ActionController@getAuthorAction");
    $route->post("action", "update_author", "ActionController@updateAuthorAction");
    $route->post("action", "change_password_act", "ActionController@changePasswordAction");

    // Category
    $route->get("link", "category", "ViewController@getListCategory");
    $route->post("action", "delete_category", "ActionController@deleteCategoryAction");
    $route->post("action", "get_category_act", "ActionController@getCategoryAction");
    $route->post("action", "update_category", "ActionController@updateCategoryAction");
    $route->post("action", "add_category", "ActionController@addCategoryAction");

    // comment
    $route->get("link", "comment", "ViewController@getListComment");
    $route->post("action", "delete_comment", "ActionController@deleteCommentAction");

    // news
    $route->get("link", "news", "ViewController@getListNews");
    $route->post("action", "delete_news_act", "ActionController@deleteNewsAction");
    $route->get("link", "news_add", "ViewController@addNewsView");
    $route->post("action", "add_news_act", "ActionController@addNewsAction");
    $route->post("action", "get_news_act", "ActionController@getNewsAction");
    $route->get("link", "news_update", "ViewController@updateNewsView");
    $route->post("action", "update_news_act", "ActionController@updateNewsAction");
    

    $route->process();
?>