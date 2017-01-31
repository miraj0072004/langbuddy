<?php

class Language
{
    //attributes
    protected $id=null;
    protected $lang_name=null;
    
    
    function getId()
    {
        return $this->id;
    }
    
    function getLangName()
    {
        return $this->lang_name;
    }
    
    
}
?>