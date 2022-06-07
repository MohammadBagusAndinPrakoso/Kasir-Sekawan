<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model"); // load model user
    }

    public function index()
    {
        // load views/template/header.php
        $this->load->view('template/header');
        
        // load views/template/navbar.php
        $this->load->view('template/navbar');

        // load view index.php
        $this->load->view('users/table');
        
        // load views/template/footer.php
        $this->load->view('template/footer');

    }

    public function show($message = ""){
        $data["data_user"] = $this->User_model->getAll();
        $data["message"] = $message;
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('users/table', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $opration = false;
        $message = "";

        $hash = $this->input->post('Password');
        $password = password_hash($hash, PASSWORD_DEFAULT);
        
        $data = array(
            "user_name" => $this->input->post('Name'),
            "user_role" => $this->input->post('Role'),
            "user_username" => $this->input->post('Username'),
            "user_password" => $password
        );

        // upload foto
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '/jpg|png|gif/';
        $config['max_size'] = '5120';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        
        // jika salah
        if (!$this->upload->do_upload('Foto')) {
            $error = $this->upload->display_errors();
            $message = strip_tags(($error));
        } else {
            $file = $this->upload->data();
            $data['user_foto'] = $file['file_name'];
        }

        $validation = $this->form_validation;
        $validation->set_rules($this->User_model->rules());
        if ($validation->run() && $message == "") {
            $opration = $this->User_model->addData($data);
            if($opration == true){
                $message = "Data berhasil diinput";
            }else{
                $message = "Data gagal diinput";
            }
        }

        $opr = [
            'success' => $opration,
            'message' => $message,
        ];

        echo json_encode($opr);
       
    }
    public function update(){
        $data = $this->input->post();
        print_r($data);exit;
    }

    public function actionEdit(){
        $opration = false;
        $message = "";
        $password = "";
        
        $id = $this->input->post('user_id');
        $passwordLama = $this->input->post('user_password');

        $old = $this->input->post('fotolama');
        
        // $data_1_user = $this->User_model->getById($id);

        // if (condition) {
        //     # code...
        // }
        
        $data = array(
            "user_name" => $this->input->post('Name'),
            "user_role" => $this->input->post('Role'),
            "user_username" => $this->input->post('Username')
        );

        if($this->input->post('Password')){
            $hash = $this->input->post('Password');
            $password = password_hash($hash, PASSWORD_DEFAULT);
            $data['user_password'] = $password;
        }
        
        if ($_FILES['Foto']['name']) {
            $path = '../uploads/'.$old;
            if (file_exists($path)){
                # hapus file lama
                unlink($path);
            }
        }

        // upload foto
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '/jpg|png|gif/';
        $config['max_size'] = '5120';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Foto')) {
            $error = $this->upload->display_errors();
            $message = strip_tags(($error));
        } else {
            $file = $this->upload->data();
            $data['user_foto'] = $file['file_name'];
        }

        $validation = $this->form_validation;
        $validation->set_rules($this->User_model->rules());
        if ($validation->run()) {
            $opration = $this->User_model->editData(array('user_id' => $id), $data);
            if($opration == true){
                $message = "Data berhasil diinput";
            }else{
                $message = "Data gagal diinput";
            }
        }

        if ($opration) {
            $this->show($message);
        } else {
            $this->edit($id,$message);
        }

    }

    public function delete($id){
        $user = $this->User_model->getById($id);
        $path = '../uploads/'.$user->user_foto;
        if (file_exists($path)){
         # hapus file lama
         unlink($path);
        }

        $this->User_model->delete($id);
        redirect('index.php/user');
    }


    public function loadData(){
        $user = $this->User_model->getAll();

        echo json_encode($user);
    }
}
?>