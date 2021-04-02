<?php

session_start();
echo $_SESSION['text'];

echo '<br>';
$_SESSION['count']++;
echo $_SESSION['count'];