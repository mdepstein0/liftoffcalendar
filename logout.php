<?php
session_start();
 
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    unset($_SESSION['name']);
}
 
header('Location: index.php');
