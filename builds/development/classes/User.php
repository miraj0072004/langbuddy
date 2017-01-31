<?php

class User
{
    //attributes
    protected $id=null;
    protected $user_name=null;
    protected $email=null;
    protected $password=null;
    protected $date_added=null;
    protected $user_type=null;
    
    // Method returns the user ID:
    function getId() {
        return $this->id;
    }
    
    // Method returns a Boolean if the user is an administrator:
    function isAdmin() {
        return ($this->userType == 'admin');
    }
    
    // Method returns a Boolean indicating if the user is an administrator
    // or if the user is the original author of the provided page:
    function canEditPage(Page $page) {
        return ($this->isAdmin() || ($this->id == $page->getCreatorId()));
    }
	
	    // Method returns a Boolean indicating if the user is an administrator
    // or if the user is the original author of the provided post:
    function canEditPost(Post $post) {
        return ($this->isAdmin() || ($this->id == $post->getCreatorId()));
    }
    
    // Method returns a Boolean indicating if the user is an administrator or an author:
    function canCreatePage() {
        return ($this->isAdmin() || ($this->userType == 'author'));
    }
	
	    // Method returns a Boolean indicating if the user is an administrator or an author:
    function canCreatePost() {
        return ($this->isAdmin() || ($this->userType == 'author'));
    }
    
}

?>