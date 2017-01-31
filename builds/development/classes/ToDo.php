<?php

class ToDo
{
    //attributes
    protected $id=null;
    protected $goal_name=null;
    protected $status=null;
    protected $date_intended=null;
    protected $date_completed=null;
    protected $user_id=null;
    protected $language_id=null;
    
    
    function getId()
    {
        return $this->id;
    }
    
    function getGoalName()
    {
        return $this->goal_name;
    }
    
    function getStatus()
    {
        return $this->status;
    }
    
    function getDateIntended()
    {
        return $this->date_intended;
    }
    
    function getDateCompleted()
    {
        return $this->date_completed;
    }
}
?>