<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_pendataan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->auth->cek_auth();
        $this->load->model('m_pendataan');
        $this->load->helper('form','url');
    }

    public function index() {
        $data['title'] = 'Data Member';
        $data['username']= $this->session->userdata('username');
        $data['qmember'] = $this->m_pendataan->get_allmember();
        $this->load->view('pendataan', $data);
    }
        public function member() {
        $this->load->view('pendataan', $data);
    }
    public function tampil() {        
        $data['title'] = 'Data Member';
        $data['qmember'] = $this->m_pendataan->get_allmember();
        $this->load->view('pendataan', $data);
    }

    public function form() {
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        $id_parkir = addslashes($this->input->post('id_parkir'));
        $nama = addslashes($this->input->post('nama'));
        $plat = addslashes($this->input->post('plat'));
        $tanggal = addslashes($this->input->post('tanggal'));
        $waktu = addslashes($this->input->post('waktu'));
        $harga = addslashes($this->input->post('harga'));
        
        //sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Member';
            $data['aksi'] = 'aksi_add';
            $this->load->view('vtambah', $data);
        } 
        elseif ($mau_ke == "edit") {
            $data['qdata'] = $this->m_pendataan->get_member_byid($idu);
            $data['title'] = 'Edit Member';
            $data['aksi']  = 'aksi_edit';
            $this->load->view('vtambah', $data);
        } 
        elseif ($mau_ke == "aksi_add") {
            //aksi_add sebagai fungsi untuk insert data
            $data = array(
               'id_parkir'        => $id_parkir,
                'nama'      => $nama,
                'plat' => $plat,
                'tanggal'        => $tanggal,
                'waktu'   => $waktu,
                'harga'    => $harga
            );

            $this->m_pendataan->get_insert($data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
            redirect('c_pendataan');
        } elseif ($mau_ke == "aksi_edit") {
            //aksi_edit sebagai fungsi untuk update data
            $data = array(
               'id'        => $id,
                'nama'      => $nama,
                'tgl_lahir' => $tgl_lahir,
                'jk'        => $jk,
                'telepon'   => $telepon,
                'alamat'    => $alamat,
                'tgl_mulai' => $tgl_mulai
            );

            $this->m_pendataan->get_update($id, $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Update</div>");
            redirect('c_pendataan');
        }
    }

    // fungsi hapus data
    public function hapus($gid) {
        $this->m_pendataan->del_member($gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('parkir');
    }

    function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['qmember']    =   $this->m_pendataan->search($keyword);
        $this->load->view('parkir_out',$data);
    }

}
