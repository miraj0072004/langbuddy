<?php

class Media
{
    //attributes
    protected $id=null;
    protected $name=null;
    protected $total_episodes=null;
    protected $completed=null;
    protected $description=null;
    protected $user_id=null;
    protected $language_id=null;
    protected $link=null;
    
    
    function getId()
    {
        return $this->id;
    }
    
    function getName()
    {
        return $this->name;
    }
    
    function getTotalEpisodes()
    {
        return $this->total_episodes;
    }
    
    function getCompleted()
    {
        return $this->completed;
    }
    
    function getDescription()
    {
        return $this->description;
    }
    
    function getLink()
    {
        return $this->link;
    }
    
    
}
?>