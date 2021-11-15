<?php
session_start();
session_destroy();
unset($_SESSION['navegacao']);
unset($_SESSION['erro_login']);
header('Location: ../index.php');