<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index($id){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'APLIKASI PARKIR BERBASIS WEB',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Pengguna Parkir',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'PLAT NUMBER',1,0,'C');
        $pdf->Cell(45,6,'NAMA',1,0,'C');
        $pdf->Cell(37,6,'TANGGAL',1,0,'C');
        $pdf->Cell(35,6,'WAKTU',1,0,'C');
        $pdf->Cell(30,6,'HARGA',1,1,'C');
        $pdf->SetFont('Arial','',10,'C');
        $mahasiswa = $this->db->query("SELECT * FROM tbl_parkir where id_parkir='$id'")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(40,6,$row->plat,1,0,'C');
            $pdf->Cell(45,6,$row->nama,1,0,'C');
            $pdf->Cell(37,6,$row->tanggal,1,0,'C');
            $pdf->Cell(35,6,$row->waktu,1,0,'C'); 
            $pdf->Cell(30,6,$row->harga,1,1,'C');
        }
        $pdf->Output();
    }
}