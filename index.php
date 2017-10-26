<?php

if ( $_COOKIE["session"] == "admin" )
{
    include './views/_head.html';
    if ( $_GET['page'] )
    {
        include './views/'.$_GET["page"].'.html';
    }
//    switch ( $_GET['page'] ) 
//    {
//        case 'index':
//            include './views/index.html';
//            break;
//        case 'gallery':
//            include './views/gallery.html';
//            break;
//        case 'auth':
//            include './views/auth.html';
//            break;
//        default:
//            echo "404";
//    }
    include './views/_end.html';
}
else // if not authorized
{
    include './views/auth.html';
}

?>