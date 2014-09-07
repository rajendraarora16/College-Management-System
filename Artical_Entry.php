<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];

if(isset($_POST['btn_sub'])){
	$lid=$_POST['sudenttxt'];
	$title=$_POST['locationtxt'];
	$content=$_POST['descriptxt'];
	$status=$_POST['genderrdo'];
	$note=$_POST['notetxt'];
	
	$sql_add=mysql_query("INSERT INTO article_tbl 
							VALUES(
								NULL,
								$lid,
								'$title',
								'$content',
								'$status' ,
								'$note'
							)
						");
	if($sql_add==true)
		$msg="1 Record inserted...";
	else
		$smg="Insert Fail...".mysql_error();
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$loca_id=$_POST['sudenttxt'];
	$title=$_POST['locationtxt'];
	$content=$_POST['descriptxt'];
	$status=$_POST['genderrdo'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE  article_tbl SET	
							loca_id='$loca_id' ,
							title='$title' ,
							content='$content' ,
							status='$status' ,
							note='$note'
							
					");
					
if($sql_update==true)
	echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		echo "Updated Failed...!";
	
	
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
	$sql_upd=mysql_query("SELECT * FROM article_tbl WHERE a_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>

    <div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-align-justify"></span> Artical's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your artical's records into database.</p>
			</div>
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="sudenttxt" style="width: 200px;">
                                            <option>Choose location</option>
                                <?php
                                   $location=mysql_query("SELECT * FROM location_tb");
                                       while($row=mysql_fetch_array($location)){
										    if($row['loca_id']==$rs_upd['loca_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                 	<option value="<?php echo $row['loca_id']?>" <?php echo $iselect?> ><?php echo $row['l_name'];?></option>
                                <?php
								}
                                ?>
                    </select>
                    </div>
                    </div><br><br>
                
                      <div class="teacher_note_pos">
                        <input type="text" class="form-control" name="locationtxt" id="textbox" value="<?php echo $rs_upd['title'];?>"/>
                      </div><br>
                      
                      <div class="text_box_pos">
                        <textarea name="descriptxt" class="form-control" cols="82" rows="7"><?php echo $rs_upd['content'];?></textarea>
                      </div><br>
                      
                      <div class="teacher_radio_pos" style="margin-left: 0px;">
                           <input type="radio" name="genderrdo" value="Public"  <?php if($rs_upd['status']=="Public") echo "checked";?>/> <span class="p_font">&nbsp;Public</span>
                           <input type="radio" name="genderrdo" value="Private" <?php if($rs_upd['status']=="Private") echo "checked";?>  /> <span class="p_font">&nbsp;Private</span>
                      </div><br>
                    
                      <div class="text_box_pos">
                        <textarea name="notetxt" class="form-control" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                      </div><br><br>            
                
                      <div>
                        <input type="submit" name="btn_upd" class="btn btn-primary btn-large" value="Update" id="button-in" />
                        <input type="reset" value="Cancel" style="margin-left: 9px;" class="btn btn-primary btn-large" id="button-in" />  
                      </div>
                      
                      </div>
    </div>
<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-align-justify"></span> Artical's Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add your artical's records into database.</p>
			</div>
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="sudenttxt" style="width: 200px;">
                                            <option>Choose location</option>
                                <?php
                                   $location=mysql_query("SELECT * FROM location_tb");
                                       while($row=mysql_fetch_array($location)){
								?>
                                 	<option value="<?php echo $row['loca_id']?>"><?php echo $row['l_name'];?></option>
                                <?php
								}
                                ?>
                    
                    </select>
                    </div>
                    </div><br><Br>
                
                      <div class="teacher_note_pos">
                        <input type="text" class="form-control" name="locationtxt" id="textbox" placeholder="Title" />
                      </div><br>
                      
                      <div class="text_box_pos">
                        <textarea name="descriptxt" class="form-control" cols="82" rows="7" placeholder="Add content.."></textarea>
                      </div><Br>
                      
                      <div class="teacher_radio_pos" style="margin-left: 0px;">
                            <input type="radio" name="genderrdo" value="Public" checked="checked"/><span class="p_font">&nbsp;Public</span>
                            <input type="radio" name="genderrdo" value="Private" /><span class="p_font">&nbsp;Private</span>
                      </div><Br>
                    
                      <div class="text_box_pos">
                        <textarea name="notetxt" class="form-control" cols="23" rows="3"></textarea>
                      </div><br><br>
                      
                      <div>
                        <input type="submit" name="btn_sub" class="btn btn-primary btn-large" value="Add Now" id="button-in" />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in" />
                      </div>
                      
                  
                      </form>
                      </div>
</div><!-- end of style_informatios -->
     
<?php

}

?>
</body>
</html>