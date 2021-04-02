<h3 class="text-center" style="margin-top: -10px;">Running Table</h3>
<table id="example1" class="table table-bordered table-striped">
    <tr>
        <th>Sl No</th>
        <th>Menu No</th>
        <th>Menu Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    <tbody id="tb">
        <?php 
include("dbcon.php");
   $term = 1;
   $sum = 0;
    $qry="SELECT * FROM `parcel`;";
    $confirm=mysqli_query($conn,$qry);
    if(mysqli_num_rows($confirm)>0)
    {   $sn=0;?>

        <?php  while($row=mysqli_fetch_array($confirm))
        {   $sn=$sn+1;
            $sum+=$row["tot"];?>
        <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row["itmno"];?></td>
            <td><?php echo $row["itmnam"];?></td>
            <td><?php echo $row["qty"];?></td>
            <td><?php echo $row["prc"];?></td>
            <td><?php echo $row["tot"];?></td>
        </tr>
        <?php  }?>
        </tbody>
        <tr>
            <td colspan="3"></td>
            <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">Total:</td>
            <td style="font-weight:bold; font-size:14pt; color:green;"><?php echo $sum; ?>.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">
                <button type="submit" id="cancel" class="btn btn-danger">Cancel</button>
            </td>
            <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">
                <button type="submit" id="bill" class="btn btn-success">Print</button>
            </td>
        </tr>
</table>
<input type="hidden" id="bamt" value="<?php echo $sum; ?>" />
<button id="model" style="display:none;" data-toggle="modal" data-target="#finalModal"><i
        class="fa fa-fw fa-edit"></i></button>
<?php  }?>

<script>
// discount option 
$("#bill").click(function() {
    $('#model').click();
    let amount = $('#bamt').val();
    $('#billamt').val(amount);
    $('#tot_amt').val(amount);

    // alert(sessionStorage.getItem("mobile"));
    //  sessionStorage.removeItem("mobile");
    //alert(amount)
});

$("#cancel").click(function() {
    var log = $.ajax({
        type: "post",
        url: "delete_parcel.php",
        data: {
            parce_delete: "parce_delete"
        },
        success: function(result) {
            window.location.href = 'parcel.php';
        }

    });
    console.log(log);
});

$("#tb tr").hover(function() {
    $(this).css('background-color', 'yellow');
}, function() {
    $(this).css('background-color', 'white');
});

$("#tb tr").dblclick(function() {
    var currow = $(this).closest('tr');
    var slno = currow.find('td:eq(0)').html();
    let c = $.ajax({
        url: 'serch_for_update.php',
        type: "POST",
        dataType: 'json',
        data: {
            item_id: slno
        },
        success: function(data) {
            $("#itmno").val(data[1]);
            $("#itmnam").val(data[2]);
            $("#qty").val(data[3]);
            $("#prc").val(data[4]);
            $('#table_no').val(data[5]);
            $('#mobn').val(data[6]);
            $('#datepicker').val(data[7]);
            total();
        }
    });
    console.log(c);
});
</script>