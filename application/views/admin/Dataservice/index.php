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
                        <i class="fa fa-plus"></i> Add Data Service
                    </button>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-stripped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Service</th>
                            <th>Action</th>
                            <thead>
                            <tbody>
                                <?php $i=1;
                                foreach($tbl_service as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->ID; ?></td>
                                    <td><?php echo $row->Kategori; ?></td>
                                    <td><?php echo $row->service; ?></td>
                                    <td>
                                        <a title="delete data"
                                            href="<?php echo base_url('admin/Dataservice/delete/'.$row->ID); ?>"
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
                <h4 class="modal-title">Data Service</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Data Service</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('admin/Dataservice/add');?>">
                        <div class="box-body">


                            <div class="form-group">
                                <label for="Kategori" style="color:black">Kategori</label>
                                <input type="text" name="Kategori" class="form-control" id="Kategori"
                                    placeholder="Enter Category Name">
                            </div>

                            <div class="form-group">
                                <label for="service" style="color:black">Service Name</label>
                                <input type="text" name="service" class="form-control" id="service"
                                    placeholder="Enter service Name">
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