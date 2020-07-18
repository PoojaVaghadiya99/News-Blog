<?php

class News
{ 
    private $conn;
    private $table_name = "news";
	
    public function __construct($db)
	{
		 $this->conn = $db;
    }
	
	function addnews($title,$content) 
	{
        $query = "INSERT INTO " . $this->table_name . " (news_title,news_content,created,modified)        VALUES (?, ?,now(),now())";
        $paramType = "ss";
        $paramValue = array($title,$content);
        $this->conn->insert($query,$paramType,$paramValue);
    }
    
    function editnews($title,$content,$id) 
	{
        $query = "UPDATE " . $this->table_name . " SET news_title = ?,news_content = ?,modified =        now() WHERE id = ?";
        $paramType = "ssi";
        $paramValue = array($title,$content,$id);
        $this->conn->update($query, $paramType, $paramValue);
    }
	
	function deletenews($newsid) 
	{
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $paramType = "i";
        $paramValue = array($newsid);
        $this->conn->update($query, $paramType, $paramValue);
    }
	
	function getallnews() 
	{
    	$sql = "SELECT * FROM " . $this->table_name . " ORDER BY id";
        $result = $this->conn->runBaseQuery($sql);
       	return $result;
    }
	
	function getnewsbyid($newsid) 
	{
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $paramType = "i";
        $paramValue = array($newsid);
        $result = $this->conn->runquery($query, $paramType, $paramValue);
        return $result;
    }
	
}

?>

