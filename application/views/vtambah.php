<?php
if ($aksi == 'aksi_add') {
    $id_parkir = "";
    $nama = "";
    $plat = "";
    $tanggal = date("Y-m-d");
    $waktu = date("h:i:s");
    $harga = "2000";
} else {
    foreach ($qdata as $rowdata) {
        $id_parkir         = $rowdata->id_parkir;
        $nama       = $rowdata->nama;
        $plat  = $rowdata->plat;
        $tanggal         = $rowdata->tanggal;
        $waktu    = $rowdata->waktu;
        $harga     = $rowdata->harga;
    }
}
?> 
<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content=""> <meta name="author" content="FaberNainggolan"> 
        <title>Halaman Pendataan</title> 
        <link href="<?php echo base_url()?>Asset/Css/bootstrap.css" rel="stylesheet"> 
        <link href="<?= base_url() ?>Asset/bg.css" rel="stylesheet">
    </head> 

    <body>
        
        
        <br>

<div class="container"> 
    <center><h1>Daftar Parkir Masuk</h1></center> <br>
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <b>Form Data</b>
        </div> 
        <div class="panel-body"> 
            <?php echo $this->session->flashdata('pesan'); ?> 
            <form action="<?php echo base_url() ?>c_pendataan/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped">
                    <tr> 
                      
                        <td class="hidden">
                            <div class="col-sm-5"> 
                                <input type="hidden" name="id_parkir" class="form-control" value="<?php echo $id_parkir; ?>"> 
                            </div>
                        </td>
                        <td>Nama Kendaraan</td> 
                        <td> 
                            <div class="col-sm-5"> 
                                <input type="text" placeholder="Isi Nama Kendaraan" name="nama" class="form-control" value="<?php echo $nama; ?>" required> 
                            </div>
                        </td>
                    </tr>
                    <tr> 
                        <td>Plat</td> 
                        <td> 
                            <div class="col-sm-5"> 
                                <input type="text" placeholder="Isi Plat Number" name="plat" class="form-control" value="<?php echo $plat; ?>" required> 
                            </div>
                        </td>
                    </tr>
                    <tr> 
                        <td>Tanggal</td> 
                        <td> 
                            <div class="col-sm-5"> 
                                <input type="date" name="tanggal" class="form-control" readonly="readonly" value="<?php echo $tanggal; ?>"> 
                            </div>
                        </td>
                    </tr> 
                    <tr> 
                        <td>Waktu</td> 
                        <td> 
                            <div class="col-sm-5"> 
                                <input type="time" name="waktu" class="form-control" readonly="readonly" value="<?php echo $waktu; ?>">
                            </div> 
                        </td>
                    </tr>
                    <tr> 
                        <td>Harga</td> 
                        <td> 
                            <div class="col-sm-5"> 
                            	<input type="text" name="harga" class="form-control" readonly="readonly" value="<?php echo $harga; ?>">     
                            </div>
                        </td>
                    </tr> 
                    <tr> 
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Simpan"> 
							<a href="<?= base_url('c_pendataan'); ?>" class="btn btn-primary btn-md">Kembali</a>
                        </td> 
                    </tr>
                </table> 
            </form> 
        </div> 
    </div> 
</div> 