<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
   <meta charset="utf-8" />
   <title>Home Page</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<?php include 'includes/header.php'; ?>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
     <?php include 'includes/sidebar.php'; ?>
      </div>
      <div id="main-content">
                   <div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget purple">
                         <div class="widget-title">
                             <h4><i class="icon-edit"></i>Edit Answer</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                          <div class="widget-body">
                  	<form action="update_answer.php" method="POST">
<?php 
include 'conn.php';
$seqno = $_GET['ansno'];
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM enquiry_detail_value where Edv_edmid = '".$id."' AND Edv_Seqno = '".$seqno."'");
while ($row = mysql_fetch_array($sql)) {
	?>	
			<!-- <input type="hidden" name="ansno" id="ansno" value="<?php echo $seqno; ?>" />	 -->
		
      <label class="control-label">Question</label>
      <input type="hidden" name="ansno" class="span6" id="ansno" value="<?php echo $seqno; ?>" readonly />
      <input type="hidden" name="ansid" class="span6" id="ansid" value="<?php echo $id; ?>" readonly />
      <?php $sql1 = mysql_query("SELECT * FROM enquiry_detail_master where Edm_id = '".$id."'"); 
        $rw = mysql_fetch_array($sql1);
       ?>
      <input type="text" name="quest" class="span6" id="quest" value="<?php echo $rw['Edm_desc']; ?>" />
			<label class="control-label">Sequence No.</label>
			
			<input type="text" name="edvseqno" class="span6" id="edvseqno" value="<?php echo $row['Edv_Seqno']; ?>" />
       <label>Answer</label>
      <input type="text" name="edv_desc" class="span6" id="edv_desc" value="<?php echo $row['Edv_desc']; ?>" /><br />
      <label>Answer Type</label>
      <select name="ans_type" class="span6">
<?php 

      $result = mysql_query("SELECT Edv_type FROM enquiry_detail_value where Edv_Seqno = '".$seqno."'");
      while($row1 = mysql_fetch_array($result)){
        echo "<option value='".$row1['Edv_type']."'>".$row1['Edv_type']."</option>";
        if($row1['Edv_type'] == "checkbox"){
          // $row1['Edv_type'] = "text";
          echo "<option value='text'>text</option>";
          echo "<option value='radio'>radio</option>";
          echo "<option value='number'>number</option>";
        }
        else if($row1['Edv_type'] == "text"){
         echo "<option value='checkbox'>checkbox</option>";
          echo "<option value='radio'>radio</option>";
          echo "<option value='number'>number</option>";
        }
         else if($row1['Edv_type'] == "radio"){
         echo "<option value='checkbox'>checkbox</option>";
          echo "<option value='text'>text</option>";
          echo "<option value='number'>number</option>";
        }
         else{
         echo "<option value='checkbox'>checkbox</option>";
         echo "<option value='text'>text</option>";
         echo "<option value='radio'>radio</option>";
        }
      }
       ?>
      </select>
			<label>Status</label>
			<select name="status" class="span6">
			<?php 
			$result = mysql_query("SELECT Edv_Status FROM enquiry_detail_value where  Edv_edmid = '".$id."' AND Edv_Seqno = '".$seqno."'");
			while($row1 = mysql_fetch_array($result)){
				echo "<option value='".$row1['Edv_Status']."'>".$row1['Edv_Status']."</option>";
				if($row1['Edv_Status'] == "Active"){
					$row1['Edv_Status'] = "Disable";
					echo "<option value='".$row1['Edv_Status']."'>".$row1['Edv_Status']."</option>";
				}
				else{
					$row1['Edv_Status'] = "Active";
					echo "<option value='".$row1['Edv_Status']."'>".$row1['Edv_Status']."</option>";
				}
			}
			 ?>
		</select><br />
		<input type="submit" value="Update" />
		<input type="reset" value="Cancel" />
	<?php
}
?>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>