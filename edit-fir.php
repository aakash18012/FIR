<?php
session_start();
require_once('database.php');
require_once('library.php');
isUser();
$cid= (int)$_GET['fid'];

//$res=mysql_query("SELECT c.* , f.* FROM complainer As c,fir As f WHERE c.cid=f.cid AND fid=$cid");

$sql = "SELECT *
		FROM fir
		WHERE fid = $cid";
		
$sql_1 = "SELECT DISTINCT(cname)
		FROM complainer";
$result = dbQuery($sql);

$result_1 = dbQuery($sql_1);		
while($data = dbFetchAssoc($result)) {
extract($data);
//while($row=mysql_fetch_array($res))
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Inspector</title>
<link href="css/mystyle.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {color: #FF0000}
.style3 {font-family: verdana, tohama, arial}
</style>
</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" align="center" width="900">

  <tbody><tr>

    <td width="900">
<?php include("header.php"); ?>

	</td>

  </tr>

  

  <tr>

    <td bgcolor="#FFFFFF">
	
<style type="text/css">
.ds_box {
	background-color: #FFF;
	border: 1px solid #000;
	position: absolute;
	z-index: 32767;
}
.ds_tbl {
	background-color: #FFF;
}
.ds_head {
	background-color: #333;

	color: #FFF;

	font-family: Arial, Helvetica, sans-serif;

	font-size: 13px;

	font-weight: bold;

	text-align: center;

	letter-spacing: 2px;

}
.ds_subhead {
	background-color: #CCC;
	color: #000;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	width: 32px;
}
.ds_cell {
	background-color: #EEE;
	color: #000;
	font-size: 13px;

	text-align: center;

	font-family: Arial, Helvetica, sans-serif;

	padding: 5px;

	cursor: pointer;

}
.ds_cell:hover {
	background-color: #F3F3F3;
} /* This hover code won't work for IE */
</style>
<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style>



 

<table class="ds_box" id="ds_conclass" style="display: none;" cellpadding="0" cellspacing="0"> 

  <tbody><tr> 

    <td id="ds_calclass"> </td> 

  </tr> 

</tbody></table> 



  <br>

  <table border="0" align="center" width="98%">

    <tbody><tr>

      <td class="Partext1" bgcolor="F9F5F5" align="center"><strong>Edit FIR </strong></td>

    </tr>

  </tbody></table>

<table>
    <tr> 

      <td class="style3" bgcolor="#FFFFFF" >Complainer Name :</td>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



      <td class="style3" bgcolor="#FFFFFF"><?php echo $cname; ?></td> 
    </tr>

    

    <tr> 

      <td class="style3" bgcolor="#FFFFFF">Complainer Phone  : </td> 
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <td class="style3" bgcolor="#FFFFFF"><?php echo "$c_phone"; ?></td> 
    </tr> 

    <tr>

      <td class="style3" bgcolor="#FFFFFF" align="right">Complainer Address :</td>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <td class="style3" bgcolor="#FFFFFF">
	  <?php echo "$address"; ?>&nbsp;
	  </td>
	  
    </tr>

    <tr>

      <td class="style3" bgcolor="#FFFFFF" align="right">Complain No :</td>

      <td class="style3" bgcolor="#FFFFFF"><font color="gray"><?php echo "$co_id"; ?></font></td>
    </tr>

    <tr>

      <td class="style3" bgcolor="#F3F3F3" align="right">Crime Type  :</td>

      <td class="style3" bgcolor="#FFFFFF"><font color="red"><?php echo $cr_type; ?></font></td>
    </tr>

        <tr>

      <td class="style3" bgcolor="#F3F3F3" align="right">Crime Description :</td>

      <td class="style3" bgcolor="#FFFFFF"><font color="purple"><?php echo $cr_desc; ?></font></td>
    </tr>


    <tr> 

      <td class="style3" bgcolor="#FFFFFF" align="right">Create Date/Time  :</td> 

      <td class="style3" bgcolor="#FFFFFF">

        <?php echo $create_date; ?> -<span class="gentxt">
        </span> </td> 
    </tr> 

    <tr> 

      <td class="style3" bgcolor="#FFFFFF" align="right">Status :</td> 

      <td class="style3" bgcolor="#FFFFFF">&nbsp;<font color="green"><?php echo $status; ?></font></td> 
    </tr> 

     

    <tr> 

      <td class="style3" bgcolor="#FFFFFF" align="right" valign="top">Comments :</td> 

      <td class="style3" bgcolor="#FFFFFF">&nbsp;<?php echo $comment; ?></td> 
    </tr> 
  </tbody></table> 

  <span class="Partext1"><br>
   </span><span class="Partext1"><br>

  <br>  

  </span>

  <form action="process.php?action=update-status" method="post" name="frmShipment" id="frmShipment"> 

  <table bgcolor="#EEEEEE" cellpadding="2" cellspacing="2" align="center" width="75%">

    <tbody><tr>

      <td colspan="3" bgcolor="#FFFFFF" align="right"><div class="Partext1" align="center"><strong>UPDATE STATUS </strong>

</div></td>

   </tr>

    <tr>

      <td colspan="3" bgcolor="#FFFFFF" align="right"></td>
    </tr>


    <tr>

      <td class="Partext1" bgcolor="#FFFFFF" align="right">New Status: </td>

      <td class="Partext1" bgcolor="#FFFFFF" width="26%">

	  






<select name="status">

<option value="In Transit">In Process</option>

<option value="Delayed">Delayed</option>

<option value="Completed">Completed</option>
<option value="Onhold">Onhold</option>
</select>

<br></td>

     
    

    <tr>

      <td bgcolor="#FFFFFF" align="right"><span class="Partext1">Comments:</span></td>

      <td colspan="2" class="Partext1" bgcolor="#FFFFFF">
	  <textarea name="comments" cols="40" rows="3" id="comments"></textarea></td>
    </tr>

    

    <tr>

      <td bgcolor="#FFFFFF" align="right">&nbsp;</td>

      <td colspan="2" class="Partext1" bgcolor="#FFFFFF">

       <input name="submit" value="Submit" type="submit">

          <input name="cid" id="cid" value="<?php echo $fid; ?>" type="hidden">

          <input name="cons_no" id="cons_no" value="<?php echo $cons_no; ?>" type="hidden">      </td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#FFFFFF" align="right"><div align="center">


      </div></td>
      </tr>
  </tbody></table>

  <br>

  </form>    </td>

  </tr>

  <tr>

    <td><table border="0" cellpadding="0" cellspacing="0" align="center" width="900">
  <tbody><tr>
    <td bgcolor="#2284d5" height="40" width="476">&nbsp;</td>
    <td bgcolor="#2284d5" width="304"><div align="right"></div></td>
  </tr>
</tbody></table>
</td>

  </tr>

</tbody></table>





</body></html>
<?php } 
?>