<?php 
session_start();
error_reporting(0);

require 'core/connect.php';
require 'functions/users.php';
require 'functions/sanitize.php';

$errors = array();
?>