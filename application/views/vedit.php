<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $nama = "";
    $tgl_lahir = "";
    $jk = "";
    $telepon = "";
    $alamat = "";
    $tgl_mulai = "";
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $nama = $rowdata->nama;
        $tgl_lahir = $rowdata->tgl_lahir;
        $jk = $rowdata->jk;
        $telepon = $rowdata->telepon;
        $alamat = $rowdata->alamat;
        $tgl_mulai = $rowdata->tgl_mulai;
    }
}
?> 
<div class="container"> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <b>Form Member</b>
        </div> 
        <div class="panel-body"> 
            <?php echo $this->session->flashdata('pesan'); ?> 
            <form action="<?php echo base_url() ?>c_pendataan/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped">
                    <tr> 
                        <td>nama</td> 
                        <td> 
                            <div class="col-sm-4"> 
                                <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>"> 
                            </div>
                        </td>
                    </tr>
                    <tr> 
                        <td>Tanggal Lahir</td> 
                        <td> 
                            <div class="col-sm-6"> 
                                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $tgl_lahir; ?>"> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td> 
                        <td> 
                            <div class="col-sm-3"> 
                                <select name="jk" required="requreid" class="form-control"> 
                                    <option>Laki-laki</option> 
                                    <option>Perempuan</option> 
                                </select>
                            </div> 
                        </td> 
                    </tr> 
                    <tr> 
                        <td>telepon</td> 
                        <td> 
                            <div class="col-sm-6"> 
                                <input type="address" name="alamat" class="form-control" value="<?php echo $alamat ?>">
                            </div> 
                        </td>
                    </tr>
                    <tr> 
                        <td>Alamat</td> 
                        <td> 
                            <div class="col-sm-4"> 
                            	<textarea name="telepon" class="form-control"><?php echo $telepon ?></textarea>     
                            </div>
                        </td>
                    </tr> <tr> 
                        <td>Tanggal Mulai</td> 
                        <td> 
                            <div class="col-sm-4"> 
                            	<input type="date" name="tgl_mulai" class="form-control"><?php echo $tgl_mulai ?></textarea>     
                            </div>
                        </td>
                    </tr> 
                    <tr> 
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Simpan"> 
                            <button type="reset" class="btn btn-default">Batal</button> 
                        </td> 
                    </tr>
                </table> 
            </form> 
        </div> 
    </div>
</div>