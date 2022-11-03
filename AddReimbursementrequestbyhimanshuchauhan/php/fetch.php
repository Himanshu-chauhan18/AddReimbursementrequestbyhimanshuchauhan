<?php

$conn = mysqli_connect("localhost","root","","employeereimbursementsep2022") or die("Connection Failed.");

 $sid = $_GET['editId'];


$sql = "SELECT * FROM employeemaster WHERE id = {$sid}";

$result = mysqli_query($conn, $sql) or die("SQL Failed");
$output = [];

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output['response'][] = $row;
  }
}
mysqli_close($conn);
echo json_encode($output);
?>