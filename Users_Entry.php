<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
if(isset($_POST['btn_sub'])){
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO users_tbl 
						VALUES(
							NULL,
							'$username',
							'$pwd' ,
							'$type',
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
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE users_tbl SET 
								username='$username' ,
								password='$pwd' , 
								type='$note' ,
								note='$note'
							WHERE
								u_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_users");
	else
		$msg="Update Fail".mysql_error();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM users_tbl WHERE u_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>
	<div id="top_style">
        <div id="top_style_text">
        Users Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_users"><input type="button" name="btn_view" value="Back"  title="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td>Username </td>
            	<td>
                	<input type="text" name="usertxt" id="textbox" value="<?php echo $rs_upd['username'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Password</td>
            	<td>
                	<input type="text" name="pwdtxt" id="textbox" value="<?php  echo $rs_upd['password'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Type</td>
            	<td>
                	<input type="text" name="typetxt" id="textbox"  value="<?php echo $rs_upd['type'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="5"><?php echo $rs_upd['note'];?></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_upd" value="Update" id="button-in"  />
                </td>
            </tr>
        </table>

   </div>
    </form>

</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
	<div id="top_style">
        <div id="top_style_text">
        Users Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_users"><input type="button" name="btn_view" value="View_Users"  title="View Users" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td>Username </td>
            	<td>
                	<input type="text" name="usertxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Password</td>
            	<td>
                	<input type="text" name="pwdtxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Type</td>
            	<td>
                	<input type="text" name="typetxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="5"></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Add Now" id="button-in"  />
                </td>
            </tr>
        </table>

   </div>
    </form>

</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>