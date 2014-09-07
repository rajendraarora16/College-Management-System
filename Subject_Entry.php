<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$fa_name=$_POST['factxt'];
	$teach_name=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];	
	
	

$sql_ins=mysql_query("INSERT INTO sub_tbl 
						VALUES(
							NULL,
							'$fa_name',
							'$teach_name' ,
							'$semester',
							'$sub_name' ,
							'$note'
							)
					");
	
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$fac_id=$_POST['factxt'];
	$tea_id=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];
	
	
	$sql_update=mysql_query("UPDATE sub_tbl SET
							faculties_id='$fac_id' ,
							teacher_id='$tea_id' ,
							semester='$semester' ,
							sub_name='$sub_name' ,
							note='$note' 
						WHERE sub_id=$id

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
	$sql_upd=mysql_query("SELECT * FROM sub_tbl WHERE sub_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your subject's records into database.</p>
			</div>
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="factxt" style="width: 200px;">
                                            <option>Facultie's name</option>
                            <?php
                               $fac_name=mysql_query("SELECT * FROM facuties_tbl");
							   while($row=mysql_fetch_array($fac_name)){
								   if($row['faculties_id']==$rs_upd['faculties_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['faculties_id'];?>" <?php echo $iselect;?> > <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
							
                            ?>
                                        </select>
                                        </div>
                    </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="techtxt" style="width: 200px">
                                            <option>Teacher's name</option>
                            <?php
                                $te_name=mysql_query("SELECT * FROM teacher_tbl");
								while($row=mysql_fetch_array($te_name)){
									if($row['teacher_id']==$rs_upd['teacher_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['teacher_id'];?>" <?php echo $iselect?> > <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                                        </select>
                                        </div>
            </div><br><br>
            
                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="semestertxt" id="textbox" value="<?php echo $rs_upd['semester'];?>"  />
                            </div><br>
            
                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="subtxt"  id="textbox" value="<?php echo $rs_upd['sub_name'];?>" />
                            </div><br>
            
                            <div class="text_box_pos">
                                <textarea name="notetxt" class="form-control" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                            </div><br><br>
            
                            <div>
                                <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                                <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                                
                            </div>
                  </form>            
    	</div>
    </form>
</div>
<?php
}
else
{
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject Entry Form</h1></div>
  			<div class="panel-body">
                        <form method="post">    
			<div class="container">
				<p style="text-align:center;">Here, you'll add new subject's detail to record into database.</p>
			</div>


<div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="factxt" style="width: 200px;">
                                            <option>Facultie's name</option>
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
                                            <select name="techtxt" style="width: 200px">
                                            <option>Teacher's name</option>
                            <?php
                                $te_name=mysql_query("SELECT * FROM teacher_tbl");
								while($row=mysql_fetch_array($te_name)){
								?>
                                <option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                    </select>
                                        </div>
            </div><br><br>
            
                <div class="teacher_note_pos">
                	<input type="text" class="form-control" name="semestertxt" id="textbox" placeholder="Semester" />
                </div><br>
            
                <div class="teacher_note_pos">
                	<input type="text" class="form-control" name="subtxt"  id="textbox" placeholder="Subject's name"/>
                </div><br>
                
                <div class="text_box_pos">
                	<textarea class="form-control" name="notetxt" cols="23" rows="3" placeholder='Add note..'></textarea>
                </div><br><br>
            
                <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" class="btn btn-primary btn-large" style="margin-left: 9px;" value="Cancel" id="button-in"/>
                </div>
           </form>
    	</div>
    </form>
</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>