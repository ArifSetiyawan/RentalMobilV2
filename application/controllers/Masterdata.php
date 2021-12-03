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
    public function users()
    {
        $this->validate_user();
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
        $this->validate_user();

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
        $this->validate_user();
        $hasil = $this->model_master->getWhere('users', ['sha1(id_user)' => $id])->row_array();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Users',
            'sub_menu' => 'Input data users',
            'data_users' => $hasil,
        );

        // print_r($data);
        // die;

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/edit_users', $data);
    }

    public function edit_mobil($id)
    {
        $this->validate_user();
        $hasil = $this->model_master->getWhere('m_mobil', ['sha1(id_mobil)' => $id])->row_array();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Users',
            'sub_menu' => 'Input data mobil',
            'data_mobil' => $hasil,
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/edit_mobil', $data);
    }

    public function edit_pelanggan($id)
    {
        $this->validate_user();
        $hasil = $this->model_master->getWhere('m_pelanggan', ['sha1(id_pelanggan)' => $id])->row_array();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Pelanggan',
            'sub_menu' => 'Input data pelanggan',
            'data_pelanggan' => $hasil,
        );

        // print_r($data);
        // die;

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/edit_pelanggan', $data);
    }

    public function hapusUser()
    {
        $where = ['sha1(id_user)' => $this->uri->segment(3)];
        $this->model_master->hapusData('users', $where);
        $this->session->set_flashdata('success', "Data Users Berhasil Dihapus");
        redirect('masterdata/users');
    }

    public function hapusMobil()
    {
        $where = ['sha1(id_mobil)' => $this->uri->segment(3)];
        $hasil = $this->model_master->getWhere('m_mobil', ['sha1(id_mobil)' => $this->uri->segment(3)])->row_array();
        $imageUrl = FCPATH . '/upload/mobil/' . $hasil['img_mobil'];

        if (file_exists($imageUrl)) {

            unlink($imageUrl);
        }

        $this->model_master->hapusData('m_mobil', $where);
        $this->session->set_flashdata('success', "Data Mobil Berhasil Dihapus");
        redirect('masterdata/datamobil');
    }
    public function updateMobil()
    {
        $this->validate_user();
        $id = $this->input->post('id_mobil', true);
        $where = ['id_mobil' => $id];

        $hasil = $this->model_master->getWhere('m_mobil', ['id_mobil' => $id])->row_array();

        $imageUrl = FCPATH . '/upload/mobil/' . $hasil['img_mobil'];

        if (file_exists($imageUrl)) {
            unlink($imageUrl);
        }

        $file_name = str_replace('.', '', $_SESSION['email'][0] . rand());
        $config['upload_path']          = FCPATH . '/upload/mobil/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('carfile')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $uploaded_data = $this->upload->data();

            $data = [
                'nama_mobil' => $this->input->post('nama_mobil', true),
                'merek' => $this->input->post('merek', true),
                'nopol' => $this->input->post('nopol', true),
                'tahun_buat' => $this->input->post('tahun_buat', true),
                'kapasitas' => $this->input->post('kapasitas', true),
                'img_mobil' => $uploaded_data['file_name'],
            ];

            $simpan = $this->model_master->updateData('m_mobil', $data, $where);

            $this->session->set_flashdata('success', "Data Mobil Berhasil Diubah");
            redirect('masterdata/datamobil');
        }
    }

    public function hapusPelanggan()
    {
        $where = ['sha1(id_pelanggan)' => $this->uri->segment(3)];
        $this->model_master->hapusData('m_pelanggan', $where);
        $this->session->set_flashdata('success', "Data Pelanggan Berhasil Dihapus");
        redirect('masterdata/pelanggan');
    }

    public function pelanggan()
    {
        $this->validate_user();
        $data = array(
            'title' => "Data Pelanggan",
            'active_menu' => 'data_pelanggan',
            'data_pelanggan' => $this->model_master->getAll('m_pelanggan')->result_array()
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/pelanggan', $data);
    }

    public function simpan_data_user()
    {
        $this->validate_user();
        $data = [
            'email' => $this->input->post('email', true),
            'password' => sha1($this->input->post('password', true)),
            'role' => 2,
            'isAktif' => 1
        ];

        $simpan = $this->model_master->simpanData('users', $data);
        $this->session->set_flashdata('success', "Data Users Berhasil Disimpan");
        redirect('masterdata/users');
    }

    public function update_data_user()
    {
        $this->validate_user();
        $id = $this->input->post('idUsers', true);
        $where = ['id_user' => $id];

        $data = [
            'email' => $this->input->post('email', true),
            'role' => $this->input->post('roleUser', true),
            'isAktif' => $this->input->post('statusUser', true),
        ];

        $simpan = $this->model_master->updateData('users', $data, $where);
        $this->session->set_flashdata('success', "Data Users Berhasil Diubah");
        redirect('masterdata/users');
    }

    public function update_data_pelanggan()
    {
        $this->validate_user();
        $id = $this->input->post('idPel', true);
        $where = ['id_pelanggan' => $id];

        $data = [
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telfon' => $this->input->post('no_telfon', true),
            'no_ktp' => $this->input->post('no_ktp', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
        ];

        $simpan = $this->model_master->updateData('m_pelanggan', $data, $where);
        $this->session->set_flashdata('success', "Data Pelanggan Berhasil Diubah");
        redirect('masterdata/pelanggan');
    }

    public function add_pelanggan()
    {
        $this->validate_user();

        $data = array(
            'title' => "Master Data Pelanggan",
            'active_menu' => 'add_pelanggan',
            'sub_menu' => 'Input data pelanggan'
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/add_pelanggan', $data);
    }

    public function simpan_data_pelanggan()
    {
        $this->validate_user();
        $data = [
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telfon' => $this->input->post('no_telfon', true),
            'no_ktp' => $this->input->post('no_ktp', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
        ];

        $simpan = $this->model_master->simpanData('m_pelanggan', $data);
        $this->session->set_flashdata('success', "Data Users Berhasil Disimpan");
        redirect('masterdata/pelanggan');
    }

    public function datamobil()
    {
        $this->validate_user();
        $data = array(
            'title' => "Data Mobil",
            'active_menu' => 'data_mobil',
            'data_mobil' => $this->model_master->getAll('m_mobil')->result_array()
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/datamobil', $data);
    }

    public function add_mobil()
    {
        $this->validate_user();

        $data = array(
            'title' => "Data Mobil",
            'active_menu' => 'data_mobil',
            'sub_menu' => 'Input data Mobil'
        );

        $this->load->library('template');
        $this->template->loadx('master', 'masterdata/add_mobil', $data);
    }

    public function simpan_data_mobil()
    {
        // the user id contain dot, so we must remove it
        $file_name = str_replace('.', '', $_SESSION['email'][0] . rand());
        $config['upload_path']          = FCPATH . '/upload/mobil/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('carfile')) {
            $this->session->set_flashdata('error', 'Data Gagal Upload');
        } else {
            $uploaded_data = $this->upload->data();

            $data_save = [
                'nama_mobil' => $this->input->post('nama_mobil', true),
                'merek' => $this->input->post('merek', true),
                'nopol' => $this->input->post('nopol', true),
                'tahun_buat' => $this->input->post('tahun_buat', true),
                'kapasitas' => $this->input->post('kapasitas', true),
                'img_mobil' => $uploaded_data['file_name'],
            ];
            $this->model_master->simpanData('m_mobil', $data_save);
            $this->session->set_flashdata('success', 'Data Mobil berhasil disimpan');
            redirect('masterdata/datamobil');
        }
    }
}
