<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->model(array("UserModel", "NoteModel"));
        $this->load->library(array('form_validation', 'session'));
    }

    public function index()
    {
        redirect("users/home");
    }

    public function home()
    {
        if (isset($_SESSION['user_id'])) {
            $this->load->view("users/home");
        } else {
            redirect("users/login");
        }
    }

    public function login()
    {
        $vinput["message"] = "";
        $vinput["email"] = "";
        $vinput["password"] = "";

        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->input->server("REQUEST_METHOD") == "POST") {

            $vinput["email"] =  $this->input->post("email");
            $vinput["password"] =  $this->input->post("password");

            $email =  $this->input->post("email");
            $password = $this->input->post("password");

            if ($this->form_validation->run()) {
                $user = $this->UserModel->login($email);
                if (password_verify($password, $user->pass)) {
                    $datauser = array(
                        'name'  => $user->name,
                        'lastname'  => $user->lastname,
                        'email'  => $user->email,
                        'user_id' => $user->id,
                    );

                    $this->session->set_userdata($datauser);
                    redirect("users/home");
                } else {
                    $vinput["message"] = "Email o contraseña incorrectos";
                }
            }
        }

        $this->load->view("users/login", $vinput);
    }

    public function signup()
    {
        $vinput["success"] = "";
        $vinput["message"] = "";
        $vinput["name"] = "";
        $vinput["lastname"] = "";
        $vinput["email"] = "";
        $vinput["password"] = "";

        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data["name"] =  $this->input->post("name");
            $data["lastname"] =  $this->input->post("lastname");
            $data["email"] =  $this->input->post("email");
            $encrypted_password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
            $data["pass"] =  $encrypted_password;

            $vinput["name"] = $this->input->post("name");
            $vinput["lastname"] = $this->input->post("lastname");
            $vinput["email"] = $this->input->post("email");
            $vinput["password"] = $this->input->post("password");

            if ($this->form_validation->run()) {
                $checkIfExists = $this->UserModel->login($this->input->post("email"));
                if ($checkIfExists) {
                    $vinput["message"] = "Ya existe un usuario registrado con la misma cuenta Email";
                } else {
                    $user = $this->UserModel->createUser($data);
                    if ($user) {
                        $vinput["success"] = "Usuario creado correctamente";
?>
                        <script>
                            setTimeout(() => {
                                <?php header("refresh: 2 ; url=" . base_url() . "users/login"); ?>
                            }, 2000);
                        </script>
                    <?php
                    } else {
                        $vinput["message"] = "Ha ocurrido un error al registrar";
                    ?>
                        <script>
                            setTimeout(() => {
                                <?php header("refresh: 2 ; url=" . base_url() . "users/login"); ?>
                            }, 2000);
                        </script>
<?php
                    }
                }
            }
        }

        $this->load->view("users/signup.php", $vinput);
    }

    public function logOut()
    {
        $this->session->sess_destroy();
        redirect("users/login");
    }
}
