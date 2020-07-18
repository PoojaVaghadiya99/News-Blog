// JavaScript Document

function validate()
{ 
  	 if( document.Insert.title.value == "" )
  	 {
  		   alert( "Please Provide News Title !" );
   		  document.Insert.title.focus() ;
  	  	 return false;
  	 }
	 if( document.Insert.content.value == "" )
  	 {
  		   alert( "Please provide News Content !" );
   		  document.Insert.content.focus() ;
  	  	 return false;
  	 }
	 return( true );
}

$(document).ready( function () {
    $('#news_data').DataTable();
	
														  
} );
	
function del()
{
	var ans=confirm("Are You Sure You Want To Delete !!");
	if(ans==true)
	{
		return true;
	}
	else
	{
		return false;
	}
	return false;
}

$(document).ready(function(){
						   $(document).on('click','.edit_data',function(){
										console.log($(this).attr("id"));
										
						   var news_id=$(this).attr("id");
						   
						   $.ajax({
								  url:"Edit_Data.php",
								  method:"post",
								  data:{news_id:news_id},
								  success:function(data){
									  $('#news_detail_edit').html(data);
									  $('#exampleModalCenteredit').modal("show");
								  }
								  });
						   							  
						   });
						   });


$(document).ready(function(){
						   $(document).on('click','.view_data',function(){
										console.log($(this).attr("id"));
										
						   var news_id=$(this).attr("id");
						   
						   $.ajax({
								  url:"View_Data.php",
								  method:"post",
								  data:{news_id:news_id},
								  success:function(data){
									  $('#news_detail_view').html(data);
									  $('#exampleModalCenterview').modal("show");
								  }
								  });						  
						   });
						   });
