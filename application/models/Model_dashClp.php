<?php
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
}
?>