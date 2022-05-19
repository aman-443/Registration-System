<?php
class crud{

    private $db;

    function __construct($conn){
        $this->db=$conn;

    }
    public function insert($fname,$lname,$dob,$specialty,$email,$contact,$avatar_path){
        try {
            $sql = "INSERT INTO attendees(fname,lname,dob,specialty,email,phone,avatar_path) VALUES(:fname,:lname,:dob,:specialty,:email,:contact,:avatar_path)";
            
            $stmt=$this->db->prepare($sql);
            
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':specialty',$specialty);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':avatar_path',$avatar_path);

            $stmt->execute();
            return true;
        
    
            }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            }
    }   

    public function viewRecord(){
    $sql="SELECT * from `attendees` a INNER JOIN specialties s on a.specialty = s.specialty_id ";
    $result=$this->db->query($sql);
    return $result;


    }

    public function viewSpecialties(){
    $sql='SELECT * from  specialties';
    $result=$this->db->query($sql);
    return $result;
    
    
    }
    public function getSpecialtyById($id){
    $sql='SELECT * from  specialties where specialty_id=:id' ;
    $stmt=$this->db->prepare($sql);
    $stmt->bindparam(':id',$id);
    $stmt->execute();
    $result=$stmt->fetch();
    return $result;
    
    }

    public function viewSingleRecord($id){
    $sql='SELECT * from `attendees` a INNER JOIN specialties s on a.specialty = s.specialty_id  where attendee_id=:id';
    $stmt=$this->db->prepare($sql);
    $stmt->bindparam(':id',$id);
    $stmt->execute();
    $result=$stmt->fetch();
    return $result;

        
        }

    public function editAttendee($id,$fname,$lname,$dob,$specialty,$email,$contact,$avatar_path){
    
        try {
        $sql="UPDATE `attendees` SET `fname`=:fname,`lname`=:lname,
        `dob`=:dob,`specialty`=:specialty,`email`=:email,`phone`=:phone,`avatar_path`=:avatar_path WHERE `attendee_id`=:id";

            $stmt=$this->db->prepare($sql);
                        
            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':specialty',$specialty);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':phone',$contact);
            $stmt->bindparam(':avatar_path',$avatar_path);
    
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
          
            echo $e->getMessage();
            return false;

        }



    }

    public function deleteRecord($id){

        $sql= "DELETE FROM `attendees` WHERE attendee_id=:id";
        try {
            
            $stmt=$this->db->prepare($sql);
                        
            $stmt->bindparam(':id',$id);
    
            $stmt->execute();

        } catch (PDOException $e) {
          
            echo $e->getMessage();

        }


    }


}

?>