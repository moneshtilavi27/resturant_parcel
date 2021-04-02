<?php
/*include("dbcon.php");
if(isset($_POST['query']))
{
 //   $term = $_POST[ "query" ];
            $output =' <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Menu No</th>
                                            <th>Menu Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                        <tbody>'
                                           $qty="SELECT * FROM `temtable` WHERE `tabno`= ;";
                                            $result3 = mysqli_query($conn, $qty);
                                            if (mysqli_num_rows($result3) > 0) {
                                                // output data of each row
                                                    $c=0;
                                                while($row3 = mysqli_fetch_assoc($result3)) {
                                                        $c++;
                                            .'<tr>
                                                <td style="display: none;">'.echo $row3["slno"];.'</td>
                                                <td>'.echo $c;.'</td> 
                                                <td>.' echo $row3["itmno"]; .'</td>
                                                <td>.' echo $row3["tabsec"]; .'</td>
                                                <td>.' echo $row3["itmnam"]; .'</td>
                                                <td>.' echo $row3["qty"]; .'</td>
                                                 <td>'. echo $row3["prc"]; '.</td>
                                                <td>'. echo $row3["tot"]; .'</td>
                                            </tr>'
                                                }
                                       .'</tbody>
                                    </table>';
   
    
}
 echo $output;*/
?>

<?php 
include("dbcon.php");

$output= '';
if(isset($_POST['query']))
{
   $term = $_POST[ "query" ];
   $sum = 0;
    $qry="SELECT * FROM `temtable` WHERE `tabno`='$term';";
    $confirm=mysqli_query($conn,$qry);
    if(mysqli_num_rows($confirm)>0)
    {   $sn=0;
        $output .='<h4 style="color:red;">Table No :'.$term.'</h4>
        <table class="table table-bordered table-striped">
            <tr>
                 <th>Sl No</th>
                  <th>Menu No</th>
                 <th>Menu Name</th>
                  <th>Qty</th>
                   <th>Price</th>
                  <th>Total</th>
            </tr> ';
        while($row=mysqli_fetch_array($confirm))
        {   $sn=$sn+1;
            $sum+=$row["tot"];
            $output .='
                <tr>
                    <td>'.$sn.'</td>
                    <td>'.$row["itmno"].'</td>
                    <td>'.$row["itmnam"].'</td>
                     <td>'.$row["qty"].'</td>
                    <td>'.$row["prc"].'</td>
                    <td>'.$row["tot"].'</td>
                </tr>
                ';
        }
        $output .=' <td colspan="3"></td>
                      <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">Total:</td>
                    <td style="font-weight:bold; font-size:14pt; color:green;">'.$sum.'.00</td>
                </tr></table>';
    }
        echo $output;
}