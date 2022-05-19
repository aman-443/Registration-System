<?php
class user{

    private $db;

    function __construct($conn){
        $this->db=$conn;
    }

    public function createUser($username,$email,$password){

        try {
            $result= $this->getUserByUserName($username);
            if($result['num']>0){
                return false;
            }
            else{
            $newpassword=md5($password.$username);
            $sql = "INSERT INTO users(name,email,password) VALUES(:name,:email,:password)";
            
            $stmt=$this->db->prepare($sql);
            
            $stmt->bindparam(':name',$username);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':password',$newpassword);

            $stmt->execute();
            return true;
        
            }
        }
         catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            }
        
    }



    public function getUser($username,$password){

        try{      
            $sql="SELECT * from users where name = :username AND password = :password";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            $stmt->bindparam(':password',$password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            }
        
    }

    public function getUserByUserName($username){
        try{
            $sql="SELECT count(*) as num from users where name = :username";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            }

    }

}