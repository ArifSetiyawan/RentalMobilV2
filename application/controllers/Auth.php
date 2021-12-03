<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master', 'model_master');
    }
    public function index()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function login()
    {
        try {
            if ($this->input->post('email') && $this->input->post('password')) {
                $email = $this->input->post('email', true);
                $password = sha1($this->input->post('password', true));

                $array_input = [
                    'email' => $email,
                    'password' => $password
                ];

                $sql = $this->model_master->getWhere('users', $array_input);
                $cek_user = $sql->row_array();
                // echo '<pre>';
                // print_r($cek_user);
                // echo '</pre>';
                // die;
                if (!$cek_user) {
                    $this->session->set_flashdata('warning', "Maaf Username atau Password Salah !!!");
                    redirect('auth');
                } else {
                    $data = [
                        'id_users' => $cek_user['role'],
                        'email' => explode('@', $cek_user['email']),
                        'role' => $cek_user['role'],
                        'isAktif' => $cek_user['isAktif'],
                    ];

                    $this->session->set_userdata($data);
                    redirect('welcome');
                }
            } else {
                $this->session->set_flashdata('error', "Masukkan username dan password anda.");
                return redirect('auth');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }

    public function usernameCheck()
    {
        $dataSend = json_decode($this->input->post('datasend'), TRUE);
        $params = [
            "UserName"         => $dataSend['userEmail'],
            "Method"         => "validate"
        ];
        $verif_username = $this->authorization->cekUsername($params);
        echo json_encode($verif_username);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
