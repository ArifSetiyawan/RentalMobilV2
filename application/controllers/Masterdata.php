<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('utils'));
        $this->load->model('Master', 'model_master');
        // $this->load->model('Auth', 'authorization');
    }

    public function users()
    {
        // $this->validate_user();
        $data = array(
            'title' => "Data Users",
            'active_menu' => 'data_users',
            'data_user' => $this->model_master->getAll('users')->result_array()
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/users', $data);
    }

    public function add_users()
    {
        // $this->validate_user();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Users',
            'sub_menu' => 'Input data users'
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/add_users', $data);
    }

    public function edit_users($id)
    {
        // $this->validate_user();
        $hasil = $this->model_master->getWhere('users', ['id_user' => $id])->row_array();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Users',
            'sub_menu' => 'Input data users',
            'data_users' => $hasil,
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/edit_users', $data);
    }
    public function hapusUser()
    {
        $where = ['sha1(id_user)' => $this->uri->segment(3)];
        $this->model_master->hapusData('users', $where);
        $this->session->set_flashdata('success', "Data Users Berhasil Dihapus");
        redirect('masterdata/users');
    }
}
