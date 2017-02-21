<?php # words.php

// Need the utilities file:
require('includes/utilities.inc.php');
include('includes/functions.inc.php');
// Include the header:
$pageTitle = 'Your Private Study Area';
include('includes/header.inc.php');

$language_id=$_GET['language_id'];

try {    

getUserLanguages($user->getId(),$pdo,$language_id);
//include('views/languages.html');        
} catch (Exception $e) { // Catch generic Exceptions.
    include('views/error.html');
}
$userId=$user->getId();
 $q1="select id,word,meaning from words_tab t where t.user_id=$userId and language_id=$language_id";
   
    $r1 = $pdo->query($q1);
    
    if ($r1 && $r1->rowCount() > 0) {

        // Set the fetch mode:
        $r1->setFetchMode(PDO::FETCH_CLASS, 'Word');

        // Records will be fetched in the view:
        include('views/words.html');

    } else { // Problem!
        throw new Exception('No content is available to be viewed at this time.');
    }
include('includes/footer.inc.php');
?>