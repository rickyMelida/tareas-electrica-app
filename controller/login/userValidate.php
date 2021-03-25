<?php
    require_once ("../../models/class/User.php");
	require_once ("../../models/class/Responses.php");
	
    session_start();
	
    $newUser = new User();
	$res = new Responses();
	
    $con = $res->connDB();
	
    if ($con['status'] != '200') {
        header('Location: ../views/src/errorDB.php');
    }else {

        $user = addslashes(htmlspecialchars($_POST['user']));
        $pass = addslashes(htmlspecialchars($_POST['pass']));

        if($newUser->existUser($user, $pass) > 0) {
                $_SESSION['usuario'] = $user;
                $auth = $res->authUser(true);
                echo json_encode($auth);
        }else {
                $auth = $res->authUser(false);
                echo json_encode($auth);
        }
    }

?>
