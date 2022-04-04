<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('utils'));
        $this->load->model('Master', 'model_master');
        $this->load->model('Trxpinjam', 'model_trx');
        // $this->load->model('Auth', 'authorization');
    }

    function validate_user()
    {
        $user_access = $this->session->userdata();

        if ($user_access != null) {
            if ($user_access['email'] == null) {
                $this->session->set_flashdata('warning', 'Maaf Anda Harus Login kembali');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('warning', 'Maaf Anda Harus Login kembali');
            redirect('auth');
        }

        return $user_access;
    }
    public function index()
    {
        $this->validate_user();
        $data = array(
            'title' => "Transaksi",
            'active_menu' => 'trx_pinjam',
            'data_pinjam' => $this->model_trx->getJoinTrx()->result_array()
        );

        $this->load->library('template');
        $this->template->loadx('master', 'transaksi/trx_peminjaman', $data);
    }

    public function add_trx()
    {
        $this->validate_user();
        $data = array(
            'title' => "Transaksi",
            'active_menu' => 'trx_pinjam',
            'data_mobil' => $this->model_master->getAll('m_mobil')->result_array()
            // 'data_pinjam' => $this->model_trx->getJoinTrx()->result_array()
        );

        $this->load->library('template');
        $this->template->loadx('master', 'transaksi/add_trx', $data);
    }

    public function add_trx_form()
    {
        $this->validate_user();
        $data = array(
            'title' => "Transaksi",
            'active_menu' => 'trx_pinjam',
            'data_mobil' => $this->model_master->getAll('m_mobil')->result_array()
            // 'data_pinjam' => $this->model_trx->getJoinTrx()->result_array()
        );

        $this->load->library('template');
        $this->template->loadx('master', 'transaksi/add_trx_form', $data);
    }
}
