<?php 
include 'conn.php';
$seqno = $_GET['ansno'];
$id = $_GET['id'] ;
$sql = mysql_query("DELETE FROM enquiry_detail_value WHERE Edv_edmid = '".$id."' AND Edm_SeqNo = '".$seqno."'");
if($sql > 0){
	header("Location:answer.php");
}
?>