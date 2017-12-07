<?php

    if ( $_GET['page'] == 'blog' ) { include './views/blog.html'; }
    if ( $_GET['page'] == 'post' ) { include './views/post.html'; }
    if ( $_GET['page'] == 'index' ) { include './views/index.html'; }
    if ( $_GET['page'] == '404' ) { include './views/404.html'; }

    if ( $_GET['page'] == 'santa' ) { include './views/santa.html'; }

?>