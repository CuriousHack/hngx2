<?php
require 'headers.php';
$config = require "config.php";
require "database.php";
require "Validator.php";
require "controllers/PersonController.php";

$db = new Database($config['database']);
$getdb = $db->getDb();
$request = $_SERVER['REQUEST_METHOD'];
$person = new PersonController($getdb);
// $user_id = isset($_GET['user_id']) ?? die();

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
if ($request === 'GET') {
    //query to return user record;
    require "read.php";
} elseif ($request === 'POST') {
    //query to create new user record
    require 'create.php';
} elseif ($request === 'PUT') {
    //query to update user record
    require 'update.php';
} elseif ($request === 'PATCH') {
    //query to update user record
    require 'update.php';
} elseif ($request === 'DELETE') {
    //query to delete user record
    require 'delete.php';
} else {
    //not a valid query
    abort("Invalid request method", 400);
}
