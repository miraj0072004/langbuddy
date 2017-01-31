<?php

class Post
{
    //attributes
    protected $id=null;
    protected $title=null;
    protected $content=null;
    protected $user_id=null;
    protected $date_added=null;
    protected $date_updated=null;
    
    function getId()
    {
        return $this->id;
    }
    
    function getTitle()
    {
        return $this->title;
    }
    
    function getContent()
    {
        return $this->content;
    }
    
    function getDateAdded()
    {
        return $this->date_added;
    }
    
    function getDateUpdated()
    {
        return $this->date_updated;
    }
}
?>