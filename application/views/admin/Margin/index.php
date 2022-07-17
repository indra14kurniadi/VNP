<script type="text/javascript">
function cari_customername() {
    var customerid = $("#customerid").val();

    $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/admin/Dataprogpo/cari_customername",
        data: "customerid=" + customerid,
        dataType: "json",
        success: function(data) {
            $('#customername').val(data.customername);
        }
    });

}

function cari_vendorname() {
    var vendorid = $("#vendorid").val();

    $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/admin/Dataprogpo/cari_vendorname",
        data: "vendorid=" + vendorid,
        dataType: "json",
        success: function(data) {
            $('#vendorname').val(data.vendorname);
        }
    });
}

function cari_salesid() {
    var salesname = $("#salesname").val();

    $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/admin/Dataprogpo/cari_salesid",
        data: "salesname=" + salesname,
        dataType: "json",
        success: function(data) {
            $('#salesid').val(data.salesid);
            $('#email').val(data.email);
        }
    });
}

function cari_dept() {
    var deptid = $("#deptid").val();

    $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/admin/Dataprogpo/cari_deptname ",
        data: "deptid=" + deptid,
        dataType: "json",
        success: function(data) {
            $('#deptname').val(data.deptname);
        }
    });
}

function email() {
    $('.button').click(function() {
        var clickBtnValue = $(this).val();
        var ajaxurl = "<?php echo site_url(); ?>/admin/Dataprogpo/sendemail ",
            data = {
                'action': clickBtnValue
            };
        $.post(ajaxurl, data, function(response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });
}
</script>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('pesan');?>
            <div class="box">
                <div class="box-header">
                    <!-- button add -->
                    <button type="button" class="btn bg-navy" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Data Alamat
                    </button>

                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-stripped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Margin</th>
                            <th>Action</th>

                            <thead>
                            <tbody>
                                <?php $i=1;
                                    foreach($datacustomer as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->customerid; ?></td>
                                    <td><?php echo $row->customername; ?></td>
                                    <td><?php ?></td>
                                    <td>

                                        <a title="detail data"
                                            href="<?php echo base_url('admin/Margin/detail/'.$row->customerid); ?>"
                                            class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
                                        </a>

                                        <a title="delete data"
                                            href="<?php echo base_url('admin/Margin/delete/'.$row->customerid); ?>"
                                            onclick="return confirm('Delete Data?')" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </thead>
                        <table>
                </div>
            </div>

        </div>
        <div>

</section>

<!-- /.modal -->

<!-- /.content -->
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<!-- modals data-->

<!-- /.modal -->

<!-- jquery 3 -->
<script type="text/javascript" src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js">
</script>

<script type="text/javascript">
$(function() {
    $('#example1').dataTable()
})
</script>

<div class="modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Alamat</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Data Alamat</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('admin/Margin/add');?>">
                        <div class="box-body">


                            <div class="form-group">
                                <label for="alamat" style="color:black">Alamat</label>
                                <input type="integer" name="alamat" class="form-control" id="alamat"
                                    placeholder="Enter Alamat">
                            </div>


                            <div class="form-group">
                                <label style="color:black" ">Customer ID</label>
                                    <select name=" customerid" id="customerid" class="form-control"
                                    onchange="cari_customername(this.value);">
                                    <?php
                                            $data = $this->model_datacustomer->getdata();
                                            foreach($data->result() as $dt){
                                        ?>
                                    <option value=" <?php echo $dt->customerid;?>" type="number" style="color:black">
                                        <?php echo $dt->customerid;?></option>
                                    <?php
                                                }
                                        ?>
                                    </select>
                            </div>

                            <div class="form-group" method="post">
                                <label for="customername" style="color:black">Customer Name</label>
                                <input type="text" name="customername" class="form-control" id="customername"
                                    readonly="readonly" style="color:black">
                            </div>



                            <div class="form-group">
                                <label for="deptid" style="color:black">Department</label>
                                <select name="deptid" id="deptid" class="form-control"
                                    onchange="cari_dept(this.value);">
                                    <?php
                                            $data = $this->model_datacustomer->data_all_dept();
                                            foreach($data->result() as $dt){
                                        ?>
                                    <option value="<?php echo $dt->deptid;?>" type="text" style="color:black">
                                        <?php echo $dt->deptid;?></option>
                                    <?php
                                                } 
                                        ?>
                                </select>
                            </div>

                            <div class="form-group" method="post">
                                <label for="deptname" style="color:black">Dept Name</label>
                                <input type="text" name="deptname" class="form-control" id="deptname"
                                    readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group">
                                <label for="area" style="color:black">Area</label>
                                <select name="area" id="area" class="form-control">
                                    <?php
                                            $data = $this->model_datacustomer->data_area();
                                            foreach($data->result() as $dt){
                                        ?>
                                    <option value="<?php echo $dt->area;?>" type="text" style="color:black">
                                        <?php echo $dt->area;?></option>
                                    <?php
                                                } 
                                        ?>
                                </select>
                            </div>

                            <div class="form-group" method="post">
                                <label for="salesid" style="color:black">Sales ID</label>
                                <input type="text" name="salesid" class="form-control" id="salesid" readonly="readonly"
                                    style="color:black">
                            </div>

                            <div class="form-group">
                                <label for="salesname" style="color:black">Sales Name</label>
                                <select name="salesname" id="salesname" class="form-control"
                                    onchange="cari_salesid(this.value);">
                                    <?php
                                            $data = $this->model_datacustomer->data_all_sales();
                                            foreach($data->result() as $dt){
                                        ?>
                                    <option value="<?php echo $dt->salesname;?>" type="text" style="color:black">
                                        <?php echo $dt->salesname;?></option>
                                    <?php
                                                } 
                                        ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="titikkoordinat" style="color:black">Titik Koordinat</label>
                                <input type="text" name="titikkoordinat" class="form-control" id="titikkoordinat"
                                    placeholder="Enter Koordinat ex: -6.123123,109.23233">
                            </div>

                        </div>




                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- /.content -->
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <!-- modals data-->

        <!-- /.modal -->



        <!-- jquery 3 -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js">
        </script>

        <script type="text/javascript">
        $(function() {
            $('#example1').dataTable()
        })
        </script>