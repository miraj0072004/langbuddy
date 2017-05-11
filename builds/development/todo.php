<?php # todo.php

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

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//          // Insert into the database:
//    if (isset($_POST["modifyType"]))
//    {
//        $q = 'UPDATE words_tab set word=:word, meaning=:meaning where user_id=:user_id and language_id = :language_id and id=:id';
//        $stmt = $pdo->prepare($q);
//        $r = $stmt->execute(array(':user_id' => $userId, ':word' => $_POST['word'], ':meaning' => $_POST['meaning'],':language_id'=>$_SESSION['language_id'],':id'=>$_POST['wordId']));
//    }
//    else
//    {
//        $q = 'INSERT INTO words_tab (user_id, word, meaning, language_id) VALUES (:user_id, :word, :meaning, :language_id)';
//        $stmt = $pdo->prepare($q);
//        $r = $stmt->execute(array(':user_id' => $userId, ':word' => $_POST['word'], ':meaning' => $_POST['meaning'],':language_id'=>$_SESSION['language_id']));
//    }   
        
//}

 $q1="select id,goal_name,status,date_intended,date_completed from to_do_tab t where t.user_id=$userId and language_id=$language_id";
   
    $r1 = $pdo->query($q1);
    
//    if ($r1 && $r1->rowCount() > 0) {

        // Set the fetch mode:
        $r1->setFetchMode(PDO::FETCH_CLASS, 'ToDo');

        // Records will be fetched in the view:
        include('views/todo.html');

//    } else { // Problem!
//        throw new Exception('No content is available to be viewed at this time.');
//    }


include('includes/footer.inc.php');
?>