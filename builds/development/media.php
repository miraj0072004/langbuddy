<?php # media.php

// Need the utilities file:
require('includes/utilities.inc.php');
include('includes/functions.inc.php');
// Include the header:
$pageTitle = 'Your Private Study Area';
include('includes/header.inc.php');

if (isset ($_GET['language_id']))
{
    $language_id=$_GET['language_id'];
    $_SESSION['language_id']=$language_id;
}
else
{
    $language_id=$_SESSION['language_id'];
}

try {    

    getUserLanguages($user->getId(),$pdo,$language_id);
        
} catch (Exception $e) { // Catch generic Exceptions.
    include('views/error.html');
}

$userId=$user->getId();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST["modifyType"]))
    {
        $q = 'UPDATE media_tab SET name = :name, total_episodes = :total_episodes,completed = :completed,link = :link where user_id =:user_id and language_id = :language_id and id=:id';
        $stmt = $pdo->prepare($q);
        $r = $stmt->execute(array(':name' => $_POST['mediaName'], ':total_episodes' => $_POST['mediaTotal'],':completed' => $_POST['mediaCompleted'],':link'=>$_POST['mediaLink'],':user_id' => $userId,':language_id'=>$_SESSION['language_id'],':id'=>$_POST['mediaId']));  
    }
    else
    {
        $q = 'INSERT INTO media_tab (user_id, name, total_episodes,completed,language_id,link) VALUES (:user_id, :name, :total_episodes, :completed,:language_id,:link)';
        $stmt = $pdo->prepare($q);
        $r = $stmt->execute(array(':user_id' => $userId, ':name' => $_POST['mediaName'], ':total_episodes' => $_POST['mediaTotal'],':completed' => $_POST['mediaCompleted'],':language_id'=>$_SESSION['language_id'],':link'=>$_POST['mediaLink']));
        
    }
}

$q="select * from media_tab t where t.user_id=$userId and language_id=$language_id";

 $r = $pdo->query($q);
    
    if ($r && $r->rowCount() > 0) {

        // Set the fetch mode:
        $r->setFetchMode(PDO::FETCH_CLASS, 'Media');

        // Records will be fetched in the view:
        include('views/media.html');

    } else { // Problem!
        throw new Exception('No content is available to be viewed at this time.');
    }
include('includes/footer.inc.php');

?>