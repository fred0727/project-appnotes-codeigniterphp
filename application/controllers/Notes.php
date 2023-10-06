<?php

class Notes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("NoteModel");
        $this->load->library('session');
    }


    public function mynotes()
    {
        $data["notes"] = $this->NoteModel->findAllNotes();
        $this->load->view("notes/mynotes", $data);
    }

    public function createnote()
    {
        $data["id_user"] = $_SESSION['user_id'];
        $data["content"] = $_POST["content"];
        $data["creation_date"] = $_POST["creationdate"];
        $create = $this->NoteModel->createNote($data);
        if ($create) echo 1;
        else echo 2;
    }

    public function viewupdatenote($id)
    {
        $data['note'] = $this->NoteModel->findNote($id);
        $this->load->view("notes/viewupdate", $data);
    }

    public function updatenote()
    {
        $id = $_POST['idnote'];
        $data["content"] = $_POST['content'];
        $data["creation_date"] = $_POST['creation-date'];
        $response = $this->NoteModel->updateNote($id, $data);
        if ($response) echo json_encode(1);
        else echo json_encode(2);
    }

    public function deletenote($id)
    {
        $response = $this->NoteModel->deleteNote($id);
        if ($response) echo 1;
        else 2;
    }
}
