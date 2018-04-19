<?php
 
require_once 'config.php';
 
if (!isLoggedIn())
{
    header('Location: index.php');
}