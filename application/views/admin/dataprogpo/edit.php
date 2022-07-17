<section class="content">
    <div class="row">

        <div class="col-xs-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Work Order Data</h3>
                </div>
                <!-- /.box-header -->
                <form method="post" action="<?php echo base_url('admin/Dataprogpo/edit'); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label style="color:black">WO Date</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="wodate" id="wodate" type="date" class="form-control"
                                    value="<?php echo $datawo['wodate'];?>" data-inputmask="'alias': 'dd/mm/yyyy'"
                                    data-mask="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="wonumber" style="color:black">WO Number</label>
                            <input value="<?php echo $datawo['wonumber'];?>" type="integer" name="wonumber"
                                class="form-control" id="wonumber" placeholder="Enter Wo Number">
                        </div>

                        <div class="form-group">
                            <label for="ponumber" style="color:black">PO Number</label>
                            <input type="text" name="ponumber" class="form-control" id="ponumber"
                                placeholder="Enter PO Number" value="<?php echo $datawo['ponumber'];?>">
                        </div>

                        <div class="form-group">
                            <label style="color:black" ">Customer Code</label>
                                <input name=" customerid" id="customerid" class="form-control"
                                value="<?php echo $datawo['customerid'];?>" readonly="true">

                                </input>
                        </div>

                        <div class="form-group" method="post">
                            <label for="customername" style="color:black">Customer Name</label>
                            <input type="text" name="customername" class="form-control" id="customername"
                                readonly="readonly" style="color:black" value="<?php echo $datawo['customername'];?>"
                                readonly="true">
                        </div>


                        <div class="form-group">
                            <label for="vendorid" style="color:black">Vendor ID</label>
                            <input name="vendorid" id="vendorid" class="form-control"
                                value="<?php echo $datawo['vendorid'];?>" readonly="true" </input>
                        </div>

                        <div class="form-group" method="post">
                            <label for="vendorname" style="color:black">Vendor Name</label>
                            <input value="<?php echo $datawo['vendorname'];?>" readonly="true" type="text"
                                name="vendorname" class="form-control" id="vendorname" readonly="readonly"
                                style="color:black">
                        </div>

                        <div class="form-group">
                            <label for="mrc" style="color:black">MRC</label>
                            <input value="<?php echo $datawo['mrc'];?>" type="number" name="mrc" class="form-control"
                                id="mrc" placeholder="Enter MRC">
                        </div>

                        <div class="form-group">
                            <label for="otc" style="color:black">OTC</label>
                            <input value="<?php echo $datawo['otc'];?>" type="number" name="otc" class="form-control"
                                id="otc" placeholder="Enter OTC">
                        </div>

                        <div class="form-group">
                            <label for="deptid" style="color:black">Department</label>
                            <input value="<?php echo $datawo['deptid'];?>" readonly="true" name="deptid" id="deptid"
                                class="form-control" onchange="cari_dept(this.value);">

                            </input>
                        </div>

                        <div class="form-group" method="post">
                            <label for="deptname" style="color:black">Dept Name</label>
                            <input value="<?php echo $datawo['deptname'];?>" readonly="true" type="text" name="deptname"
                                class="form-control" id="deptname" readonly="readonly" style="color:black">
                        </div>

                        <div class="form-group">
                            <label for="area" style="color:black">Area</label>
                            <input value="<?php echo $datawo['area'];?>" readonly="true" name="area" id="area"
                                class="form-control">

                            </input>
                        </div>

                        <div class="form-group" method="post">
                            <label for="salesid" style="color:black">Sales ID</label>
                            <input value="<?php echo $datawo['salesid'];?>" readonly="true" type="text" name="salesid"
                                class="form-control" id="salesid" readonly="readonly" style="color:black">
                        </div>

                        <div class="form-group">
                            <label for="salesname" style="color:black">Sales Name</label>
                            <input value="<?php echo $datawo['salesname'];?>" readonly="true" name="salesname"
                                id="salesname" class="form-control">

                            </input>
                        </div>

                        <div class="form-group" method="post">
                            <label for="email" style="color:black">Sales Email</label>
                            <input value="<?php echo $datawo['email'];?>" readonly="true" type="text" name="email"
                                class="form-control" id="email" readonly="readonly" style="color:black">
                        </div>

                        <div class="form-group">
                            <label for="titikkoordinat" style="color:black">Titik Koordinat</label>
                            <input value="<?php echo $datawo['titikkoordinat'];?>" type="text" name="titikkoordinat"
                                class="form-control" id="titikkoordinat"
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
                            <input value="<?php echo $datawo['nodeb'];?>" type="text" name="nodeb" class="form-control"
                                id="nodeb" placeholder="Enter Node B">
                        </div>

                        <div class="form-group">
                            <label for="statuspo" style="color:black">Status PO</label>
                            <input value="<?php echo $datawo['statuspo'];?>" readonly="true" name="statuspo"
                                id="statuspo" class="form-control">
                            </input>
                        </div>

                        <div class="form-group">
                            <label for="vendorawal" style="color:black">Vendor Awal</label>
                            <input value="<?php echo $datawo['vendorawal'];?>" readonly="true" name="vendorawal"
                                id="vendorawal" class="form-control">
                            </input>
                        </div>


                        <div class="form-group">
                            <label for="kapasitasvendor" style="color:black">Kapasitas Vendor</label>
                            <input value="<?php echo $datawo['kapasitasvendor'];?>" type="number" name="kapasitasvendor"
                                class="form-control" id="kapasitasvendor" placeholder="EnterKapasitas">
                        </div>


                        <div class="form-group">
                            <label class="col-sm-0 control-label"></label>

                            <div class="col-sm-1">
                                <button type="submit" name="submit" class="btn fa fa-save bg-navy"></button>
                            </div>

                            <div class="col-sm-2">
                                <?php
                          echo anchor('admin/dataprogpo/index', 'Back', array('class'=>'btn fa fa-close btn-danger'));
                        ?>
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