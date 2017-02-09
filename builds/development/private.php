<?php # private.php

// Need the utilities file:
require('includes/utilities.inc.php');

// Include the header:
$pageTitle = 'Your Private Study Area';
include('includes/header.inc.php');
$user=new User();

try {    

getUserLanguages($user->getId(),$pdo);
        
} catch (Exception $e) { // Catch generic Exceptions.
    include('views/error.html');
}

//function to get the logged in user's languages
function getUserLanguages($userId,$pdo)
{
    $q="select id,lang_name from languages_tab a where a.id in (select language_id from user_languages_tab t where t.user_id=$userId)";
    //$q="select id,lang_name from languages_tab a where a.id in (select language_id from user_languages_tab t)";
    $r = $pdo->query($q);
    
    if ($r && $r->rowCount() > 0) {

        // Set the fetch mode:
        $r->setFetchMode(PDO::FETCH_CLASS, 'Language');

        // Records will be fetched in the view:
        include('views/private.html');

    } else { // Problem!
        throw new Exception('No content is available to be viewed at this time.');
    }
}
// Include the footer:
include('includes/footer.inc.php');
?>