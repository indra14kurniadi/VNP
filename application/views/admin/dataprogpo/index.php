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
                            <i class="fa fa-plus"></i> Add Data WO
                        </button>
                        <a class="btn bg-orange" href="<?php echo base_url('admin/Dataprogpo/form');?>">
                            <i class="fa fa-plus"></i> Import Data WO
                        </a>
                        <a class="btn bg-blue" href="<?php echo base_url('admin/Dataprogpo/export_excel');?>">
                            <i class="fa fa-print" aria-hidden="true"></i> Export to Excel
                        </a>
                        <a class="btn bg-black" href="<?php echo base_url('admin/Dataprogpo/emailnotdone');?>">
                            <i class="fa fa-send"></i> Send Email Not Done
                        </a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-stripped" style="font-size:13px;">
                            <thead>
                                <th>No</th>
                                <th>WO Date</th>
                                <th>WO Number</th>
                                <th>PO Number</th>
                                <th>Customer Code</th>
                                <th>Vendor</th>
                                <th>Progress Status</th>
                                <th>Date Spending</th>
                                <th>Status Delivery</th>
                                <th>Action</th>
                                <thead>
                                <tbody>
                                    <?php $i=1;
                                    foreach($datawo as $row) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->wodate; ?></td>
                                        <td><?php echo $row->wonumber; ?></td>
                                        <td><?php echo $row->ponumber; ?></td>
                                        <td><?php echo $row->customerid; ?></td>
                                        <td><?php echo $row->vendorid; ?></td>
                                        <td>
                                            <?PHP 
                                            $where1 = $row->wonumber;
                                            $data2 = $this->db->where('wonumber', $where1 )->order_by('createdate','desc')->get('tblupdate')->row_array();
                                            
                                        
                                            if ($data2['Status']=="DONE") {
                                                echo '<span class="label label-success">'.$data2['Status'].'</span>';
                                            } elseif ($data2['Status']=="ON PROGRESS") {
                                                echo '<span class="label label-warning">'.$data2['Status'].'</span>';
                                            }else {
                                                echo '<span class="label label-danger">'.$data2['Status'].'</span>';
                                            }
                                        
                                    
                                            
                                            ?>


                                        </td>
                                        <td>
                                            <?php 
                                            if ($data2['Status']=="DONE") {
                                                $origin=new DateTime($row->wodate);
                                                $data2 = $this->db->where('wonumber', $where1 )->order_by('createdate','desc')->get('tblupdate')->row_array();
                                                $target=new datetime($data2['createdate']);
                                                $interval=date_diff($origin,$target);
                                                echo '<span class="label label-success">'.$interval->format('%a days').'</span>';
                                                
                                            }elseif ($data2['Status']=="ON PROGRESS"){
                                        
                                            $target = new datetime();
                                            $origin = new DateTime($row->wodate);
                                            $interval = date_diff($origin,$target);
                                            
                                                
                                                
                                                    echo '<span class="label label-warning">'.$interval->format('%a days').'</span>';
                                                
                                            } else {
                                                $data2 = $this->db->where('wonumber', $where1 )->order_by('createdate','desc')->get('tblupdate')->row_array();
                                                echo '<span class="label label-danger">'."CANCELLED".'</span>';
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <?php                                   
                                            if ($data2['Status']=="CANCELLED"){
                                                echo '<span class="label label-danger">'."CANCELLED".'</span>';
                                            }elseif ($data2['Status']=="ON PROGRESS"){
                                                echo "";
                                            }elseif($interval->format('%a days')<=20 and $data2['Status']=="DONE"){
                                                echo'<span class="label label-success">'."ONTIME".'</span>';
                                            }else {
                                                echo '<span class="label label-danger">'."DELAY".'</span>';
                                            }       
                                            ?>
                                        </td>

                                        <td>
                                            <a title="detail data"
                                                href="<?php echo base_url('admin/Dataprogpo/detail/'.$row->wonumber); ?>"
                                                class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
                                            </a>

                                            <a title="edit data"
                                                href="<?php echo base_url('admin/Dataprogpo/edit/'.$row->wonumber); ?>"
                                                class="btn bg-navy btn-sm"><i class="fa fa-pencil"></i>
                                            </a>

                                            <a title="delete data"
                                                href="<?php echo base_url('admin/Dataprogpo/delete/'.$row->wonumber); ?>"
                                                onclick="return confirm('Delete Data?')"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                            </a>


                                            <a href="<?php echo base_url('admin/Dataprogpo/sendemail/'.$row->wonumber); ?>"
                                                type="submit" name="send" class="btn btn-sm bg-navy">
                                                <i class="fa fa-send"></i>
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
                    <h4 class="modal-title">Data Work Order</h4>
                </div>
                <div class="modal-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Data WO</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="<?php echo base_url('admin/Dataprogpo/add');?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label style="color:black">WO Date</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="wodate" id="wodate" type="date" class="form-control"
                                            data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="wonumber" style="color:black">WO Number</label>
                                    <input type="integer" name="wonumber" class="form-control" id="wonumber"
                                        placeholder="Enter Wo Number">
                                </div>

                                <div class="form-group">
                                    <label for="ponumber" style="color:black">PO Number</label>
                                    <input type="text" name="ponumber" class="form-control" id="ponumber"
                                        placeholder="Enter PO Number">
                                </div>

                                <div class="form-group">
                                    <label style="color:black" ">Customer Code</label>
                                    <select name=" customerid" id="customerid" class="form-control"
                                        onchange="cari_customername(this.value);">
                                        <?php
                                            $data = $this->model_datacustomer->getdata();
                                            foreach($data->result() as $dt){
                                        ?>
                                        <option value=" <?php echo $dt->customerid;?>" type="number"
                                            style="color:black">
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
                                    <label for="vendorid" style="color:black">Vendor ID</label>
                                    <select name="vendorid" id="vendorid" class="form-control"
                                        onchange="cari_vendorname(this.value);">
                                        <?php
                                            $data = $this->model_datacustomer->data_vendor();
                                            foreach($data->result() as $dt){
                                        ?>
                                        <option value="<?php echo $dt->vendorid;?>" type="text" style="color:black">
                                            <?php echo $dt->vendorid;?></option>
                                        <?php
                                                } 
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group" method="post">
                                    <label for="vendorname" style="color:black">Vendor Name</label>
                                    <input type="text" name="vendorname" class="form-control" id="vendorname"
                                        readonly="readonly" style="color:black">
                                </div>

                                <div class="form-group">
                                    <label for="mrc" style="color:black">MRC</label>
                                    <input type="number" name="mrc" class="form-control" id="mrc"
                                        placeholder="Enter MRC">
                                </div>

                                <div class="form-group">
                                    <label for="otc" style="color:black">OTC</label>
                                    <input type="number" name="otc" class="form-control" id="otc"
                                        placeholder="Enter OTC">
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
                                    <input type="text" name="salesid" class="form-control" id="salesid"
                                        readonly="readonly" style="color:black">
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

                                <div class="form-group" method="post">
                                    <label for="email" style="color:black">Sales Email</label>
                                    <input type="text" name="email" class="form-control" id="email" readonly="readonly"
                                        style="color:black">
                                </div>

                                <div class="form-group">
                                    <label for="titikkoordinat" style="color:black">Titik Koordinat</label>
                                    <input type="text" name="titikkoordinat" class="form-control" id="titikkoordinat"
                                        placeholder="Enter Koordinat ex: -6.123123,109.23233">
                                </div>

                                <div class="form-group">
                                    <label for="nodea" style="color:black">Node A</label>
                                    <select name="nodea" id="nodea" class="form-control">
                                        <?php
                                            $data = $this->model_datacustomer->data_node();
                                            foreach($data->result() as $dt){
                                        ?>
                                        <option value="<?php echo $dt->node;?>" type="text" style="color:black">
                                            <?php echo $dt->node;?></option>
                                        <?php
                                                } 
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nodeb" style="color:black">Node B</label>
                                    <input type="text" name="nodeb" class="form-control" id="nodeb"
                                        placeholder="Enter Node B">
                                </div>

                                <div class="form-group">
                                    <label for="statuspo" style="color:black">Status PO</label>
                                    <select name="statuspo" id="statuspo" class="form-control">

                                        <option type="text" style="color:black"> New Customer </option>
                                        <option type="text" style="color:black"> service Change </option>
                                        <option type="text" style="color:black"> Relokasi </option>
                                        <option type="text" style="color:black"> BOD </option>
                                        <option type="text" style="color:black"> Internal HYP </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="vendorawal" style="color:black">Vendor Awal</label>
                                    <select name="vendorawal" id="vendorawal" class="form-control">
                                        <option type="text" style="color:black"> -- pilih -- </option>
                                        <?php
                                            $data = $this->model_datacustomer->data_vendor();
                                            foreach($data->result() as $dt){
                                        ?>
                                        <option value="<?php echo $dt->vendorid;?>" type="text" style="color:black">
                                            <?php echo $dt->vendorname;?></option>
                                        <?php
                                                } 
                                        ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="kapasitasvendor" style="color:black">Kapasitas Vendor</label>
                                    <input type="number" name="kapasitasvendor" class="form-control"
                                        id="kapasitasvendor" placeholder="EnterKapasitas">
                                </div>



                            </div>




                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left"
                                    data-dismiss="modal">Close</button>
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
            <script type="text/javascript"
                src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js">
            </script>

            <script type="text/javascript">
            $(function() {
                $('#example1').dataTable()
            })
            </script>