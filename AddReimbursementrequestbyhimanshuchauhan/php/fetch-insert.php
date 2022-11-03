<?php

include 'config.php';

if(isset($_POST['submit']))
{
	$empid=$_POST["id"];
	$total=0;
    for($i=1;$i<4;$i++)
    {
		
		$remdate=$_POST["date$i"];
        $head=$_POST["head$i"];
		$total=$total+(int)$_POST["amount$i"];
		$headAmount=$_POST["amount$i"];
        if(!empty( $remdate) && !empty($head) && !empty($headAmount))
        {
            $sql ="INSERT INTO employeereimbursedetails (EmpId,ReimburseDate,Heads,HeadAmount) VALUES ($empid,'$remdate','$head',$headAmount); ";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful."); 
        }
		
    }
	$from=$_POST["from"];
	$to=$_POST["to"];
	$desc=$_POST["desc"];


if(!empty($total))
{
	$sql1="INSERT INTO employeereimburse (EmpId,FromDate,ToDate,Description,TotalAmount) VALUES ($empid,'$from','$to','$desc',$total);";
		$result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful."); 
}else{
	echo "<script>alert('fill it');
		window.location= 'http://localhost/AddReimbursementrequestbyhimanshuchauhan/';
		</script>";
		exit;
}

	 if($result && $result1)
	 {
		echo "<script>alert('success');
		window.location= 'http://localhost/AddReimbursementrequestbyhimanshuchauhan/';
		</script>";
		exit;
	 }else{
		echo "<script>alert('error');
		window.location= 'http://localhost/AddReimbursementrequestbyhimanshuchauhan/';
		</script>";
		exit;
	 }
}


	
?>