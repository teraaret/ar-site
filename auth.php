<?php

$users = ['caesar'];

for ($i = 0; $i < count($users) ; $i++) {
    if ( $_POST['login'] == $users[$i] )
    {
        setcookie("session","admin",time()+3600);
    }
}

//if ( $_POST['login'] == 'admin' )
//{
//    setcookie("session","admin",time()+3600);
//}

if ( $_GET['action'] == 'logout' )
{
    setcookie("session","admin",time()-1);
}

header('location: /');

?>