<?php
	if(isset($_POST["news_id"]))
	{
		$id=$_POST["news_id"];
		
		include_once 'config/Connection.php';
		include_once 'object/News.php';
	
		$db = new Database();
		$news = new News($db);
		
		$result=$news->getnewsbyid($id);
		
		while($row=$result->fetch_assoc())
		{
			?>
            <table>
                <tr><td><?php echo $row["news_title"]; ?></td></tr>
                <tr><td><?php echo $row["news_content"]; ?></td></tr>
            </table>
			<?php
		}
	}
?>