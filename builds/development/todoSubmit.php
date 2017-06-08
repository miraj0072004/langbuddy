<?php
   require('includes/utilities.inc.php');

if (isset($_POST["modifyType"]))
{
   $q = 'UPDATE to_do_tab SET goal_name = :goal_name, date_intended = :date_intended where user_id =:user_id and language_id = :language_id and id=:id';
        $stmt = $pdo->prepare($q);
        $r = $stmt->execute(array(':goal_name' => $_POST['goalName'], ':date_intended' => $_POST['dateIntended'],':user_id' => $_POST['userId'],':language_id'=>$_SESSION['language_id'],':id'=>$_POST['toDoId'])); 
}
else
{
   $q = 'INSERT INTO to_do_tab (goal_name, date_intended,user_id,language_id) VALUES (:goal_name, :date_intended, :user_id, :language_id)';
   $stmt = $pdo->prepare($q);
   $r = $stmt->execute(array(':user_id' => $_POST['userId'], ':goal_name' => $_POST['goalName'], ':date_intended' => $_POST['dateIntended'],':language_id'=>$_SESSION['language_id']));  
}
   


$q= 'select * from to_do_tab t where t.user_id= '.$_POST['userId'].' and t.language_id= '. $_SESSION['language_id'];
$r = $pdo->query($q);
$r->setFetchMode(PDO::FETCH_ASSOC);
$toDos=array();
while ($toDo=$r->fetch())
{
   $toDos[$toDo["id"]]=[$toDo["goal_name"],$toDo["status"],$toDo["date_intended"],$toDo["date_completed"],$toDo["user_id"],$toDo["language_id"]]; 
}

$encodedTodo=json_encode($toDos);
echo $encodedTodo;
//echo $toDos;
?>