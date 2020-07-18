<?php
	include_once 'config/Connection.php';
	include_once 'object/News.php';
	
	// get database connection
	$db = new Database();
		
	$action=null;
	if(!empty($_GET["action"]))
	{
		$action=$_GET["action"];
	}
	switch($action)
	{
		case "add-news":
			if (isset($_POST['Insert'])) 
			{
            	$title=$_POST['title'];
				$content=$_POST['content'];
            
            	$result = new News($db);
            	$insertId = $result->addnews($title,$content);
        	}
			header("Location: index.php");
			break;
		case "edit-news":
			$newsid=$_POST["id"];
			
			$data = new News($db);
			if(isset($_POST['Edit']))
			{
				$title=$_POST['title'];
				$content=$_POST['content'];
				$result=$data->editnews($title,$content,$newsid);
				header("Location: index.php");
			}
			$result=$data->getnewsbyid($newsid);
			break;	
		case "delete-news":
			$newsid=$_GET["id"];
			$data = new News($db);
			$result=$data->deletenews($newsid);
			$result=$data->getallnews();
			require_once "DisplayAllNews.php";
			break;
		default:
			$data = new News($db);
			$result=$data->getallnews();
			require_once "DisplayAllNews.php";
			break;
	}
	
?>
