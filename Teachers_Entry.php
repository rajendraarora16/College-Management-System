<?php

	$msg="";
	$opr="";
	$id="";
	
	if(isset($_GET['opr'])){
	$opr=$_GET['opr'];}
	
if(isset($_GET['rs_id'])){
	$id=$_GET['rs_id'];}
	
//--------------add data-----------------
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['genderrdo'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$degree=$_POST['degree'];
	$salary=$_POST['slarytxt'];
	$married=$_POST['marriedrdo'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];	
	
$sql_ins=mysql_query("INSERT INTO teacher_tbl 
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$gender',
							'$dob',
							'$pob',
							'$addr',
							'$degree',
							'$salary' ,
							'$married',
							'$phone',
							'$mail',
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
$f_name=$_POST['fnametxt'];
$l_name=$_POST['lnametxt'];
$gender=$_POST['genderrdo'];
$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
$pob=$_POST['pobtxt'];
$addr=$_POST['addrtxt'];
$degree=$_POST['degree'];
$salary=$_POST['slarytxt'];
$married=$_POST['marriedrdo'];
$phone=$_POST['phonetxt'];
$mail=$_POST['emailtxt'];
$note=$_POST['notetxt'];


$sql_update=mysql_query("UPDATE teacher_tbl SET
                        f_name='$f_name' ,
                        l_name='$l_name' ,
                        gender='$gender' ,
                        dob='$dob' ,
                        pob='$pob' ,
                        address='$addr' ,
                        degree='$degree' ,
                        salary='$salary' ,
                        married='$married' ,
                        phone='$phone' ,
                        email='$mail' ,
                        note='$note'
                    WHERE teacher_id=$id

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome to College Management system</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM teacher_tbl WHERE teacher_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Teachers Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your teachers records into database.</p>
			</div>


<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" value="<?php echo $rs_upd['f_name'];?>" />
					<input type="text" name="lnametxt" class="form-control" value="<?php echo $rs_upd['f_name'];?>" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="genderrdo" value="Male"<?php if($rs_upd['gender']=="Male") echo "checked";?> /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="genderrdo" value="Female"<?php if($rs_upd['gender']=="Female") echo "checked";?> /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d)
							$sel="selected='selected'";
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel ;?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
		     	
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="pobtxt" class="form-control" value=" <?php echo $rs_upd['pob']; ?>" />
				</div><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" value=" <?php echo $rs_upd['address'];?>" />
				</div><br>
				
				<div class="teacher_degree_pos">
					<span class="p_font" style="float: left; margin-left: 88px;">Teacher's qualification: </span>
					<div class="select_style" style="border-left-width: 1px; margin-left: 0px; width: 102px; margin-right: 60px; margin-top: 0px; margin-bottom: 0px;">
    					<select name="degree">
       						<option>Degree</option>
       						<?php
                                $mm=array("Bachelor","Master","P.HD");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										if($mon==$rs_upd['degree'])
											$iselect="selected";
										else
											$iselect="";
											
										echo"<option value='$mon' $iselect> $mon</option>";		
                                }
                            ?>			     					
                        </select>
					</div>
				</div><br>
				
				<div class="teacher_salary_pos">
					<input type="text" name="slarytxt" class="form-control" value="<?php echo $rs_upd['salary'];?>" />
				</div><br>
				
				<div class="teacher_married_pos">
					<span class="p_font">Married</span>
					<input type="radio" name="marriedrdo" value="Yes"<?php if($rs_upd['married']=="Yes") echo "checked";?> /> <span class="p_font">&nbsp;Yes</span>
					<input type="radio" name="marriedrdo" value="No"<?php if($rs_upd['married']=="No") echo "checked";?> /> <span class="p_font">&nbsp;No</span>
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phonetxt" class="form-control" value="<?php echo $rs_upd['phone'];?>" />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="emailtxt" class="form-control" value="<?php echo $rs_upd['email'];?>" />
				</div><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="notetxt" class="form-control" value="<?php echo $rs_upd['note'];?>" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div>
<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Teachers Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add new teachers detail to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" placeholder="First name" />
					<input type="text" name="lnametxt" class="form-control" placeholder="Last name" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="genderrdo" value="Male" /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="genderrdo" value="Female" /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
		     	
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="pobtxt" class="form-control" placeholder="Place of birth" />
				</div><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" placeholder="Address" />
				</div><br>
				
				<div class="teacher_degree_pos">
					<span class="p_font" style="float: left; margin-left: 88px;">Teacher's qualification: </span>
					<div class="select_style" style="border-left-width: 1px; margin-left: 0px; width: 102px; margin-right: 60px; margin-top: 0px; margin-bottom: 0px;">
    					<select name="degree">
       						<option>Degree</option>
       						<?php
                                $mm=array("Bachelor","Master","P.HD");
                                $i=0;
                                foreach($mm as $mon){
                                    $i++;
										echo"<option value='$mon'> $mon</option>";
                                    //echo"<option value='$i'> $mon</option>";		
                                }
                            ?> 					     					
                        </select>
					</div>
				</div><br>
				
				<div class="teacher_salary_pos">
					<input type="text" name="slarytxt" class="form-control" placeholder="Salary" />
				</div><br>
				
				<div class="teacher_married_pos">
					<span class="p_font">Married</span>
					<input type="radio" name="marriedrdo" value="Yes"/> <span class="p_font">&nbsp;Yes</span>
					<input type="radio" name="marriedrdo" value="No"/> <span class="p_font">&nbsp;No</span>
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phonetxt" class="form-control" placeholder="Mobile no." />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="emailtxt" class="form-control" placeholder="Email address" />
				</div><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="notetxt" class="form-control" placeholder="Note" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                </form>
			</div>
		</div>
	</div>
<?php
}
?>
</body>
</html>