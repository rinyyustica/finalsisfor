<?php

class model_customer extends CI_Model
{

    function tampil_data() {
        $query= $this->db->get('customer');
        return $query;
    }

    function input_data($data) {
        $this->db->insert('customer', $data);
    }

    function hapus_data($id_customer) {
        $this->db->where('id_customer', $id_customer);
        $query = $this->db->delete('customer');
    }

    function edit_data($id_customer) {
        $query = $this->db->get_where('customer', array('id_customer'=>$id_customer));
        return $query;
    }

    function update_data($id_customer, $data) {
        $this->db->update('customer',$data, array('id_customer' => $id_customer));
    }

}