<h3 class="text-center" style="margin-top: -10px;">Running Table</h3>
<table id="example1" class="table table-bordered ">
    <tr>
        <th>Sl No</th>
        <th>Menu No</th>
        <th>Menu Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
    </tr>

    <?php 
    include("dbcon.php");
   $term = $_GET['bin'];
   $sum = 0;
    $qry="SELECT * FROM `parcel` where `shnam`!='delete';";
    $confirm=mysqli_query($conn,$qry);
    if(mysqli_num_rows($confirm)>0)
    {   $sn=0;?>

    <?php  while($row=mysqli_fetch_array($confirm))
        {   $sn=$sn+1;
            $sum+=$row["tot"];?>
    <tbody id="tb">
        <tr>
            <td style="display: none;"><?php echo $row["slno"]; ?></td>
            <td style="display: none;"><?php echo $row["tabno"]; ?></td>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row["itmno"];?></td>
            <td><?php echo $row["itmnam"];?></td>
            <td><?php echo $row["qty"];?></td>
            <td><?php echo $row["prc"];?></td>
            <td><?php echo $row["tot"];?></td>
        </tr>
    </tbody>
    <?php  }
?>
    <tr>
        <td colspan="3"></td>
        <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">Total:</td>
        <td style="font-weight:bold; font-size:14pt; color:green;"><?php echo $sum; ?>.00</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">
            <button type="submit" id="cancel" class="btn btn-warning">Cancel</button>
        </td>
        <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">
            <button type="submit" id="bill" class="btn btn-success">Save Bill</button>
        </td>
        <td colspan="2" style="font-weight:bold; font-size:14pt; color:green; text-align:center">
            <button type="submit" id="dlt" class="btn btn-danger">Delete Bill</button>
        </td>
    </tr>
</table>
<?php  }?>

<script>
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
            item_id: slno,
            update : "update"
        },
        success: function(data) {
            $("#itmno").val(data[1]);
            $("#itmnam").val(data[2]);
            $("#qty").val(data[3]);
            $("#prc").val(data[4]);
            $('#table_no').val(data[5]);
            $('#mobn').val(data[6]);
            $('#mobno').val(data[7]);
            $('#datepicker').val(data[8]);
            total();
        }
    });
    console.log(c);
});

$("#bill").click(function() {
    let bno = $('#bno').val();
    var log = $.ajax({
        type: "post",
        url: "bill_update.php",
        data: {
            billno : bno,
            save : "save" 
        },
        success: function(result) {
            window.location.href = 'singlebill_form.php';
        }

    });
    console.log(log);
});

$("#dlt").click(function() {
    let bno = $('#bno').val();
    var log = $.ajax({
        type: "post",
        url: "bill_update.php",
        data: {
            billno : bno,
            delete : "delete"
        },
        success: function(result) {
            window.location.href = 'singlebill_form.php';
        }
    });
    console.log(log);
});

$("#cancel").click(function() {
    var log = $.ajax({
        type: "post",
        url: "bill_update.php",
        data: {
            cancel: "cancel"
        },
        success: function(result) {
            window.location.href = 'singlebill_form.php';
        }

    });
    console.log(log);
});
</script>