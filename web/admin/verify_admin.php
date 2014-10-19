<?php

if(!isset($_SESSION['user']['admin_right'])){
    header("Location: login_form.php");
}

?>