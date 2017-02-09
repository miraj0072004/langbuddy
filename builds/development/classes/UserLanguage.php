<?php

class UserLanguage
{
    //attributes
    protected $id=null;
    protected $user_id=null;
    protected $language_id=null;

    
    function getId()
    {
        return $this->id;
    }
    
    function getLanguage()
    {
        return $this->language_id;
    }

}
?>