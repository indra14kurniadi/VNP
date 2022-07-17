<section class="content">
    <div class="row">

        <div class="col-xs-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Work Order Data</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form action="<?php echo base_url('admin/Databast/do_upload');?>" method="post"
                        accept-charset="utf-8" enctype="multipart/form-data">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>WO Number</td>
                                    <td>
                                        <input value="<?php echo $datawo['wonumber']  ?>" type="text" name="wonumber"
                                            readonly="readonly" id="wonumber" class="form-control" method="post"
                                            style="color:black">
                                    </td>
                                </tr>

                                <tr>
                                    <td>PO Number</td>
                                    <td>
                                        <input value="<?php echo $datawo['ponumber']; ?>" type="text" name="ponumber"
                                            readonly="readonly" id="ponumber" class="form-control" method="post"
                                            style="color:black">

                                    </td>
                                </tr>


                                <tr>
                                    <td>Vendor ID</td>
                                    <td>
                                        <input value=" <?php echo $datawo['vendorid']; ?>" type="text" name="vendorid"
                                            readonly="readonly" id="vendorid" class="form-control" method="post"
                                            style="color:black">

                                    </td>
                                </tr>


                                <tr>
                                    <td>BAST Date</td>
                                    <td>
                                        <input type="date" name="bastdate" class="form-control" id="bastdate"
                                            method="post" style="color:black"></input>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Upload BAST</td>
                                    <td>
                                        <input value="<?php echo date("Y-m-d H:i:s");?>" type="text" name="uploadpertgl"
                                            class="form-control" id="uploadpertgl" method="post"
                                            style="color:black"></input>

                                    </td>
                                </tr>


                                <tr>
                                    <td>File BAST</td>
                                    <td>
                                        <input type="file" name="bastupload" class="form-control" id="bastupload"
                                            method="post" style="color:black"></input>
                                    </td>
                                </tr>




                                <tr>
                                    <td colspan="2">

                                        <button type="submit" class="btn bg-navy" name="proses" value="upload">
                                            <i class=" fa fa-plus"></i> Upload Data
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


    </div>
    <!-- /.row -->
</section>