<?php

session_start();

$results = null;

if(isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $answer = $_SESSION['results']['answer'];
    $palindrome = $_SESSION['results']['palindrome'];
    $vowelCount = $_SESSION['results']['vowelCount'];
    $shift = $_SESSION['results']['shift'];
    $id = $_SESSION['results']['id'];

    $_SESSION['results'] = null;
}



// 

require 'index-view.php';