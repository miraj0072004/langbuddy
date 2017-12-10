<?php # private.php

// Need the utilities file:
require('includes/utilities.inc.php');
include('includes/functions.inc.php');

// Include the header:
$pageTitle = 'Your Private Study Area';
include('includes/header.inc.php');
//create a default user for testing purposes
//$user=new User(); 
//$_SESSION['user']=$user;
$tabheaders;

try {    

getUserLanguages($user->getId(),$pdo);
//include('views/languages.html');
include('views/private.html');
        
} catch (Exception $e) { // Catch generic Exceptions.
    include('views/error.html');
}
// Include the footer:
include('includes/footer.inc.php');
?>