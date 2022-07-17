<section class="content">
    <div class="row">

        <div class="col-xs-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Work Order Data</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form action="http://localhost/pis_akademik/siswa/export_excel" method="post"
                        accept-charset="utf-8">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>WO Date</td>
                                    <td>
                                        <?php echo $datawo['wodate']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>WO Number</td>
                                    <td>
                                        <?php echo $datawo['wonumber']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>PO Number</td>
                                    <td>
                                        <?php echo $datawo['ponumber']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Customer Code</td>
                                    <td>
                                        <?php echo $datawo['customerid']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Customer Name</td>
                                    <td>
                                        <?php echo $datawo['customername']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Vendor ID</td>
                                    <td>
                                        <?php echo $datawo['vendorid']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Vendor Name</td>
                                    <td>
                                        <?php echo $datawo['vendorname']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>MRC</td>
                                    <td>
                                        <?php echo $datawo['mrc']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>OTC</td>
                                    <td>
                                        <?php echo $datawo['otc']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Dept ID</td>
                                    <td>
                                        <?php echo $datawo['deptid']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Dept Name</td>
                                    <td>
                                        <?php echo $datawo['deptname']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Area</td>
                                    <td>
                                        <?php echo $datawo['area']; ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Sales ID</td>
                                    <td>
                                        <?php echo $datawo['salesname']; ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Sales Email</td>
                                    <td>
                                        <?php echo $datawo['email']; ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Titik Koordinat</td>
                                    <td>
                                        <?php echo $datawo['titikkoordinat']; ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Node A</td>
                                    <td>
                                        <?php echo $datawo['nodea']; ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td>Node B</td>
                                    <td>
                                        <?php echo $datawo['nodeb']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Status PO</td>
                                    <td>
                                        <?php echo $datawo['statuspo']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Vendor Awal</td>
                                    <td>
                                        <?php echo $datawo['vendorawal']; ?>
                                    </td>
                                </tr>



                                <tr>
                                    <td>Kapasitas Vendor</td>
                                    <td>
                                        <?php echo $datawo['kapasitasvendor']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Update</td>
                                    <td>
                                        <?php echo $datawo['wonumber']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="btn bg-navy" data-toggle="modal"
                                            data-target="#modal-info">
                                            <i class="fa fa-plus"></i> Add Update
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        <ul class="timeline col-xs-5">

            <!-- timeline time label -->
            <li class="time-label">
                <span class="bg-red">
                    START
                </span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <?php foreach($updating as $row){ ?>
            <li>
                <!-- timeline icon -->

                <i class="fa fa-clock-o bg-gray"></i>
                <div class="timeline-item">

                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row->createdate; ?></span>
                    <h3 class="timeline-header" style="font-weight: bold">VNP Team</h3>
                    <div class="timeline-body">
                        <?php echo $row->update; ?>
                    </div>
                </div>
                <?php }?>
            </li>
            <li>
                <i class="fa  fa-dot-circle-o bg-blue"></i>
            </li>
        </ul>

    </div>
    <!-- /.row -->
</section>

<div class="modal modal-info fade" id="modal-info">
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
                                <label for="wonumber" style="color:black">Wo Number</label>
                                <input value="<?php echo $datawo['wonumber']; ?>" type="text" name="wonumber"
                                    class="form-control" id="wonumber" readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group" method="post">
                                <label for="customerid" style="color:black">Customer ID</label>
                                <input value="<?php echo $datawo['customerid']; ?>" type="text" name="customerid"
                                    class="form-control" id="customerid" readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group" method="post">
                                <label for="customername" style="color:black">Customer Name</label>
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
                                <label for="update" style="color:black">Update Status</label>
                                <textarea class="form-control" rows="3" name="update"></textarea>
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