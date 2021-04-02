<h3 class="text-center" style="margin-top: -10px;">Running Table</h3>
<table class="table table-bordered table-striped" id="form2">
    <thead>
        <tr style="background: #ffff; color: #fff; font-weight: 600;">
            <th colspan="4"></th>

        </tr>
        <tr>
            <?php
                     $sec="Ground";
                       if($sec=='Ground')
                           echo "<th>Table No</th>";
                       else if($sec=='First')
                           echo "<th>Table No</th>";
                       else if($sec=='Lodge')
                            echo "<th>Room No</th>";
                       else
                            echo "<th>Parcel No</th>";

             ?>
            <th>Final Print</th>
            <th>View Orders</th>
            <th>Action</th>
        </tr>

    </thead>
    <tbody>
        <?php
            require_once("dbcon.php");
            $sql3 = "SELECT DISTINCT tabno,tabsec,capname FROM temtable where tabsec='$sec' and status='1';";
            $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result3) > 0) {
                // output data of each row
                while($row3 = mysqli_fetch_assoc($result3)) {
            ?>
        <tr>
            <td><?php echo $row3['tabno']; ?></td>
            <td style="display: none;"><?php echo $row3['tabsec']; ?></td>
            <td style="display: none;"><?php echo $row3['capname']; ?></td>
            <td> <button v-on:click="finalItem($event)" class="btn btn-danger btn-sm edit1" data-toggle="modal"
                    data-target="#finalModal"><i class="fa fa-fw fa-edit"></i>Final Print</button></td>

            <td><button v-on:click="inalItem($event)" class="btn btn-primary btn-sm edit1" data-toggle="modal"
                    data-target="#orderview" id="clc">Order View</button></td>
            <td><button  v-on:click="cancel($event)" class="btn btn-warning btn-sm edit1" id="cancel">Cancel</button></td>
        </tr>
        <?php  }
           }  ?>
    </tbody>
</table>



<script>
var app = new Vue({
    el: '#form2',
    data: {
        slno: 0,
        rows: {},
        itmnam: '',
        qty: 1,
        prc: '',
        shnam: '',
        attemptSubmit: false
    },
    computed: {
        missingItmnam: function() {
            return this.itmnam === '';
        },
        missingQty: function() {
            return this.qty === '';
        },
        missingPrc: function() {
            return this.prc === '';
        },
        missingShnam: function() {
            return this.shnam === '';
        },
    },
    methods: {

        finalItem: function(e) {
            var tar = e.currentTarget;
            var chil = tar.parentElement.parentElement.children;
            var form = $("#finalform input");

            form[0].value = (chil[0].innerHTML);
            form[1].value = (chil[1].innerHTML);
             form[2].value = (chil[2].innerHTML);
            // form[3].value = (chil[3].innerHTML);
            // form[4].value = (chil[4].innerHTML);
            // form[5].value = (chil[5].innerHTML);



        },

        inalItem: function(e) {
            var tar = e.currentTarget;
            var chil = tar.parentElement.parentElement.children;
            var x = chil[0].innerHTML;
            if (x != '') {
                $.ajax({
                    url: "order_view.php",
                    method: "POST",
                    data: {
                        query: x
                    },
                    success: function(data) {
                        $('#list').html(data);
                    }
                });
            } else {
                $('#list').html("");
            }
        },

     cancel: function(e){
         var tar = e.currentTarget;
            var chil = tar.parentElement.parentElement.children;
            var x = chil[0].innerHTML;
            if (x != '') {
                $.ajax({
                    url: "table_form_insert.php",
                    method: "POST",
                    data: {
                        tabno : x,
                        cancel: "cancel"
                    },
                    success: function(data) {
                        window.location.href = 'table_form.php';
                    }
                });
            } else {
                $('#list').html("");
            }
         }
    }
});
</script>