<?php

class Word
{
    //attributes
    protected $id=null;
    protected $user_id=null;
    protected $language_id=null;
    protected $word=null;
    protected $meaning=null;
    
    function getWord()
    {
        return $this->word;
    }
    
    function getMeaning()
    {
        return $this->meaning;
    }
    
    function getId()
    {
        return $this->id;
    }
}

?>