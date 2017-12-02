<?php

    if ( $_GET['page'] == 'blog' )
    {
        include './views/blog.html';
    }
    else if ( $_GET['page'] == 'post' )
    {
        include './views/post.html';
    }
    else if ( $_GET['page'] == 'index' )
    {
        include './views/index.html';
    }
    else if ( $_GET['page'] == '404' )
    {
        include './views/404.html';
    }

?>