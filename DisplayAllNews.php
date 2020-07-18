<?php 
	$page_title="News Blog";
	require("Header.php");
?>

<center>

<a href="" class="btn btn btn-info w-40" data-toggle="modal" data-target="#exampleModalCenter">Add News</a>

<a href="" class="btn btn btn-info w-40" data-toggle="modal" data-target="#login">Login</a>

</center>

<table width="98%" class="disptable" id="news_data">
	<thead>
	<tr>
		<th width="5%" align="center">ID</th>
		<th width="23%" align="center">News Title</th>
		<th width="40%" align="center">News Content</th>
		<th width="10%" align="center">Created</th>
		<th width="10%" align="center">Modified</th>
		<th width="10%" align="center">Action</th>
	</tr>
    </thead>
    <tbody>	
    
<?php

	$num = $result->num_rows;
	if($num > 0)
	{
		while($row=$result->fetch_assoc())
		{
			
			echo "<tr><td>".$row["id"]."</td>";
			echo "<td>".$row["news_title"]."</td>";
			echo "<td>".$row["news_content"]."</td>";
			echo "<td>".$row["created"]."</td>";
			echo "<td>".$row["modified"]."</td>";
			?>
			<td>
				<input type="button" name="View" value="View" id="<?php echo $row["id"]; ?>" class="btn btn btn-info view_data w-100" /><br><br>
   				<input type="button" name="Edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn btn-info edit_data w-100" /><br><br>
                <a href="index.php?action=delete-news&id=<?php echo $row["id"]; ?>" class="btn btn btn-info w-100" onclick="return del();">Delete</a>
				
			</td>
		</tr>
        	<?php
		}
	}

?>
    
	</tbody>
</table>

<?php 
	$footer_info="&copy; News Blog | Show Latest Update";
	require("Footer.php"); 
?>

<!-- Insert Data  -->
<form action="index.php?action=add-news" method="post" name="Insert" onSubmit="return(validate());">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Insert News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  		<div class="form-group">
    		<label for="exampleFormControlInput1">News Title</label>
    		<input type="text" name="title" class="form-control" id="exampleFormControlInput1" 			                   placeholder="News Title">
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlTextarea1">News Content</label>
    		<textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">
            </textarea>
  		</div>
        
		
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-info" name="Insert">Publish</button>
      	</div>
    </div>
  </div>
</div>
</form>

<!-- Login -->
<form action="index.php?action=add-news" method="post" name="Insert" onSubmit="return(validate());">
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  		<div class="form-group">
    		<label for="exampleFormControlInput1">UserName</label>
    		<input type="text" name="title" class="form-control" id="exampleFormControlInput1" 			                   placeholder="UserName">
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlTextarea1">Password</label>
            <input type="password" name="title" class="form-control" id="exampleFormControlInput1" 			                   placeholder="A-Z-a-z-!@#$%^&*()1-9">
        </div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">create New Account</label>
			<a href="" class="btn btn btn-info w-40" data-toggle="modal" data-dismiss="modal" data-target="#ragister">Ragister</a>
  		</div>
		</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-info" name="Insert">Login</button>
      	</div>
    </div>
  </div>
</div>
</form>

<!-- Ragister -->
<form action="index.php?action=ragister" method="post" name="Insert" onSubmit="return(validate());">
<div class="modal fade" id="ragister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ragister</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  		<div class="form-group">
    		<label for="exampleFormControlInput1">UserName</label>
    		<input type="text" name="user" class="form-control" id="exampleFormControlInput1" 			                   placeholder="UserName">
        </div>
  		<div class="form-group">
            <label for="exampleFormControlInput1">E-Mail</label>
    		<input type="text" name="email" class="form-control" id="exampleFormControlInput1" 			                   placeholder="example@gmail.com">
        </div>
  		<div class="form-group">
    		<label for="exampleFormControlTextarea1">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" 			                   placeholder="A-Z-a-z-!@#$%^&*()1-9">
        </div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">Conform Password</label>
            <input type="password" name="c-pass" class="form-control" id="exampleFormControlInput1" 			                   placeholder="A-Z-a-z-!@#$%^&*()1-9">
  		</div>        
  		<div class="form-group">
    		<label for="exampleFormControlTextarea1">If You Are Ragisterd Click On  </label>
        	<a href="" class="btn btn btn-info w-40" data-toggle="modal" data-dismiss="modal" data-target="#login">Login</a>
      	</div>
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-info" name="reg">Ragister</button>
      	</div>
    </div>
  </div>
</div>
</form>


<!-- Edit Data -->
<form  action="index.php?action=edit-news" method="post">
<div class="modal fade" id="exampleModalCenteredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="news_detail_edit">
  		
		
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-info" name="Edit">Update</button>
      	</div>
    </div>
  </div>
</div>
</form>



<!-- View Data -->
<div class="modal fade" id="exampleModalCenterview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="news_detail_view">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>


