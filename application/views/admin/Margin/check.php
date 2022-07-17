<script type="text/javascript">
function cari_serviceid() {
    var service = $("#service").val();

    $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/admin/Margin/cari_serviceid",
        data: "service=" + service,
        dataType: "json",
        success: function(data) {
            $('#ID').val(data.ID);
            $('#Kategori').val(data.Kategori);
        }
    });
}
</script>

<section class="content">
    <div class="row">



        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $this->session->flashdata('pesan');?>
                    <div class="box">
                        <button type="button" class="btn bg-navy" data-toggle="modal" data-target="#modal-info">
                            <i class="fa fa-plus"></i> Add Data service
                        </button>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-stripped" style="font-size:13px;">
                                <thead>
                                    <th>No</th>
                                    <th>Tanggal Req</th>
                                    <th>Service ID</th>
                                    <th>Service Name</th>
                                    <th>Kategori</th>
                                    <th>IIX</th>
                                    <th>IX</th>
                                    <th>MRC Jual</th>
                                    <th>OTC Jual</th>
                                    <th>Durasi Kontrak</th>
                                    <th>Margin</th>
                                    <th>Action</th>
                                    <thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach ($tbl_check as $row) {?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td> <?php echo $row->tglreq;    ?> </td>
                                            <td> <?php  echo $row->serviceid;    ?> </td>
                                            <td> <?php   echo $row->service;   ?> </td>
                                            <td> <?php   echo $row->kategori;   ?> </td>
                                            <td> <?php   echo $row->iix;  ?> </td>
                                            <td> <?php   echo $row->ix;   ?> </td>
                                            <td> <?php  echo $row->mrcjual; ?> </td>
                                            <td> <?php  echo $row->otcjual;    ?> </td>
                                            <td> <?php  echo $row->durasikontrak;    ?> </td>
                                            <td> <?php     ?> </td>
                                            <td>

                                                <a title="Calculate data"
                                                    href="<?php echo base_url('admin/Margin/hitung/'.$row->serviceid);?>"
                                                    class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
                                                </a>

                                                <a title="edit data" href="<?php echo base_url(''); ?>"
                                                    class="btn bg-navy btn-sm"><i class="fa fa-pencil"></i>
                                                </a>

                                                <a title="delete data" href="<?php echo base_url(''); ?>"
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
                <h4 class="modal-title">Data Service</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('admin/Margin/add_service');?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label style="color:black">Tgl Request</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="tglreq" id="tglreq" type="date" class="form-control"
                                        data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                </div>
                            </div>

                            <div class="form-group" method="post">
                                <label for="ID" style="color:black">Alamat ID</label>
                                <input value="<?php echo $alamat['ID']; ?>" type="text" name="ID" class="form-control"
                                    id="ID" readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group" method="post">
                                <label for="serviceid" style="color:black">Service ID</label>
                                <input type="text" name="serviceid" class="form-control" id="serviceid"
                                    readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group">
                                <label for="service" style="color:black">Service Name</label>
                                <select name="service" id="service" class="form-control"
                                    onchange="cari_serviceid(this.value);">
                                    <?php
                                            $data = $this->model_datacustomer->dataservice();
                                            foreach($data->result() as $dt){
                                        ?>
                                    <option value="<?php echo $dt->service;?>" type="text" style="color:black">
                                        <?php echo $dt->service;?></option>
                                    <?php
                                                } 
                                        ?>
                                </select>
                            </div>

                            <div class="form-group" method="post">
                                <label for="Kategori" style="color:black">Kategori</label>
                                <input type="text" name="Kategori" class="form-control" id="Kategori"
                                    readonly="readonly" style="color:black">
                            </div>

                            <div class="form-group">
                                <label for="iix" style="color:black">IIX</label>
                                <input type="number" name="iix" class="form-control" id="iix" placeholder="Enter IIX">
                            </div>


                            <div class="form-group">
                                <label for="ix" style="color:black">IX</label>
                                <input type="number" name="ix" class="form-control" id="ix" placeholder="Enter IX">
                            </div>

                            <div class="form-group">
                                <label for="mrcjual" style="color:black">MRC Jual</label>
                                <input type="number" name="mrcjual" class="form-control" id="mrcjual"
                                    placeholder="Enter MRC Jual">
                            </div>

                            <div class="form-group">
                                <label for="otcjual" style="color:black">OTC Jual</label>
                                <input type="number" name="otcjual" class="form-control" id="otcjual"
                                    placeholder="Enter OTC Jual">
                            </div>

                            <div class=" modal-footer">
                                <button type="button" class="btn btn-outline pull-left"
                                    data-dismiss="modal">Close</button>
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