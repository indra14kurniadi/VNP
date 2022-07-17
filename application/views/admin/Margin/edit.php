<section class="content">
    <div class="row">

        <div class="col-xs-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data Alamat</h3>
                </div>
                <!-- /.box-header -->
                <form method="post" action="<?php echo base_url('admin/Margin/edit2'); ?>">
                    <div class="box-body">

                        <div class="form-group">
                            <label style="color:black" ">ID</label>
                                <input name=" ID" id="ID" class="form-control" value="<?php echo $alamat['ID'];?>"
                                readonly="true">

                                </input>
                        </div>

                        <div class="form-group">
                            <label style="color:black" ">Customer Code</label>
                                <input name=" customerid" id="customerid" class="form-control"
                                value="<?php echo $alamat['customerid'];?>" readonly="true">

                                </input>
                        </div>

                        <div class="form-group" method="post">
                            <label for="customername" style="color:black">Customer Name</label>
                            <input type="text" name="customername" class="form-control" id="customername"
                                readonly="readonly" style="color:black" value="<?php echo $alamat['customername'];?>"
                                readonly="true">
                        </div>

                        <div class="form-group">
                            <label for="Alamat" style="color:black">Alamat</label>
                            <input value="<?php echo $alamat['Alamat'];?>" type="text" name="Alamat"
                                class="form-control" id="Alamat" placeholder="Enter Alamat">
                        </div>

                        <div class="form-group" method="post">
                            <label for="salesid" style="color:black">Sales ID</label>
                            <input value="<?php echo $alamat['salesid'];?>" readonly="true" type="text" name="salesid"
                                class="form-control" id="salesid" readonly="readonly" style="color:black">
                        </div>

                        <div class="form-group">
                            <label for="salesname" style="color:black">Sales Name</label>
                            <input value="<?php echo $alamat['salesname'];?>" readonly="true" name="salesname"
                                id="salesname" class="form-control">

                            </input>
                        </div>

                        <div class="form-group">
                            <label for="deptid" style="color:black">Department</label>
                            <input value="<?php echo $alamat['deptid'];?>" readonly="true" name="deptid" id="deptid"
                                class="form-control" onchange="cari_dept(this.value);">

                            </input>
                        </div>

                        <div class="form-group" method="post">
                            <label for="deptname" style="color:black">Dept Name</label>
                            <input value="<?php echo $alamat['deptname'];?>" readonly="true" type="text" name="deptname"
                                class="form-control" id="deptname" readonly="readonly" style="color:black">
                        </div>

                        <div class="form-group">
                            <label for="Area" style="color:black">Area</label>
                            <input value="<?php echo $alamat['Area'];?>" readonly="true" name="Area" id="Area"
                                class="form-control">

                            </input>
                        </div>

                        <div class="form-group">
                            <label for="titikkoordinat" style="color:black">Titik Koordinat</label>
                            <input value="<?php echo $alamat['titikkoordinat'];?>" type="text" name="titikkoordinat"
                                class="form-control" id="titikkoordinat"
                                placeholder="Enter Koordinat ex: -6.123123,109.23233">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-0 control-label"></label>

                            <div class="col-sm-1">
                                <button type="submit" name="save" class="btn fa fa-save bg-navy"></button>
                            </div>

                            <div class="col-sm-2">
                                <?php
                          echo anchor('admin/Margin/', 'Back', array('class'=>'btn fa fa-close btn-danger'));
                        ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    </div>
    <!-- /.row -->
</section>