<section class="content">
    <div class="row">



        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $this->session->flashdata('pesan');?>
                    <div class="box">

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-stripped" style="font-size:13px;">
                                <thead>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Alamat</th>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Sales ID</th>
                                    <th>Sales Name</th>
                                    <th>Dept ID</th>
                                    <th>Dept Name</th>
                                    <th>Area</th>
                                    <th>Titik Koordinat</th>
                                    <th>Margin</th>
                                    <th>Action</th>
                                    <thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach ($alamat as $row) {?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td> <?php echo $row->ID;    ?> </td>
                                            <td> <?php echo $row->Alamat;    ?> </td>
                                            <td> <?php echo $row->customerid;    ?> </td>
                                            <td> <?php echo $row->customername;    ?> </td>
                                            <td> <?php echo $row->salesid;    ?> </td>
                                            <td> <?php echo $row->salesname;    ?> </td>
                                            <td> <?php echo $row->deptid;    ?> </td>
                                            <td> <?php echo $row->deptname;    ?> </td>
                                            <td> <?php echo $row->Area;    ?> </td>
                                            <td> <?php echo $row->titikkoordinat;    ?> </td>
                                            <td> <?php     ?> </td>
                                            <td>

                                                <a title="detail data"
                                                    href="<?php echo base_url('admin/Margin/check/'.$row->ID);?>"
                                                    class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
                                                </a>

                                                <a title="edit data"
                                                    href="<?php echo base_url('admin/Margin/edit2/'.$row->ID); ?>"
                                                    class="btn bg-navy btn-sm"><i class="fa fa-pencil"></i>
                                                </a>

                                                <a title="delete data"
                                                    href="<?php echo base_url('admin/Margin/delete/'.$row->ID); ?>"
                                                    onclick="return confirm('Delete Data?')"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
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

    </div>
    <!-- /.row -->
</section>

<div class=" modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Follow UP</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('admin/Dataprogpo/update_add');?>">
                        <div class="box-body">


                            <div class="form-group" method="post">
                                <label for="wonumber" style="color:black">Wo
                                    Number</label>
                                <input value="<?php echo $datawo['wonumber']; ?>" type="text" name="wonumber"
                                    class="form-control" id="wonumber" readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group" method="post">
                                <label for="customerid" style="color:black">Customer
                                    ID</label>
                                <input value="<?php echo $datawo['customerid']; ?>" type="text" name="customerid"
                                    class="form-control" id="customerid" readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group" method="post">
                                <label for="customername" style="color:black">Customer
                                    Name</label>
                                <input value="<?php echo $datawo['customername']; ?>" type="text" name="customername"
                                    class="form-control" id="customername" readonly="readonly" style="color:black">
                            </div>


                            <div class="form-group" method="post">
                                <label name="progress2" id="progress" for="progress" style="color:black">Final
                                    Status</label>
                                <select name="progress" class="form-control">
                                    <option type="text" style="color:black"> DONE
                                    </option>
                                    <option type="text" style="color:black"> ON PROGRESS
                                    </option>
                                    <option type="text" style="color:black"> CANCELLED
                                    </option>
                                </select>
                            </div>


                            <div class=" form-group" method="post" id="update">
                                <label for="update" style="color:black">Update
                                    Status</label>
                                <textarea class="form-control" rows="3" name="update"></textarea>
                            </div>

                        </div>

                        <div class=" modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline">Save
                                changes</button>
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