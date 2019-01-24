<?php
session_start();
include 'apifunctions.php';
echo json_encode(getArticleList());
?>
