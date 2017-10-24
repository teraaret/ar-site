<?php

if ( $_COOKIE["session"] == "admin" )
{
    switch ( $_GET['page'] ) 
    {
        case 'index':
            include './views/_head.html';
            include './views/index.html';
            include './views/_end.html';
            break;
        case 'gallery':
            include './views/_head.html';
            include './views/gallery.html';
            include './views/_end.html';
            break;
        case 'auth':
            include './views/_head.html';
            include './views/auth.html';
            include './views/_end.html';
            break;
        default:
            echo "404";
    }
}

else 
{
    echo hash("sha256", $_POST['login']);
    include './views/auth.html';
}

?>