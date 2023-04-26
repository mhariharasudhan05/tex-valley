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
   <title>Answer</title>
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
                             <h4><i class="icon-foursquare"></i> Answer</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                     <div class="btn-group">
                                         <a href="create_answer.php"><button id="editable-sample_new" class="btn green">
                                             Add New <i class="icon-plus"></i>
                                         </button></a>
                                     </div>
                                </div>
                                 <div class="space15"></div>
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>





                                     <tr>
                                         <th>Edv_id</th>
                                         <th>Edv_edmid</th>
                                         <th>Sequence No.</th>
                                         <th>Answer</th>
                                         <th>Option No.</th>
                                         <th>Status</th>
                                         <th>Edit</th>
                                         <th>Delete</th>
                                     </tr>
                                     </thead>

                                     <tbody>
                                     			<?php 
		$sql = mysql_query("SELECT * FROM enquiry_detail_value");
			while($row = mysql_fetch_array($sql)){ ?>
                                     <tr class="">
                                     	 <td><?php echo $row['Edv_id']; ?></td>
                                         <td><?php echo $row['Edv_edmid']; ?></td>
			<td><?php echo $row['Edv_Seqno']; ?></td>
			<td><?php echo $row['Edv_desc']; ?></td>
			<td><?php echo $row['Edv_optno']; ?></td>
			<td><?php echo $row['Edv_Status']; ?></td>
			<td><a class="edit" href="edit_answer.php?ansno=<?php echo $row['Edv_Seqno']; ?>">Edit</a></td>
			<td><a href="delete_quest.php?ansno=<?php echo $row['Edv_Seqno']; ?>">Delete</a></td>
                                     </tr>
                                     <?php }
		?>
                                    </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <!-- END EXAMPLE TABLE widget-->
                 </div>
             </div>
</div>
<?php include'includes/footer.php'; ?>
</body>
</html>