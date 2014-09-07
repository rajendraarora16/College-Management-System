<?php

$id=" ";
$opr=" ";

if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
if(isset($_POST['btn_sub'])){
	$loca_name=$_POST['locationtxt'];
	$description=$_POST['descriptxt'];
	$note	=$_POST['notetxt'];
	

$sql_ins=mysql_query("INSERT INTO location_tb 
						VALUES(
							NULL,
							'$loca_name',
							'$description' ,
							'$note'
							)
					");
if($sql_ins==true)
	echo "";
	else
		$msg="Update Failed...!";
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$loca_name=$_POST['locationtxt'];
	$description=$_POST['descriptxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE location_tb SET	
							l_name='$loca_name' ,
							description='$description' ,
							note='$note'
						WHERE loca_id=$id

					");
					
if($sql_update==true){
echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
}
else
	$msg="Update Fail!...";	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM location_tb WHERE loca_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
    <div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-globe"></span> Location's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your location's records into database.</p>
			</div>
                  <form method="post">    
    
                      <div class="teacher_note_pos">
                        <input type="text" class="form-control" name="locationtxt" id="textbox" value="<?php echo $rs_upd['l_name'];?>" />
                      </div><br>
                
                      <div class="text_box_pos">
                        <textarea name="descriptxt" class="form-control" cols="23" rows="4"><?php echo $rs_upd['description'];?></textarea>
                      </div><br>
                
                      <div class="text_box_pos">
                        <textarea name="notetxt" class="form-control" cols="23" rows="4"><?php echo $rs_upd['note'];?></textarea>
                      </div><br><br>                
                
                      <div>
                        <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                      </div>    
       </div>
    
        </form>
    
    </div><!-- end of style_informatios -->
    
    <?php
}
else
{
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-globe"></span> Location's Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add your location's records into database.</p>
			</div>
                  <form method="post">    
                      
                      <div class="teacher_note_pos">
                        <input class="form-control" type="text" name="locationtxt" id="textbox" placeholder='Location name' />
                      </div><br>
                      
                      <div class="text_box_pos">
                        <textarea name="descriptxt" class="form-control" cols="23" rows="4" placeholder='Add description..'></textarea>
                      </div><br>
                      
                      <div class="text_box_pos">
                        <textarea name="notetxt" class="form-control" cols="23" rows="4" placeholder='Add note..'></textarea>
                      </div><br><br>                
                
                      <div>
                        <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                      </div>
    
                  </form>
                      </div>
    </div><!-- end of style_informatios -->
    
<?php
}
?>
</body>
</html>