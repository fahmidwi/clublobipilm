<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
Class Model_clp extends CI_model{
    

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

    public function inputAnggota($data)
    {
        $this->db->insert('tb_anggota',$data);
        return $this->db->insert_id();
    }

    public function updateData($table,$data,$where)
    {
        return $this->db->update($table,$data,$where);
    }


    public function getProker($id,$judul)
    {
        $this->db->like('judul',$judul);
        return $this->db->get_where('tb_proker',array('id_proker' => $id));
    }

    public function getBeritaAtHome()
    {
        $this->db->order_by('id_berita','DESC');
        $this->db->limit(3,0);
        return $this->db->get('tb_berita')->result();
    }

    public function getBeritaAll($limit,$startpage)
    {
        return $this->db->select('tb_berita.*, tb_user.nama')
                 ->from('tb_berita')
                 ->join('tb_user','tb_berita.id_user = tb_user.id_user')
                 ->limit($limit,$startpage)
                 ->order_by('id_berita','DESC')
                 ->get();
    }

    public function getBeritaFavorite()
    {
        return $this->db->select('tb_berita.*, tb_user.nama')
                 ->from('tb_berita')
                 ->join('tb_user','tb_berita.id_user = tb_user.id_user')
                 ->limit(5,0)
                 ->order_by('tb_berita.view','DESC')
                 ->get();
    }

    public function getDetailBerita($id,$keyjudul)
    {
        return $this->db->select('tb_berita.*, tb_user.nama')
                 ->from('tb_berita')
                 ->join('tb_user','tb_berita.id_user = tb_user.id_user')
                 ->where(array('tb_berita.id_berita' => $id))
                 ->like('judul_berita',$keyjudul)
                 ->get();
    }

    public function getAllKarya($genre,$tahun)
    {
        $genre = ($genre!='semua') ? $this->db->like('tb_genre.genre',$genre):null;
        $tahun = (!empty($tahun)) ? $this->db->like('tb_karya.create_date',$tahun):null;
        return $this->db->select('tb_karya.*, tb_genre.genre, tb_user.nama')
                        ->from('tb_karya')
                        ->join('tb_genre','tb_karya.id_genre = tb_genre.id_genre')
                        ->join('tb_user','tb_karya.id_user = tb_user.id_user')
                        ->order_by('id_karya','DESC')
                        ->get();
    }

    public function getDetailKarya($keyjudul,$id)
    {
        return $this->db->select('tb_karya.*, tb_genre.genre, tb_user.nama')
                        ->from('tb_karya')
                        ->join('tb_genre','tb_karya.id_genre = tb_genre.id_genre')
                        ->join('tb_user','tb_karya.id_user = tb_user.id_user')
                        ->like('tb_karya.judul_film',$keyjudul)
                        ->where(array('tb_karya.id_karya' => $id))
                        ->get();
    }
    
}