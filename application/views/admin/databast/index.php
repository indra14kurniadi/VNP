<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <?php

use LDAP\Result;

 echo $this->session->flashdata('pesan');?>
            <div class="box">
                <div class="box-header">
                    <!-- button add -->

                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-stripped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>WO Number</th>
                            <th>PO Number</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Vendor ID</th>
                            <th>Vendor Name</th>
                            <th>Dept ID</th>
                            <th>Dept Name</th>
                            <th>Area</th>
                            <th>Sales ID</th>
                            <th>Sales Name</th>
                            <th>Kapasitas</th>
                            <th>Done Date</th>
                            <th>Progress</th>
                            <th>File BAST</th>
                            <th>Status BAST Vendor</th>
                            <th>Action</th>
                            <thead>
                            <tbody>
                                <?php $i=1;
                                foreach($datajoin as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->wonumber; ?></td>
                                    <td><?php echo $row->ponumber; ?></td>
                                    <td><?php echo $row->customerid; ?></td>
                                    <td><?php echo $row->customername; ?></td>
                                    <td><?php echo $row->vendorid; ?></td>
                                    <td><?php echo $row->vendorname; ?></td>
                                    <td><?php echo $row->deptid; ?></td>
                                    <td><?php echo $row->deptname; ?></td>
                                    <td><?php echo $row->area; ?></td>
                                    <td><?php echo $row->salesid; ?></td>
                                    <td><?php echo $row->salesname; ?></td>
                                    <td><?php echo $row->kapasitasvendor; ?></td>
                                    <td><?php echo $row->createdate; ?></td>
                                    <td><?php echo $row->Status; ?></td>
                                    <td>
                                        <?php
                                        $where1 = $row->wonumber;
                                        $data2 = $this->db->where('wonumber', $where1)->get('databast')->row_array();?>

                                        <a href="<?php echo base_url('berkas/'.$data2['bastupload']);?>"><?php echo $data2['bastupload']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($data2['bastupload']==""){
                                            echo '<span class="label label-danger">'."NOT DONE".'</span>';
                                        }else {
                                            echo '<span class="label label-success">'."DONE".'</span>';
                                        }       
                                        ?>
                                    </td>
                                    <td>
                                        <a title="detail data"
                                            href="<?php echo base_url('admin/Databast/detail/'.$row->wonumber); ?>"
                                            class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <table>
                </div>
            </div>

        </div>
        <div>

</section>

<!-- /.modal -->

<div class="modal modal-info fade" id="modal-bast">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data BAST</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('admin/Databast/addbast');?>">
                        <div class="box-body">


                            <div class="form-group" method="post">
                                <label for="wonumber" style="color:black">Wo Number</label>
                                <input value="<?php echo $datajoin["wonumber"]?>" type="text" name="wonumber"
                                    class="form-control" id="wonumber" readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group" method="post">
                                <label for="customerid" style="color:black">PO Number</label>
                                <input value="" type="text" name="customerid" class="form-control" id="customerid"
                                    readonly="readonly" style="color:black">
                            </div>






                        </div>

                        <div class=" modal-footer">
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
    </div>
</div>

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