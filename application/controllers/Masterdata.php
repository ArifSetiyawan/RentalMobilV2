<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Master', 'model_master');
    }

    function validate_user()
    {
        $user_access = $this->session->userdata();

        if ($user_access != null) {
            if ($user_access['role'] == null) {
                $this->session->set_flashdata('warning', 'Maaf Anda Harus Login kembali');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('warning', 'Maaf Anda Harus Login kembali');
            redirect('auth');
        }

        return $user_access;
    }

    //Masterdata User
    public function customer()
    {
        $this->validate_user();
        $data = array(
            'prev_menu' => 'Home',
            'active_menu' => 'Data Customer',
            'data_customer' => $this->model_master->getJoinRole()->result_array()
        );

        $this->template->loadx('master', 'masterdata/customer/customer', $data);
    }

    public function add_customer()
    {
        $this->validate_user();

        $data = array(
            'prev_menu' => 'Data Customer',
            'active_menu' => 'Input data Customer',
            'data_role' => $this->model_master->getAll('role')->result_array()
        );

        $this->template->loadx('master', 'masterdata/customer/add_customer', $data);
    }

    public function edit_customer($id)
    {
        $this->validate_user();
        $hasil = $this->model_master->getWhere('customer', ['sha1(Id_cust)' => $id])->row_array();

        $data = array(
            'prev_menu' => 'Data Customer',
            'active_menu' => 'Edit data Customer',
            'data_customer' => $hasil,
            'data_role' => $this->model_master->getAll('role')->result_array()
        );

        $this->template->loadx('master', 'masterdata/customer/edit_customer', $data);
    }

    public function hapusCustomer()
    {
        $this->validate_user();

        $where = ['sha1(Id_cust)' => $this->uri->segment(3)];
        $this->model_master->hapusData('customer', $where);
        $this->session->set_flashdata('success', "Data Customer Berhasil Dihapus");
        redirect('masterdata/customer');
    }

    public function simpan_data_customer()
    {
        $this->validate_user();
        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'password' => sha1($this->input->post('password', true)),
            'role' => $this->input->post('roleUser', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telfon' => $this->input->post('no_telfon', true),
            'j_kelamin' => $this->input->post('j_kelamin', true),
            'isAktif' => 1
        ];

        $simpan = $this->model_master->simpanData('customer', $data);
        $this->session->set_flashdata('success', "Data Customer Berhasil Disimpan");
        redirect('masterdata/customer');
    }

    public function update_data_customer()
    {
        $this->validate_user();
        $id = $this->input->post('idCust', true);
        $where = ['Id_cust' => $id];

        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'role' => $this->input->post('roleUser', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telfon' => $this->input->post('no_telfon', true),
            'j_kelamin' => $this->input->post('j_kelamin', true),
            'isAktif' => $this->input->post('statusUser', true),
        ];

        $simpan = $this->model_master->updateData('customer', $data, $where);
        $this->session->set_flashdata('success', "Data Customer Berhasil Diubah");
        redirect('masterdata/customer');
    }

    //Masterdata Mobil
    public function edit_mobil($id)
    {
        $this->validate_user();
        $hasil = $this->model_master->getWhere('mobil', ['sha1(Id_mobil)' => $id])->row_array();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Customer',
            'sub_menu' => 'Input data mobil',
            'data_mobil' => $hasil,
            'data_type' => $this->model_master->getAll('type')->result_array()

        );

        $this->template->loadx('master', 'masterdata/mobil/edit_mobil', $data);
    }

    public function hapusMobil()
    {
        $this->validate_user();

        $where = ['sha1(Id_mobil)' => $this->uri->segment(3)];
        $hasil = $this->model_master->getWhere('mobil', ['sha1(Id_mobil)' => $this->uri->segment(3)])->row_array();
        $imageUrl = FCPATH . '/upload/mobil/' . $hasil['img_mobil'];

        if (file_exists($imageUrl)) {

            unlink($imageUrl);
        }

        $this->model_master->hapusData('mobil', $where);
        $this->session->set_flashdata('success', "Data Mobil Berhasil Dihapus");
        redirect('masterdata/datamobil');
    }
    public function updateMobil()
    {
        $this->validate_user();
        try {
            if ($this->input->post('nama_mobil', true) == '' || $this->input->post('produsen', true) == '' || $this->input->post('kode_type', true) == '' || $this->input->post('nopol', true) == '' || $this->input->post('warna', true) == '' || $this->input->post('BBM', true) == '' || $this->input->post('tahun_buat', true) == '' || $this->input->post('kapasitas', true) == '' || $this->input->post('transmisi', true) == '' || $this->input->post('harga', true) == '' || $this->input->post('deskripsi', true) == '') {
                $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                redirect('masterdata/add_mobil');
            } else {
                $id = $this->input->post('Id', true);
                $gambar = $_FILES['carfile']['name'];
                $denda = (10 / 100) * $this->input->post('harga', true);
                if ($gambar) {
                    $file_name = str_replace('.', '', "Mobil_" . rand());

                    $config['upload_path']          = FCPATH . '/upload/mobil/';
                    $config['allowed_types']        = 'jpg|jpeg|png';
                    $config['file_name']            = $file_name;
                    $config['overwrite']            = true;
                    $config['max_size']             = 3072;
                    $config['max_width']            = 2000;
                    $config['max_height']           = 2000;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('carfile')) {
                        $gambarLama = $this->input->post('carLama', true);
                        if ($gambarLama != 'default.png') {
                            unlink(FCPATH . '/upload/mobil/' . $gambarLama);
                        }

                        $uploaded_data = $this->upload->data();
                        $this->db->set('img_mobil', $uploaded_data['file_name']);
                    } else {
                        $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                        redirect('masterdata/add_mobil');
                    }
                }
                $data = [
                    'nama_mobil' => $this->input->post('nama_mobil', true),
                    'produsen' => $this->input->post('produsen', true),
                    'kode_type' => $this->input->post('kode_type', true),
                    'nopol' => $this->input->post('nopol', true),
                    'warna' => $this->input->post('warna', true),
                    'BBM' => $this->input->post('BBM', true),
                    'tahun_buat' => $this->input->post('tahun_buat', true),
                    'kapasitas' => $this->input->post('kapasitas', true),
                    'transmisi' => $this->input->post('transmisi', true),
                    'harga' => $this->input->post('harga', true),
                    'denda' => $denda,

                ];

                $this->db->where('Id_mobil', $id);
                $this->db->set($data);
                $this->db->update('mobil');

                $this->session->set_flashdata('success', "Data Mobil Berhasil Diubah");
                redirect('masterdata/datamobil');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }

    public function datamobil()
    {
        $this->validate_user();
        $data = array(
            'title' => "Data Mobil",
            'active_menu' => 'data_mobil',
            'data_mobil' => $this->model_master->getJoinMobil()->result_array()
        );

        $this->template->loadx('master', 'masterdata/mobil/datamobil', $data);
    }

    public function detailMobil($id)
    {
        $this->validate_user();
        $where = ['sha1(Id_mobil)' => $id];

        $data = array(
            'prev_menu' => 'Data Mobil',
            'active_menu' => 'Detail Data Mobil',
            'data_mobil' => $this->model_master->getWhere('mobil',  $where)->row_array()
        );

        $this->template->loadx('master', 'masterdata/mobil/detail_mobil', $data);
    }

    public function add_mobil()
    {
        $this->validate_user();

        $data = array(
            'title' => "Data Mobil",
            'active_menu' => 'data_mobil',
            'sub_menu' => 'Input data Mobil',
            'data_type' => $this->model_master->getAll('type')->result_array()
        );

        $this->template->loadx('master', 'masterdata/mobil/add_mobil', $data);
    }

    public function simpan_data_mobil()
    {
        $this->validate_user();
        try {
            if ($this->input->post('nama_mobil', true) == '' || $this->input->post('produsen', true) == '' || $this->input->post('kode_type', true) == '' || $this->input->post('nopol', true) == '' || $this->input->post('warna', true) == '' || $this->input->post('BBM', true) == '' || $this->input->post('tahun_buat', true) == '' || $this->input->post('kapasitas', true) == '' || $this->input->post('transmisi', true) == '' || $this->input->post('harga', true) == '' || $this->input->post('deskripsi', true) == '') {
                $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                redirect('masterdata/add_mobil');
            } else {
                // the user id contain dot, so we must remove it
                $file_name = str_replace('.', '', "Mobil_" . rand());
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
                    redirect('masterdata/add_mobil');
                } else {
                    $uploaded_data = $this->upload->data();
                    $denda = (10 / 100) * $this->input->post('harga', true);
                }
                $data_save = [
                    'nama_mobil' => $this->input->post('nama_mobil', true),
                    'produsen' => $this->input->post('produsen', true),
                    'kode_type' => $this->input->post('kode_type', true),
                    'nopol' => $this->input->post('nopol', true),
                    'warna' => $this->input->post('warna', true),
                    'BBM' => $this->input->post('BBM', true),
                    'tahun_buat' => $this->input->post('tahun_buat', true),
                    'kapasitas' => $this->input->post('kapasitas', true),
                    'transmisi' => $this->input->post('transmisi', true),
                    'harga' => $this->input->post('harga', true),
                    'denda' => $denda,
                    'deskripsi' => $this->input->post('deskripsi', true),
                    'img_mobil' => $uploaded_data['file_name'],
                    'status' => 1


                ];

                $this->model_master->simpanData('mobil', $data_save);
                $this->session->set_flashdata('success', 'Data Mobil berhasil disimpan');
                redirect('masterdata/datamobil');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }

    //Masterdata Supir
    public function edit_supir($id)
    {
        $this->validate_user();
        $hasil = $this->model_master->getWhere('supir', ['sha1(Id_supir)' => $id])->row_array();

        $data = array(
            'prev_menu' => 'Data Supir',
            'active_menu' => 'Edit data Supir',
            'data_supir' => $hasil,
        );

        // print_r($data);
        // die;

        $this->template->loadx('master', 'masterdata/supir/edit_supir', $data);
    }
    public function hapusSupir()
    {
        $this->validate_user();

        $where = ['sha1(Id_supir)' => $this->uri->segment(3)];
        $hasil = $this->model_master->getWhere('supir', ['sha1(Id_supir)' => $this->uri->segment(3)])->row_array();
        $imageUrl = FCPATH . '/upload/supir/' . $hasil['foto'];

        if (file_exists($imageUrl)) {

            unlink($imageUrl);
        }
        $this->model_master->hapusData('supir', $where);
        $this->session->set_flashdata('success', "Data Supir Berhasil Dihapus");
        redirect('masterdata/supir');
    }

    public function supir()
    {
        $this->validate_user();
        $data = array(
            'prev_menu' => 'Home',
            'active_menu' => 'Data Supir',
            'data_supir' => $this->model_master->getAll('supir')->result_array()
        );

        $this->template->loadx('master', 'masterdata/supir/datasupir', $data);
    }

    public function updateSupir()
    {
        $this->validate_user();

        try {
            if ($this->input->post('namasupir', true) == '' || $this->input->post('tgllahir', true) == '' || $this->input->post('alamat', true) == '' || $this->input->post('no_ktp', true) == '') {
                $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                redirect('masterdata/add_supir');
            } else {
                $id = $this->input->post('Id', true);
                $where = ['Id_supir' => $id];

                $file_name = str_replace('.', '', "Supir_" . rand());

                $config['upload_path']          = FCPATH . '/upload/supir/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['file_name']            = $file_name;
                $config['overwrite']            = true;
                $config['max_size']             = 3072;
                $config['max_width']            = 2000;
                $config['max_height']           = 2000;

                $this->load->library('upload', $config);


                if (!$this->upload->do_upload('supirfile')) {
                    $this->session->set_flashdata('error', 'Data Gagal Upload');
                    redirect('masterdata/add_supir');
                } else {
                    $gambarLama = $this->input->post('supirLama');
                    if ($gambarLama != 'default.png') {
                        unlink(FCPATH . '/upload/supir/' . $gambarLama);
                    }

                    $uploaded_data = $this->upload->data();
                    $this->db->set('foto', $uploaded_data);
                }
                $data = [
                    'namasupir' => $this->input->post('namasupir', true),
                    'tgllahir' => $this->input->post('tgllahir', true),
                    'alamat' => $this->input->post('alamat', true),
                    'noktp' => $this->input->post('noktp', true),
                    'foto' => $uploaded_data['file_name'],
                    'tarif' => 500000,
                ];

                $this->db->where('Id_supir', $id);
                $this->db->set($data);
                $this->db->update('supir');
                $this->session->set_flashdata('success', "Data Supir Berhasil Diubah");
                redirect('masterdata/supir');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }

    public function add_supir()
    {
        $this->validate_user();

        $data = array(
            'prev_menu' => 'Data Supir',
            'active_menu' => 'Add data Supir',
        );

        $this->template->loadx('master', 'masterdata/supir/add_supir', $data);
    }

    public function simpan_data_supir()
    {
        $this->validate_user();

        try {
            if ($this->input->post('namasupir', true) == '' || $this->input->post('tgllahir', true) == '' || $this->input->post('alamat', true) == '' || $this->input->post('no_ktp', true) == '') {
                $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                redirect('masterdata/add_supir');
            } else {
                // the user id contain dot, so we must remove it
                $file_name = str_replace('.', '', "Supir_" . rand());
                $config['upload_path']          = FCPATH . '/upload/supir/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = $file_name;
                $config['overwrite']            = true;
                $config['max_size']             = 3072;
                $config['max_width']            = 2000;
                $config['max_height']           = 2000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('supirfile')) {
                    $this->session->set_flashdata('error', 'Data Gagal Upload');
                    redirect('masterdata/add_supir');
                } else {
                    $uploaded_data = $this->upload->data();
                }
                $data = [
                    'namasupir' => $this->input->post('namasupir', true),
                    'tgllahir' => $this->input->post('tgllahir', true),
                    'alamat' => $this->input->post('alamat', true),
                    'noktp' => $this->input->post('no_ktp', true),
                    'foto' => $uploaded_data['file_name'],
                    'tarif' => 500000,
                ];
                $simpan = $this->model_master->simpanData('supir', $data);
                $this->session->set_flashdata('success', "Data Supir Berhasil Disimpan");
                redirect('masterdata/supir');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }

    //Masterdata Bank
    public function bank()
    {
        $this->validate_user();
        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Data Bank',
            'prev_menu' => 'Home',
            'data_bank' => $this->model_master->getAll('bank')->result_array()
        );

        $this->template->loadx('master', 'masterdata/bank/databank', $data);
    }

    public function add_bank()
    {
        $this->validate_user();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Input Data Bank',
            'prev_menu' => 'Data Bank',
        );

        $this->template->loadx('master', 'masterdata/bank/add_bank', $data);
    }

    public function edit_bank($id)
    {
        $this->validate_user();
        $hasil = $this->model_master->getWhere('bank', ['sha1(Id_bank)' => $id])->row_array();

        $data = array(
            'title' => "Master Data",
            'active_menu' => 'Edit Data Bank',
            'prev_menu' => 'Data Bank',
            'data_bank' => $hasil,
        );

        $this->template->loadx('master', 'masterdata/bank/edit_bank', $data);
    }

    public function hapusBank()
    {
        $where = ['sha1(Id_bank)' => $this->uri->segment(3)];
        $this->model_master->hapusData('bank', $where);
        $this->session->set_flashdata('success', "Data Bank Berhasil Dihapus");
        redirect('masterdata/bank');
    }

    public function simpan_data_bank()
    {
        $this->validate_user();
        try {
            if ($this->input->post('nama_bank', true) == '' || $this->input->post('no_rekening', true) == '') {
                $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                redirect('masterdata/add_bank');
            } else {
                $data = [
                    'nama_bank' => $this->input->post('nama_bank', true),
                    'no_rekening' => $this->input->post('no_rekening', true)
                ];

                $simpan = $this->model_master->simpanData('bank', $data);
                $this->session->set_flashdata('success', "Data Bank Berhasil Disimpan");
                redirect('masterdata/bank');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }

    public function update_data_bank()
    {
        $this->validate_user();
        $id = $this->input->post('id_bank', true);
        $where = ['Id_bank' => $id];
        try {
            if ($this->input->post('nama_bank', true) == '' || $this->input->post('no_rekening', true) == '') {
                $this->session->set_flashdata('error', "Terdapat field kosong, harap diisi");
                redirect('masterdata/add_bank');
            } else {
                $data = [
                    'nama_bank' => $this->input->post('nama_bank', true),
                    'no_rekening' => $this->input->post('no_rekening', true)
                ];

                $simpan = $this->model_master->updateData('bank', $data, $where);
                $this->session->set_flashdata('success', "Data Bank Berhasil Diubah");
                redirect('masterdata/bank');
            }
        } catch (\Throwable $th) {
            show_error('Error', 500, 'HTTP Server Error');
        }
    }
}
