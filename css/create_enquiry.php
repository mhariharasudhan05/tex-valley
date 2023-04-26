<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TexVally | Create Enquiry</title>
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css"> -->
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

    <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<style type="text/css">
    .wrapper-nav{
        /*margin: 20px;*/
    }
    #sidebar{
        margin-top: 60px;
    }
    #main-content {
margin-left: 0px !important;
}
</style>
</head>
<body>
<?php //include 'includes/header.php'; ?>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->


      </div>
      <div id="main-content">
                   <div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-foursquare"></i> Enquiry Form</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
  <form action="feed_enquiry.php" method = "POST">
<div class="user_detail">
    <label>Enq.No.</label>
    <input type="text" name="enq_number" id="enq_number" />
    <div class="clear"></div>
    <label>Date</label>
    <input type="text" name="enq_date" id="enq_date" value="<?php echo date("d-m-Y"); ?>" />
</div>
<div class="wrapper-nav">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Customer Profile</a></li>
        <li><a data-toggle="tab" href="#tab2">Business Profile 1</a></li>
        <li><a data-toggle="tab" href="#tab3">Business Profile 2</a></li>
        <li><a data-toggle="tab" href="#tab4">Business Profile 3</a></li>
        <li><a data-toggle="tab" href="#tab5">Allotment</a></li>
    </ul>
    
    <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
        <div data-role = "field-contain">
        <label>Name</label>
        <input type="text" name="customer_name" id="customer_name" class="span4" />
        </div>
        
        <div class="clear"></div>
        <label>Phone</label>
        <input type="tel" name="phone" id="phone" class="span4" />
        <div class="clear"></div>
        <label>Mobile</label>
        <input type="text" name="mobile" id="mobile" class="span4" />
        <div class="clear"></div>
        <label>E-mail</label>
        <input type="email" name="email" id="email" class="span4" />
        <div class="clear"></div>
        <label>Business Address</label>
        <input type="text" name="addr_line1" id="addr_line1" class="span4" />
        <div class="clear"></div>
        <input type="text" name="addr_line2" id="addr_line2" class="span4" />
        <div class="clear"></div>
        <input type="text" name="addr_line3" id="addr_line3" class="span4" />
        <div class="clear"></div>
                  <div class="control-group">
                                <label class="control-label">City</label>
                                <div class="controls">
                                    <?php 
                                    $city = mysql_query("SELECT * FROM city");                 
                                    ?>
                                    <input type="text" class="span4 " style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;<?php while($row1 = mysql_fetch_array($city)){ echo $row1['City_Desc']."<br />"; }  ?>&quot;]" />
                                   
                                </div>
                            </div>
        <div class="clear"></div>
        <?php 
     include 'conn.php';
$sql6 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_pageno='1'");
$rest = mysql_num_rows($sql6);
for($i = 1; $i < $rest ; $i++){
        include 'conn.php';
        $result1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='".$i."' AND Edm_Status = 'Active'");
        $row = mysql_fetch_array($result1);
        ?>
        <?php echo $row['Edm_desc']; ?>
        <?php 
        $result3 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '". $row['Edm_desc']."'");
        $row3 = mysql_fetch_array($result3);
        $result2 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$row3['Edm_id']."'");
        while($row2 = mysql_fetch_array($result2)){
        ?>
        
        <input type="<?php echo $row2['Edv_type']; ?>" name="answer[]" id="answer" value="<?php echo $row2['Edv_desc']; ?>" /> <?php echo $row2['Edv_desc']; ?>
        
<?php } ?>
        
               <?php } ?>
        <label>Purpose</label>
        <div class="purpose">
        <input type="checkbox" name="purpose" id="purpose" /> Trading
        <input type="checkbox" name="purpose" id="purpose" /> Investment
        <input type="checkbox" name="purpose" id="purpose" /> Others / Shopping
        </div>
        </div>
        <div class="clear"></div>
        <div id="tab2" class="tab-pane fade">
             <?php 
     include 'conn.php';
