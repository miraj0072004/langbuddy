<?php

class PostComment
{
    //attributes
    protected $id=null;
    protected $user_id=null;
    protected $post_id=null;
    protected $comment=null;
    protected $date_entered=null;
    
    function getId()
    {
        return $this->id;
    }
    
    function getComment()
    {
        return $this->comment;
    }
    
    function getDateEntered()
    {
        return $this->date_entered;
    }
}
?>