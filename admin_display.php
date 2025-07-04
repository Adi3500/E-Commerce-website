<?php
session_start();

if(isset($_SESSION['username'])){
    $data = array('username' => $_SESSION['username']);
    echo json_encode($data);
} else {
    echo json_encode(array('username' => 'Login'));
}
?>