<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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

                $sql = $this->model_master->getWhere('customer', $array_input);
                $cek_user = $sql->row_array();
                if (!$cek_user) {
                    $this->session->set_flashdata('error', "Email dan password tidak dikenal !!!");
                    redirect('auth');
                } elseif ($cek_user['isAktif'] == 0) {
                    $this->session->set_flashdata('warning', "User Tidak Aktif");
                    redirect('auth');
                } else {
                    $data = [
                        'id_cust' => $cek_user['Id_cust'],
                        'email' => explode('@', $cek_user['email']),
                        'role' => $cek_user['role'],
                        'nama' => $cek_user['nama'],
                        'isAktif' => $cek_user['isAktif'],
                        'keperluan' => $cek_user['keperluan'],

                    ];
                    $this->session->set_userdata($data);
                    if ($cek_user['role'] == 2) {
                        redirect('userpage');
                    } else {
                        redirect('welcome');
                    }
                }
            } else {
                $this->session->set_flashdata('error', "Email dan password tidak dikenal.");
                return redirect('auth');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }

    public function registered()
    {
        try {
            if ($this->input->post('nama', true) == '' || $this->input->post('email', true) == '' || $this->input->post('password', true) == '' || $this->input->post('keperluan', true) == '' || $this->input->post('alamat', true) == '' || $this->input->post('noTelfon', true) == '' || $this->input->post('j_kelamin', true) == '') {
                $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                redirect('auth/register');
            } else {
                $data = [
                    'nama' => $this->input->post('nama', true),
                    'email' => $this->input->post('email', true),
                    'password' => sha1($this->input->post('password', true)),
                    'role' => 2,
                    'keperluan' => $this->input->post('keperluan', true),
                    'isAktif' => 1,
                    'alamat' => $this->input->post('alamat', true),
                    'no_telfon' => $this->input->post('noTelfon', true),
                    'j_kelamin' => $this->input->post('j_kelamin', true),

                ];

                $simpan = $this->model_master->simpanData('customer', $data);
                $this->session->set_flashdata('success', "Register Berhasil, Silahkan Login Untuk Masuk Aplikasi");
                redirect('auth');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('userpage');
    }
}
