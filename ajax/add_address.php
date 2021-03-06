<?php
session_start();
include("../fragments/connection-begin.php");
if(!($statement=$conn->prepare("CALL address_add(?,?,?, @insertedAddressId)"))){
  echo "ERROR: Prepare failed.";
}
if(!($statement->bind_param('ssi',$_POST['name'],$_POST['info'],$_SESSION['user_id']))) {
  echo "ERROR: Bind failed.";
}
if(!($statement->execute())){
  echo "ERROR: Execution failed: ".$statement->error;
}
echo $statement->get_result()->fetch_assoc()['insertedAddressId'];
$statement->close();
include("../fragments/connection-end.php");
?>
