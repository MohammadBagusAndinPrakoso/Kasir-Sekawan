<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $table = 'ms_user';

    public function rules(){
        return [
            [
                'field' => 'Name',
                'label' => 'Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'Role',
                'label' => 'Role',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'Username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'Password',
                'label' => 'Password',
                'rules' => 'trim'
            ]
        ];
    }

    //menampilkan data mahasiswa berdasarkan user_id
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["user_id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from user where user_id='$id'
    }   

    //menampilkan semua data user
    public function getAll(){
        $this->db->from($this->table);
        $this->db->order_by("user_id", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from user order by user_id asc
    }

    public function getData(){
        return $this->db->get('ms-user')->result_array();
    }

    public function addData($data = null)
    {
        return $this->db->insert($this->table, $data);
    }

    public function editData($where = null, $data = null)
    {
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->delete('ms_user'); 
    }

}