<?php
include("dbcon.php");

$gndtot;
//$gst = $_POST['service_charge'];
 $mobno = $_POST['mobno'];
 $discount = $_POST['discount'];
 if($discount=="")
 {
    $discount=0;
 }
$gst=0;
//$gstamt = $_POST['gstamt'];
$gstamt=0;
//$nettot = $_POST['nettot'];
$nettot;
$tabno = 1;
$tabsec = "parcel";
$paymentmode = $_POST['paymentmode'];
$capnam = 'Bill';

$itmnam;
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

// insert bill no to temp table

$q = "SELECT SUM(`prc`) AS `sum` FROM `parcel`;";
$retval= mysqli_query($conn,$q) or die(mysqli_error());
if(! $retval ) {
    die('Could not get data: ' . mysqli_error($conn));
    
}
while($row44 = mysqli_fetch_array($retval)) {
     $gndtot = $row44['sum'];
    $nettot = $gndtot;
}

$gstamt=$nettot * $gst / 100;
 $nettot= $nettot + $gstamt - $discount;

$cnt = 0;
$sql2 = "SELECT max(slno) FROM tabletot";
$retval2 = mysqli_query($conn, $sql2 );

if(! $retval2 ) {
    die('Could not get data: ' . mysqli_error($conn));
}
while($row2 = mysqli_fetch_assoc($retval2)) {
    $cnt=$row2['max(slno)'];
    $cnt++;
}
$sql3 = "UPDATE `parcel` SET billno='$cnt';";
if (!mysqli_query($conn, $sql3)) {
    die('Error: ' . mysqli_error($conn ));
}


//insert into table
 $sql1 = "INSERT INTO tabledata (date,itmno,itmnam,prc,qty,tot,tabno,tabsec,billno) SELECT date,itmno,itmnam,prc,qty,tot,tabno,tabsec,billno FROM parcel;";

if (!mysqli_query($conn, $sql1)) {
    echo json_encode('Error: ' . mysqli_error($conn ));
}
$total=0;
 $sql = "SELECT * FROM tabledata WHERE billno='$cnt';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo $total += $row['prc'];
    $gtot += $row['tot'];

}
}

$sql="INSERT into tabletot VALUES('','$total','$gst','$gstamt','$gtot','$date','$paymentmode','$capnam',' $discount','$mobno')";

if (!mysqli_query($conn, $sql)) {
    echo json_encode('Error: ' . mysqli_error($conn ));
}

$sql55 = "select * from tabledata where billno='$cnt';";
$retval55 = mysqli_query($conn, $sql55 );

if(! $retval2 ) {
    die('Could not get data: ' . mysqli_error($conn));
}
while($row55 = mysqli_fetch_assoc($retval55)) {
    $bsn =  $row55['qty'];
    $vp = $row55['itmnam'];

    $ub="UPDATE readymadeitem SET qty = qty - '$bsn' WHERE itmnam='$vp'";
    if (!mysqli_query($conn, $ub)) {
        echo json_encode('Error: ' . mysqli_error($conn ));
    }
}
// send sms to customer
$bal = $gtot - $discount;
$msg="Thanks for ordering with The Village \n Visit Again. \n Order Food Online : +91 8904327494";
sms($mobno,$msg,$conn);


// delete from temp table
$stmt = "TRUNCATE `parcel`;";
if (!mysqli_query($conn, $stmt)) {
    echo json_encode('Error: ' . mysqli_error($conn ));
}




function sms($num,$msg,$conn)
{
			$sql = "SELECT COUNT(`sms_id`) AS `nsms` FROM `sms`;";
			$retval = mysqli_query($conn,$sql);
			$row1=mysqli_fetch_array($retval);
			if($row1[0] <= 100){

			//Your authentication key
			$authKey = "35480ArCB0iT8G5e5f72ccP30";

			//Multiple mobiles numbers separated by comma
			$mobileNumber = $num;

			//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = "BEYOND";

			//Your message to send, Add URL encoding here.
			$message = urlencode($msg);

			//Define route 
			$route = "default";
			//Prepare you post parameters
			$postData = array(
			    'authkey' => $authKey,
			    'mobiles' => $mobileNumber,
			    'message' => $message,
			    'sender' => $senderId,
			    'route' => $route
			);

			//API URL
			$url="http://sms.fastsmsindia.com/api/sendhttp.php";

			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
			    CURLOPT_URL => $url,
			    CURLOPT_RETURNTRANSFER => true,
			    CURLOPT_POST => true,
			    CURLOPT_POSTFIELDS => $postData
			    //,CURLOPT_FOLLOWLOCATION => true
			));


			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


			//get response
			$output = curl_exec($ch);

			//Print error if any
			if(curl_errno($ch))
			{
			    echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			$date=date("Y-m-d");
			$time=date("H:i:s");
			$sql = "INSERT INTO `sms`( `number`, `msg`, `date`, `time`) VALUES ('$num','$msg','$date','$time');";
			$retval = mysqli_query($conn,$sql);
			if($retval){ return "true"; }
		}else{
			return "false";
		}		
}

//echo '<script>alert("Record Added");</script>';
    echo '<script>location="print_parcel.php?billno='.$cnt.'&discount='.$discount.'";</script>';

?>