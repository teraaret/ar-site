<?php

    if ( $_GET['page'] == 'index' ) { include './views/index.html'; }
    if ( $_GET['page'] == '404' ) { include './views/404.html'; }
    if ( $_GET['page'] == 'blog' ) 
    { 
        include '/app/database.php';
        $DATABASE = new DATABASE();
        $posts = $DATABASE->load_all_posts();
        include './views/blog.html';
    }
    if ( $_GET['page'] == 'tag' ) 
    { 
        $tag = $_GET['tag'];
        include '/app/database.php';
        $DATABASE = new DATABASE();
        $posts = $DATABASE->load_by_tag($tag);
        include './views/blog.html';
    }
    if ( $_GET['page'] == 'post' ) 
    { 
        $id = $_GET['id'];
        include '/app/database.php';
        $DATABASE = new DATABASE();
        $post = $DATABASE->load_post($id);
        include './views/post.html';
    }

    if ( $_GET['page'] == 'santa' ) { include './views/santa.html'; }

?>