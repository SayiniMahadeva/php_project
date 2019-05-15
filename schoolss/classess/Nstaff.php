<?php

include_once 'DbConfig.php';
 
class Nstaff extends DbConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getData($query)
    {        
        $result = $this->connection->query($query);
        
        if ($result == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }
        
    public function execute($query) 
    {
        $result = $this->connection->query($query);
        
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }        
    }
    
    public function delete($nstaff_id, $non_academic_staff) 
    { 
        $query = "DELETE FROM $non_academic_staff WHERE nstaff_id = $nstaff_id";
        
        $result = $this->connection->query($query);
    
        if ($result == false) {
            echo 'Error: cannot delete id ' . $nstaff_id . ' from table ' . $non_academic_staff;
            return false;
        } else {
            return true;
        }
    }
 
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}
?>