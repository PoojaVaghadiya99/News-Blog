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
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
			<div class="form-group">
    			<label for="exampleFormControlInput1">News Title</label>
    			<input type="text" name="title" class="form-control" id="exampleFormControlInput1" 			                   value="<?php echo $row["news_title"]; ?>" >
  			</div>
  			<div class="form-group">
    			<label for="exampleFormControlTextarea1">News Content</label>
    			<textarea class="form-control" name="content" id="exampleFormControlTextarea1" 
                rows="5" ><?php echo $row["news_content"]; ?>
            	</textarea>
  			</div>
			<?php
		}
	}
?>