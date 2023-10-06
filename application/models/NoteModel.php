<?php
class NoteModel extends CI_Model
{
    private $table = "notes";
    private $table_id = "id";
    public function __construct()
    {
        $this->load->database();
    }

    public function findAllNotes()
    {
        $this->db->select();
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    public function findNote($id)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);
        return $this->db->get()->row();
    }

    public function createNote($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function updateNote($id, $data)
    {
        $this->db->where($this->table_id, $id);
        $execute = $this->db->update($this->table, $data);
        return ($execute) ? true : false;
    }

    public function deleteNote($id)
    {
        $this->db->where($this->table_id, $id);
        $execute = $this->db->delete($this->table);
        return ($execute) ? true : false;
    }
}
