<?php

    if(isset($_REQUEST['logout'])){
        $_SESSION=array();
        
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 5542000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();

        header("Location: login_form.php");
    }

?>