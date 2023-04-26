<?php
ob_start();
session_start();
include 'conn.php';
$sql = mysql_query("insert into enquiry_detail_value(Edv_edmid,Edv_Seqno,Edv_desc,Edv_type,Edv_Status) values ('".$_POST['quest_no']."','".$_POST['edvseqno']."','".$_POST['edv_desc']."','".$_POST['ans_type']."','".$_POST['status']."')");
if($sql > 0){
	header("Location:answer.php");
}
?>