$sql6 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_pageno='2'");
$rest = mysql_num_rows($sql6);
for($i = 1; $i <= $rest ; $i++){
        include 'conn.php';
        $result1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='".$i."' AND Edm_Status = 'Active'");
        $row = mysql_fetch_array($result1);
        ?>
        <label><?php echo $row['Edm_desc']; ?></label>
        <?php 
        $result3 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '". $row['Edm_desc']."'");
        $row3 = mysql_fetch_array($result3);
        $result2 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$row3['Edm_id']."'");
        while($row2 = mysql_fetch_array($result2)){
        ?>
        
        <input type="<?php echo $row2['Edv_type']; ?>" name="answer[]" id="answer" value="<?php echo $row2['Edv_desc']; ?>" /> <?php echo $row2['Edv_desc']; ?>
        
<?php } ?>
        <div class="clear"></div>
               <?php } ?>

        </div>
        <div id="tab3" class="tab-pane fade">
                        <?php 
$sql6 = mysql_query("SELECT Edm_id FROM enquiry_detail_master WHERE Edm_pageno='2'");
$rest = mysql_num_rows($sql6);
$sql7 = mysql_query("SELECT Edm_id FROM enquiry_detail_master WHERE Edm_pageno='3'");
$rest7 = mysql_num_rows($sql7);
$rt = $rest + $rest7;
for($i = $rest+1 ; $i <= $rt ; $i++){
        $result1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_pageno='3' AND Edm_SeqNo='".$i."' AND Edm_Status = 'Active'");
        $row = mysql_fetch_array($result1);
        ?>
        <label><?php echo $row['Edm_desc']; ?></label>
        <?php 
        $result3 = mysql_query("SELECT Edm_id FROM enquiry_detail_master WHERE Edm_pageno='3' AND Edm_desc = '". $row['Edm_desc']."'");
        $row3 = mysql_fetch_array($result3);
        $result2 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$row3['Edm_id']."'");
        while($row2 = mysql_fetch_array($result2)){
        ?>
        <?php if($row2['Edv_type'] == "text") {?>
        <style type="text/css">
        div#tab3 input[type="text"]#answer {
   float: none !important;
    position: relative;
    margin: 0;
}
        </style>
        <input type="<?php echo $row2['Edv_type']; ?>" name="answer[]" id="answer" value="<?php echo $row2['Edv_desc']; ?>" /> <?php echo $row2['Edv_desc']; ?>
        <?php } else {?>

        <input type="<?php echo $row2['Edv_type']; ?>" name="answer[]" id="answer" value="<?php echo $row2['Edv_desc']; ?>" /> <?php echo $row2['Edv_desc']; ?>
        
<?php }  }?>
        <div class="clear"></div>
               <?php } ?>
         </div>
        <div id="tab4" class="tab-pane fade">
                                             <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='13' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="storage_size" id="storage_size" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
        
            <div class="clear"></div>
                                                         <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='14' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="mode_transport" id="mode_transport" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
            <div class="clear"></div>
                                                                     <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='15' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="buyers_place" id="buyers_place" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
            <div class="clear"></div>
                                                             <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='16' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="finance" id="finance" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
            <div class="clear"></div>
                                                                     <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='17' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="banker_name" id="banker_name" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
        
        </div>
        <div id="tab5" class="tab-pane fade">
                                                                     <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='18' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="cust_feedback" id="cust_feedback" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
            <div class="clear"></div>
                                                                     <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='19' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="mode_time" id="mode_time" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
            <div class="clear"></div>
                                                                     <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='20' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="enq_allot" id="enq_allot" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
            <div class="clear"></div>
                                                             <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='21' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" name="date_time" id="date_time" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
        <div class="clear"></div>
                                                                     <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='22' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
                                                                             <?php 
        $sql1 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_SeqNo='23' AND Edm_Status = 'Active'");
        $res1 = mysql_fetch_array($sql1);1
        ?>
        <label><?php echo $res1['Edm_desc']; ?></label>
           <?php 
        $sql2 = mysql_query("SELECT * FROM enquiry_detail_master WHERE Edm_desc = '".$res1['Edm_desc']."'");
        $res2 = mysql_fetch_array($sql2);
        $sql3 = mysql_query("SELECT * FROM enquiry_detail_value WHERE Edv_edmid = '".$res2['Edm_id']."'");
        while($res3 = mysql_fetch_array($sql3)){
        ?>
        <input type="<?php echo $res3['Edv_type']; ?>" /> <?php echo $res3['Edv_desc']; ?> 
        <?php } ?>
    <input type="submit" value="Submit" />
        </div>

    </div>
    
    </form>
</div>
</div>
</div>
</div>
</div>
    <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>



   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page-->
   <script src="js/form-component.js"></script>
  <!-- END JAVASCRIPTS -->

   <script language="javascript" type="text/javascript">

       $(function() {

           $.configureBoxes();

       });

   </script>
</body>
</html>    