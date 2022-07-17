<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <?php echo $this->session->flashdata('pesan');?>
            <div class="box">
                <div class="box-header">
                    <!-- button add -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Data Customer
                    </button>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-stripped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Sales ID</th>
                            <th>Dept ID</th>
                            <th>Action</th>
                            <thead>
                            <tbody>
                                <?php $i=1;
                                foreach($datacustomer as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->customerid; ?></td>
                                    <td><?php echo $row->customername; ?></td>
                                    <td><?php echo $row->salesid; ?></td>
                                    <td><?php echo $row->deptid; ?></td>
                                    <td>
                                        <a title="delete data"
                                            href="<?php echo base_url('admin/Datacustomer/delete/'.$row->customerid); ?>"
                                            onclick="return confirm('Delete Data?')" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</section>
<div class="modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Customer Data</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Data Customer</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('admin/Datacustomer/add');?>">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="customerid" style="color:black">Customer ID</label>
                                <input type="integer" name="customerid" class="form-control" id="customerid"
                                    placeholder="Enter Customer ID">
                            </div>

                            <div class="form-group">
                                <label for="customername" style="color:black">Customer Name</label>
                                <input type="text" name="customername" class="form-control" id="customername"
                                    placeholder="Enter Customer Name">
                            </div>

                            <div class="form-group">
                                <label style="color:black">Sales ID</label>
                                <select name="salesid" id="salesid" class="form-control">
                                    <?php
								        $data = $this->model_datacustomer->data_all_sales();
								        foreach($data->result() as $dt){
								    ?>
                                    <option value="<?php echo $dt->salesid;?>" style="color:black">
                                        <?php echo $dt->salesname;?></option>
                                    <?php
								             }
								    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="color:black">Dept ID</label>
                                <select name="deptid" id="deptid" class="form-control">
                                    <?php
								        $data = $this->model_datacustomer->data_all_dept();
								        foreach($data->result() as $dt){
								    ?>
                                    <option value="<?php echo $dt->deptid;?>" style="color:black">
                                        <?php echo $dt->deptname;?></option>
                                    <?php
								             }
								    ?>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->
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