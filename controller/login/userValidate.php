<?php
    require_once '../../models/class/User.php';
	require_once '../../models/class/Responses.php';
	
    session_start();
	
    $newUser = new User();
	$response = new Responses();
	
    $conectionDB = $response->connDB();
    
	
    if ($conectionDB['status'] != '200') {
        header('Location: ../views/src/errorDB.php');
    }else {
        $user = addslashes(htmlspecialchars($_POST['user']));
        $pass = addslashes(htmlspecialchars($_POST['pass']));

        if($newUser->existUser($user, $pass) > 0) {
                $_SESSION['usuario'] = $user;
                $auth = $response->authUser(true);
                echo json_encode($auth);
        }else {
                $auth = $response->authUser(false);
                echo json_encode($auth);
        }
    }

?>
