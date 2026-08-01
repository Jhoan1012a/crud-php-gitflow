<?php
require_once 'config.php';
require_once 'users.php';

deleteUser($pdo, $_GET['id']);
header('Location: index.php');
exit;