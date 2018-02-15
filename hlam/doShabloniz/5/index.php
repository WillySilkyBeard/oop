<?php 
include_once 'functions.php';
include_once 'm/messages.php';
$db = connect_db();

$comments = messages_all($db);

include('v/v_index.php');
