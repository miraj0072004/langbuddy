<?php # links.php

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
        $q = 'UPDATE links_tab SET link_name = :link_name, link = :link where user_id =:user_id and language_id = :language_id and id=:id';
        $stmt = $pdo->prepare($q);
        $r = $stmt->execute(array(':link_name' => $_POST['linkName'], ':link' => $_POST['link'],':user_id' => $userId,':language_id'=>$_SESSION['language_id'],':id'=>$_POST['linkId']));  
    }
    else
    {
        $q = 'INSERT INTO links_tab (user_id, link_name,link,language_id) VALUES (:user_id,:link_name,:link,:language_id)';
        $stmt = $pdo->prepare($q);
        $r = $stmt->execute(array(':user_id' => $userId, ':link_name' => $_POST['linkName'],':link'=>$_POST['link'],':language_id'=>$_SESSION['language_id']));
        
    }
}

$q="select * from links_tab t where t.user_id=$userId and language_id=$language_id";

 $r = $pdo->query($q);
    
//    if ($r && $r->rowCount() > 0) {

        // Set the fetch mode:
        $r->setFetchMode(PDO::FETCH_CLASS, 'Link');

        // Records will be fetched in the view:
        include('views/links.html');

//    } else { // Problem!
//        throw new Exception('No content is available to be viewed at this time.');
//    }
include('includes/footer.inc.php');

?>