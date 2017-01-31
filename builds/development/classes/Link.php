<?php

class Link
{
    //attributes
    protected $id=null;
    protected $link_name=null;
    protected $link=null;
    protected $user_id=null;
    protected $language_id=null;
    
    
    function getId()
    {
        return $this->id;
    }
    
    function getLinkName()
    {
        return $this->link_name;
    }
    
    function getLink()
    {
        return $this->link;
    }
    
    
}
?>