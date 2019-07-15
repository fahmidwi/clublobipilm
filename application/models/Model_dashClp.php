<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
Class Model_dashClp extends CI_model{
    

    public function getData($table,$id)
    {
        $this->db->order_by($id,'DESC');
        return $this->db->get($table);
    }

    public function getWhere($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

    public function inputdata($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function updateData($table,$data,$where)
    {
        return $this->db->update($table,$data,$where);
    }

    public function delete($table,$where)
    {
        return $this->db->delete($table,$where);
    }

    public function calonPeserta()
    {
        return $this->db->select('reg.*,gen.genre')
                        ->from('tb_registrasi AS reg')
                        ->join('tb_genre AS gen','reg.id_genre = gen.id_genre')
                        ->order_by('reg.flg_konfirmasi','ASC')
                        ->get();
    }

    public function DataAdmin()
    {
        return $this->db->select('*')
                        ->from('tb_user')
                        ->join('tb_anggota','tb_user.id_anggota = tb_anggota.id_anggota')
                        ->where(array('tb_user.flg_delete' => 0))
                        ->order_by('tb_user.level_akses','ASC')
                        ->get();
    }

    public function DataKeanggotaan()
    {
        return $this->db->select('*')
                        ->from('tb_anggota')
                        ->join('tb_user','tb_anggota.id_anggota = tb_user.id_anggota')
                        ->where(array('tb_user.flg_delete' => 0))
                        ->order_by('tb_anggota.nama','ASC')
                        ->get();
    }

    public function getDetailAnggota($code_clp)
    {
        return $this->db->select('*')
                        ->from('tb_anggota')
                        ->join('tb_user','tb_anggota.id_anggota = tb_user.id_anggota')
                        ->where(array('tb_anggota.code_anggota' => $code_clp))
                        ->order_by('tb_anggota.nama','ASC')
                        ->get();
    }

    public function getGallery()
    {
        return $this->db->select('*')
                        ->from('tb_gallery')
                        ->join('tb_proker','tb_gallery.id_proker = tb_proker.id_proker')
                        ->order_by('tb_gallery.id_gallery','DESC')
                        ->get();
    }

}
?>