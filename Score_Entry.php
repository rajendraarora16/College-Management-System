<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$stu_name=$_POST['sudenttxt'];
	$fa_name=$_POST['factxt'];
	$sub_name=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO stu_score_tbl 
						VALUES(
							NULL,
							'$stu_name',
							'$fa_name' ,
							'$sub_name',
							'$miderm',
							'$final',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$stu_id=$_POST['sudenttxt'];
	$faculties_id =$_POST['factxt'];
	$sub_id=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE stu_score_tbl SET
							stu_id='$stu_id' ,
							faculties_id='$faculties_id' ,
							sub_id='$sub_id' ,
							miderm='$miderm' ,	
							final='$final' ,
							note='$note' 
						WHERE ss_id=$id

					");
					
if($sql_update==true)
	echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		$msg="Update Failed...!";
	
	
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
	$sql_upd=mysql_query("SELECT * FROM stu_score_tbl WHERE ss_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Score's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your score's records into database.</p>
			</div>
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="sudenttxt" style="width: 200px;">
                                            <option>Student's name</option>
                            <?php
                          		$student_name=mysql_query("SELECT * FROM stu_tbl");
								while($row=mysql_fetch_array($student_name)){
									 if($row['stu_id']==$rs_upd['stu_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['stu_id'];?>" <?php echo $iselect ;?> > <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </div>
            </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="factxt" style="width: 200px">
                                            <option>Faculties's name</option>
                            <?php
                               $fac_name=mysql_query("SELECT * FROM facuties_tbl");
							   while($row=mysql_fetch_array($fac_name)){
								    if($row['faculties_id']==$rs_upd['faculties_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['faculties_id'];?>" <?php echo $iselect ;?> > <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </div>
            </div><br><Br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="subjecttxt" style="width: 200px">
                                            <option>Subject's name</option>
                            <?php
                               $subject=mysql_query("SELECT * FROM sub_tbl");
							   while($row=mysql_fetch_array($subject)){
								   if($row['sub_id']==$rs_upd['sub_id'])
								   		$iselect="selected";
									else
										$iselect="";
							?>
                            <option value="<?php echo $row['sub_id'];?>" <?php echo $iselect ;?> > <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </div>
            </div><br><br>
                    
                    <div class="teacher_note_pos">
                	<input type="text" name="midermtxt" class="form-control" id="textbox" value="<?php echo $rs_upd['miderm'];?> "/>
                    </div><br>
                    
                    <div class="teacher_note_pos">
                	<input type="text" name="finaltxt" class="form-control" id="textbox" value="<?php echo $rs_upd['final'];?>" />
                    </div><br>
                    
                    <div class="text_box_pos">
                	<textarea name="notetxt" class="form-control" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                    </div><br><br>
                    
                    <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in" title="Update"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                    </div>
                    </div>
   </div>
</div><!-- end of style_informatios -->
<?php	
}
else
{
?>
	
    <div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Score's Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll entry your score's records into database.</p>
			</div>
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="sudenttxt" style="width: 200px;">
                                            <option>Student's name</option>
                            <?php
                          		$student_name=mysql_query("SELECT * FROM stu_tbl");
								while($row=mysql_fetch_array($student_name)){
								?>
                                <option value="<?php echo $row['stu_id'];?>"> <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </div>
                </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="factxt" style="width: 200px">
                                            <option>Faculties's name</option>
                            <?php
                               $fac_name=mysql_query("SELECT * FROM facuties_tbl");
							   while($row=mysql_fetch_array($fac_name)){
								?>
                        		<option value="<?php echo $row['faculties_id'];?>"> <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </div>
            </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="subjecttxt" style="width: 200px">
                                            <option>Subject's name</option>
                            <?php
                               $subject=mysql_query("SELECT * FROM sub_tbl");
							   while($row=mysql_fetch_array($subject)){
							?>
                            <option value="<?php echo $row['sub_id'];?>"> <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </div>
            </div><br><br>
                
                <div class="teacher_note_pos">
                	<input class="form-control" type="text" name="midermtxt" id="textbox" placeholder='Midterm' />
                </div><br>
            
                <div class="teacher_note_pos">
                	<input type="text" class="form-control" name="finaltxt"  id="textbox" placeholder='Final'/>
                </div><br>
                
                <div class="text_box_pos">
                	<textarea name="notetxt" cols="23" class="form-control" rows="3" placeholder='Add note..'></textarea>
                </div><br><br>
                
                <div>
                    <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                	
                </div>
                </form>
                </div>
    </div>
<?php
}
?>
</body>
</html>