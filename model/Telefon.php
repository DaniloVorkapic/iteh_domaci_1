<?php

class Telefon{
    private $id;
    private $model;
    private $description;
    private $price;
    private $user;
 



    public function __construct($id=null,$model=null,$description=null,$price=null,$user=null ) 
    {
        $this->id=$id;
        $this->model=$model;
        $this->description=$description;
        $this->price=$price;
       
        $this->user=$user; 

    }

    public static function getAllPhones($conn){
        
        $query= "select * from telefon p inner join user u on u.id=p.user";
        return $conn->query($query);
    }
    public static function deletePhone($id,$conn){

        $query = "delete from telefon where phoneID=$id";
        return $conn->query($query);

    }
}

?>