<?php
session_start();

// Save user information to session
$_SESSION['user_name'] = 'Pannes Diba Sabila';
$_SESSION['user_age'] = 20;

echo "User information saved in session.";
?>
