<?php 
include 'conn.php';
$update = mysql_query("UPDATE enquiry_detail_value SET Edv_edmid = '".$_POST['ansid']."',Edv_Seqno = '".$_POST['edvseqno']."', Edv_desc = '".$_POST['edv_desc']."',Edv_type = '".$_POST['ans_type']."',Edv_Status = '".$_POST['status']."' WHERE Edv_edmid = '".$_POST['ansid']."' AND Edv_Seqno = '".$_POST['ansno']."'");
if($update > 0){
	header("Location:answer.php");
}
?>