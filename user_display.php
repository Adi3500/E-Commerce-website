<?php
session_start();

if(isset($_SESSION['user'])){
    $data = array('username' => $_SESSION['user']);
    echo json_encode($data);
} else {
    echo json_encode(array('username' => 'Login'));
}
?>