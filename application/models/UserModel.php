<?php

class UserModel extends CI_Model
{
    public $table = "users";
    public $table_id = "id";

    public function __construct()
    {
        $this->load->database();
    }

    public function login($email)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where("email = '$email'");
        return $this->db->get()->row();
    }

    public function createUser($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function findUser($id)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);
        return $this->db->get()->row();
    }
}
