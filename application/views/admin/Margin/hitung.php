<section class="content">
    <div class="row">

        <div class="col-xs-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">DATA SERVICE REQUEST</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form action="http://localhost/pis_akademik/siswa/export_excel" method="post"
                        accept-charset="utf-8">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Tanggal Request</td>
                                    <td>
                                        <?php echo $tbl_check['tglreq']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat ID</td>
                                    <td>
                                        <?php echo $tbl_check['alamatid']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Service ID</td>
                                    <td>
                                        <?php echo $tbl_check['serviceid']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Service Name</td>
                                    <td>
                                        <?php echo $tbl_check['service']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        <?php echo $tbl_check['kategori']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>IIX</td>
                                    <td>
                                        <?php echo $tbl_check['iix']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>IX</td>
                                    <td>
                                        <?php echo $tbl_check['ix']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>MRC</td>
                                    <td>
                                        <?php echo $tbl_check['mrcjual']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>OTC</td>
                                    <td>
                                        <?php echo $tbl_check['otcjual']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Dept ID</td>
                                    <td>
                                        <?php echo $tbl_check['durasikontrak']; ?>
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

        <div class="col-xs-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">DATA SERVICE REQUEST</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form action="http://localhost/pis_akademik/siswa/export_excel" method="post"
                        accept-charset="utf-8">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Service ID</td>
                                    <td>
                                        <input method="post" value="<?php echo $tbl_check['serviceid'] ?>" type="text"
                                            name="wonumber" class="form-control" readonly="readonly" id="wonumber"
                                            style="color:black">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vendor Assigned</td>
                                    <td>
                                        <select method="post" name="vendorname" id="Vendorname" class="form-control">
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
                                    </td>
                                </tr>

                                <tr>
                                    <td>MRC Beli</td>
                                    <td>
                                        <input method="post" type="integer" name="mrcbeli" class="form-control"
                                            id="mrcbeli" style="color:black">
                                    </td>
                                </tr>

                                <tr>
                                    <td>OTC Beli</td>
                                    <td>
                                        <input method="post" type="integer" name="otcbeli" class="form-control"
                                            id="otcbeli" style="color:black">
                                    </td>
                                </tr>

                                <tr>
                                    <td>IKG</td>
                                    <td>
                                        <input method="post" type="integer" name="ikg" class="form-control" id="ikg"
                                            style="color:black">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Intercity</td>
                                    <td>
                                        <input method="post" type="integer" name="intercity" class="form-control"
                                            id="intercity" style="color:black" value="<?php 
                                            $sql="SELECT area.Intercity from area JOIN alamat on area.Intercity=alamat.Alamat join tbl_check on alamat.ID=tbl_check.alamatid";
                                            $data=$this->db->query($sql)->result_array();
                                            var_dump($data);die;
                                              ?>">
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