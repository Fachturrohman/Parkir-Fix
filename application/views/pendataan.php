<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="utf-8">
            <title>Halaman Pendataan</title> 
        <link href="<?php echo base_url()?>Asset/Css/bootstrap.css" rel="stylesheet"> 
        <link href="<?= base_url() ?>Asset/bg.css" rel="stylesheet">
    </head> 
    <body>
        <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Aplikasi Parkir</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="<?php echo base_url() ?>c_pendataan">Parkir Masuk</a></li>
            <li ><a href="<?php echo base_url() ?>parkir">Parkir Keluar</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=base_url()?>login/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
      </div>
    </nav>

<div class="container" > 
    <br><br>
    <center><h1>Data Parkir</h1></center> <br>
    <div class="panel panel-info" >
        <div class="panel-heading">
            <b>Parkir Masuk</b>
        </div> 
        <div class="panel-body"> 
            <p><?php echo $this->session->flashdata('pesan') ?> </p> 
            <a href="<?php echo base_url() ?>c_pendataan/form/add" class="btn btn-sm btn-primary">
                <i class="glyphicon glyphicon-plus"></i> Tambah Data</a>

            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No.</th> 
                        <th>Nama</th>
                        <th>Plat Number</th>
                        <th>Tanggal</th> 
                        <th>Waktu</th> 
                        <th>Harga</th>  
                        <th>Action</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if (empty($qmember)) { ?>
                        <tr> 
                            <td colspan="9">Data tidak ditemukan</td> 
                        </tr> 
                    <?php
                    } else {
                        $no = 0;
                        foreach ($qmember as $rowmember) {
                            $no++;
                            ?> 
                            <tr> 
                                <td><?php echo $no ?></td>
                                <td><?php echo $rowmember->nama ?></td> 
                                <td><?php echo $rowmember->plat ?></td>
                                <td><?php echo $rowmember->tanggal ?></td>
                                <td><?php echo $rowmember->waktu ?></td>
                                <td><?php echo "Rp " . number_format($rowmember->harga, "2", ",", "."); ?></td>
                                <td>
                                     <a href="<?php echo base_url() ?>laporanpdf/index/<?php echo $rowmember->id_parkir ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i></a>
                                </td> 
                            </tr> 
                            <?php
                        }
                    }
                    ?> 
                </tbody> 
            </table> 
        </div> 
    </div>
</div>

</body>
</html>