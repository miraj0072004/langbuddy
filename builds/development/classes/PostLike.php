<?php

class PostLike
{
    //attributes
    protected $id=null;
    protected $user_id=null;
    protected $post_id=null;
    protected $likes=null;
    protected $dislikes=null;
    
    function getId()
    {
        return $this->id;
    }
    
    function getLikes()
    {
        return $this->likes;
    }
    
    function getDislikes()
    {
        return $this->dislikes;
    }
}
?>