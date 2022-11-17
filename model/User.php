<?php

class User{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;



    public function __construct($id=null, $firstname=null, $lastname=null, $email=null, $password=null){
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->password=$password;

    }
   
 



}



?>