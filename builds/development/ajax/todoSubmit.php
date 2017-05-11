<?php

if ($_POST)
{
   $q = 'INSERT INTO to_do_tab (goal_name, date_intended,user_id,language_id) VALUES (:goal_name, :date_intended, :user_id, :language_id)';
   $stmt = $pdo->prepare($q);
   $r = $stmt->execute(array(':user_id' => $userId, ':goal_name' => $_POST['goalName'], ':date_intended' => $_POST['dateIntended'],':language_id'=>$_SESSION['language_id'])); 
}

$q= 'select * from to_do_tab t where t.user_id= :user_id and t.language_id=:language_id';
$stmt = $pdo->prepare($q);
$r = $stmt->execute(array(':user_id' => $userId,':language_id'=>$_SESSION['language_id']));
$r->setFetchMode(PDO::FETCH_CLASS, 'ToDo');
$toDos=array();
while ($toDo=$r->fetch())
{
   $toDos[]=$toDo; 
}

$encodedTodo=json_encode($toDos);
echo $encodedTodo;
?>