<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userpage extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Master', 'model_master');
    $this->load->model('Trxpinjam', 'model_trx');
    $this->load->library('template');
    $this->load->library('upload');
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
    // $this->validate_user();
    $data = array(
      'title' => "Dashboard",
      'active_menu' => 'beranda',
      'data_mobil' => $this->model_master->getJoinMobil()->result_array(),
      'dataLayanan' => $this->model_master->getAll('layanan')->result_array(),

    );

    $this->template->loadx('masteruser', 'userpage/index', $data);
  }
  public function about()
  {
    // $this->validate_user();
    $data = array(
      'title' => "Tentang Kami",
      'active_menu' => 'about'

    );

    $this->template->loadx('masteruser', 'userpage/about', $data);
  }
  public function layanan()
  {
    // $this->validate_user();
    $data = array(
      'title' => "Layanan Kami",
      'active_menu' => 'layanan',
      'dataLayanan' => $this->model_master->getAll('layanan')->result_array(),
    );

    $this->template->loadx('masteruser', 'userpage/layanan', $data);
  }
  public function syarat()
  {
    // $this->validate_user();
    $data = array(
      'title' => "Syarat dan Ketentuan",
      'active_menu' => 'syarat',

    );

    $this->template->loadx('masteruser', 'userpage/syarat', $data);
  }
  public function mobil()
  {
    // $this->validate_user();
    $data = array(
      'title' => "Armada Murifiya Rental Car",
      'active_menu' => 'mobil',
      'data_mobil' => $this->model_master->getJoinMobil()->result_array()

    );

    $this->template->loadx('masteruser', 'userpage/car', $data);
  }
  public function profil()
  {
    $this->validate_user();
    $id = $this->session->userdata();
    $data = array(
      'title' => "Profil",
      'active_menu' => 'profil',
      'data_customer' => $this->model_master->getWhere('customer', ['Id_cust' => $id['id_cust']])->row_array(),

    );

    $this->template->loadx('masteruser', 'userpage/profil', $data);
  }

  public function updateProfil()
  {
    $id = $this->input->post('id_cust', true);
    $kep = $this->input->post('keperluan', true);

    $ktp = $_FILES['ktp']['name'];
    $sim = $_FILES['sim']['name'];

    if ($kep == "Perseorangan") {
      $kk = $_FILES['kk']['name'];
      $rek = $_FILES['rek']['name'];
      $bukti = $_FILES['tdk']['name'];
      $idcard = $_FILES['idcard']['name'];

      if ($kk) {
        $file_name = str_replace('.', '', "Kartu_Keluarga" . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/KK/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('kk')) {
          $kkLama = $this->input->post('kkLama', true);
          if ($kkLama != 'default.png' || $kkLama != 'default.jpg' || $kkLama != 'default.jpeg' || $kkLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/KK/' . $kkLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('file_KK', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }

      if ($rek) {
        $file_name = str_replace('.', '', "Rekening_Listrik" . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/RekListrik/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('rek')) {
          $rekLama = $this->input->post('rekLama', true);
          if ($rekLama != 'default.png' || $rekLama != 'default.jpg' || $rekLama != 'default.jpeg' || $rekLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/RekListrik/' . $rekLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('rek_listrik', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }

      if ($bukti) {
        $file_name = str_replace('.', '', "Bukti_MilikRumah" . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiRumah/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('tdk')) {
          $buktiLama = $this->input->post('tdkLama', true);
          if ($buktiLama != 'default.jpg' || $buktiLama != 'default.jpeg' || $buktiLama != 'default.png' || $buktiLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/BuktiRumah/' . $buktiLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('bukti_keprumah', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }

      if ($idcard) {
        $file_name = str_replace('.', '', "ID_CARD" . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/IDCard/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('idcard')) {
          $idcardLama = $this->input->post('idcardLama', true);
          if ($idcardLama != 'default.jpg' || $idcardLama != 'default.jpeg' || $idcardLama != 'default.png' || $idcardLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/IDCard/' . $idcardLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('Id_card', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }
    }

    if ($kep == "Perusahaan") {
      $fper = $_FILES['fper']['name'];
      $nib = $_FILES['nib']['name'];

      if ($fper) {
        $file_name = str_replace('.', '', "File_Perusahaan" . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/Perusahaan/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('fper')) {
          $fperLama = $this->input->post('fperLama', true);
          if ($fperLama != 'default.png' || $fperLama != 'default.jpg' || $fperLama != 'default.jpeg' || $fperLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/Perusahaan/' . $fperLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('file_perusahaan', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }

      if ($nib) {
        $file_name = str_replace('.', '', "NIB_" . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/NIB/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('nib')) {
          $nibLama = $this->input->post('nibLama', true);
          if ($nibLama != 'default.png' || $nibLama != 'default.jpg' || $nibLama != 'default.jpeg' || $nibLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/NIB/' . $nibLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('file_NIB', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }
    }

    if ($ktp) {
      $file_name = str_replace('.', '', "KTP_" . rand());

      $config['upload_path']          = FCPATH . '/upload/fileCustomer/KTP/';
      $config['allowed_types']        = 'jpg|jpeg|png|pdf';
      $config['file_name']            = $file_name;
      $config['overwrite']            = true;
      $config['max_size']             = 3072;
      $config['max_width']            = 2000;
      $config['max_height']           = 2000;

      $this->upload->initialize($config, true);

      if ($this->upload->do_upload('ktp')) {
        $ktpLama = $this->input->post('ktpLama', true);
        if ($ktpLama != 'default.png' || $ktpLama != 'default.jpg' || $ktpLama != 'default.jpeg' || $ktpLama != 'default.pdf') {
          unlink(FCPATH . '/upload/fileCustomer/KTP/' . $ktpLama);
        }

        $uploaded_data = $this->upload->data();
        $this->db->set('file_ktp', $uploaded_data['file_name']);
      } else {
        echo $this->upload->display_errors();
      }
    }

    if ($sim) {
      $file_name = str_replace('.', '', $sim . rand());

      $config['upload_path']          = FCPATH . '/upload/fileCustomer/SIM/';
      $config['allowed_types']        = 'jpg|jpeg|png|pdf';
      $config['file_name']            = $file_name;
      $config['overwrite']            = true;
      $config['max_size']             = 3072;
      $config['max_width']            = 2000;
      $config['max_height']           = 2000;

      $this->upload->initialize($config, true);

      if ($this->upload->do_upload('sim')) {
        $simLama = $this->input->post('simLama', true);
        if ($simLama != 'default.png' || $simLama != 'default.jpg' || $simLama != 'default.jpeg' || $simLama != 'default.pdf') {
          unlink(FCPATH . '/upload/fileCustomer/SIM/' . $simLama);
        }

        $uploaded_data = $this->upload->data();
        $this->db->set('file_sim', $uploaded_data['file_name']);
      } else {
        echo $this->upload->display_errors();
      }
    }

    $data = [
      'nama' => $this->input->post('nmCust', true),
      'email' => $this->input->post('email', true),
      'alamat' => $this->input->post('alamat', true),
      'no_telfon' => $this->input->post('noTelfon', true)
    ];

    $this->db->where('Id_cust', $id);
    $this->db->set($data);
    $this->db->update('customer');

    $this->session->set_flashdata('success', "Data Profil Berhasil Diubah");
    redirect('userpage/profil');
  }

  public function changePass()
  {
    $this->validate_user();
    $id = $this->session->userdata();
    $data = array(
      'title' => "Change Password",
      'active_menu' => 'changepass',
      'data_customer' => $this->model_master->getWhere('customer', ['Id_cust' => $id['id_cust']])->row_array(),

    );

    $this->template->loadx('masteruser', 'userpage/change_pass', $data);
  }
  public function updatePass()
  {
    $this->validate_user();
    $email = $this->input->post('email', true);
    $pass = $this->input->post('passLama', true);

    $where = ['email' => $email];

    $dataCust = $this->model_master->getWhere('customer', $where)->result_array();

    if (count($dataCust) > 0) {

      if ($dataCust[0]['password'] == sha1($pass)) {
        $data = [
          'password' => sha1($this->input->post('passBaru', true)),
        ];

        $simpan = $this->model_master->updateData('customer', $data, $where);
        $this->session->set_flashdata('success', "Data Password Berhasil Diubah");
        redirect('userpage/changePass');
      } else {
        $this->session->set_flashdata('error', "Password Lama Tidak Sesuai !!!");
        redirect('userpage/changePass');
      }
    } else {
      $this->session->set_flashdata('error', "Data Email Tidak Valid !!!");
      redirect('userpage/changePass');
    }
  }

  public function detailsMobil($id)
  {
    // $this->validate_user();
    $where = ['sha1(Id_mobil)' => $id];

    $data = array(
      'prev_menu' => 'Data Mobil',
      'active_menu' => 'Detail Data Mobil',
      'data_mobil' => $this->model_master->getWhere('mobil',  $where)->row_array()
    );

    $this->template->loadx('masteruser', 'userpage/details_mobil', $data);
  }

  public function transaksi($id_mob)
  {
    $this->validate_user();
    $id = $this->session->userdata();
    $where = ['sha1(Id_mobil)' => $id_mob];

    $data = array(
      'title' => "Transaksi Rental Car",
      'active_menu' => 'transaksi',
      'data_mobil' => $this->model_master->getWhere('mobil',  $where)->row_array(),
      'data_customer' => $this->model_master->getWhere('customer', ['Id_cust' => $id['id_cust']])->row_array(),
      'data_layanan' => $this->model_master->getAll('layanan')->result_array(),
      'data_supir' => $this->model_master->getAll('supir')->result_array(),
      'data_bank' => $this->model_master->getAll('bank')->result_array(),
      'data_trx' => $this->model_master->getWhere('tblt_rental', ['id_customer' => $id['id_cust']])->row_array(),


    );

    $this->template->loadx('masteruser', 'userpage/transaksi/transaksi', $data);
  }
  public function actionPengajuan()
  {
    $this->validate_user();

    $idCust =  $this->input->post('idCust', true);
    $supir = 0;
    $layanan = $this->input->post('layananRental', true);
    $survei = str_replace('.', '', $this->input->post('biayaSurvey', true));
    $antar = str_replace('.', '', $this->input->post('biayaAntar', true));
    $total = str_replace('.', '', $this->input->post('totalHarga', true));
    $newDate = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('tglMulai', true))));
    $newDate2 = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('tglSelesai', true))));

    print_r($_FILES['ktp']['name']);
    die;
    $kep = $this->input->post('keperluan', true);

    if ($layanan == 2) {
      $supir = 1;
    } else {
      $supir = 0;
    }

    if ($kep == "Perseorangan") {
      if ($this->input->post('kk', true) != '' && $this->input->post('rek', true) != '' && $this->input->post('tdk', true) != '' && $this->input->post('idcard', true) != '') {
        $kk = $_FILES['kk']['name'];
        $rek = $_FILES['rek']['name'];
        $bukti = $_FILES['tdk']['name'];
        $idcard = $_FILES['idcard']['name'];
        if ($kk) {
          $file_name = str_replace('.', '', "Kartu_Keluarga" . rand());

          $config['upload_path']          = FCPATH . '/upload/fileCustomer/KK/';
          $config['allowed_types']        = 'jpg|jpeg|png|pdf';
          $config['file_name']            = $file_name;
          $config['overwrite']            = true;
          $config['max_size']             = 3072;
          $config['max_width']            = 2000;
          $config['max_height']           = 2000;

          $this->upload->initialize($config, true);

          if ($this->upload->do_upload('kk')) {
            $kkLama = $this->input->post('kkLama', true);
            if ($kkLama != 'default.png' || $kkLama != 'default.jpg' || $kkLama != 'default.jpeg' || $kkLama != 'default.pdf') {
              unlink(FCPATH . '/upload/fileCustomer/KK/' . $kkLama);
            }

            $uploaded_data = $this->upload->data();
            $this->db->set('file_KK', $uploaded_data['file_name']);
          } else {
            echo $this->upload->display_errors();
          }
        }

        if ($rek) {
          $file_name = str_replace('.', '', "Rekening_Listrik" . rand());

          $config['upload_path']          = FCPATH . '/upload/fileCustomer/RekListrik/';
          $config['allowed_types']        = 'jpg|jpeg|png|pdf';
          $config['file_name']            = $file_name;
          $config['overwrite']            = true;
          $config['max_size']             = 3072;
          $config['max_width']            = 2000;
          $config['max_height']           = 2000;

          $this->upload->initialize($config, true);

          if ($this->upload->do_upload('rek')) {
            $rekLama = $this->input->post('rekLama', true);
            if ($rekLama != 'default.png' || $rekLama != 'default.jpg' || $rekLama != 'default.jpeg' || $rekLama != 'default.pdf') {
              unlink(FCPATH . '/upload/fileCustomer/RekListrik/' . $rekLama);
            }

            $uploaded_data = $this->upload->data();
            $this->db->set('rek_listrik', $uploaded_data['file_name']);
          } else {
            echo $this->upload->display_errors();
          }
        }

        if ($bukti) {
          $file_name = str_replace('.', '', "Bukti_MilikRumah" . rand());

          $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiRumah/';
          $config['allowed_types']        = 'jpg|jpeg|png|pdf';
          $config['file_name']            = $file_name;
          $config['overwrite']            = true;
          $config['max_size']             = 3072;
          $config['max_width']            = 2000;
          $config['max_height']           = 2000;

          $this->upload->initialize($config, true);

          if ($this->upload->do_upload('tdk')) {
            $buktiLama = $this->input->post('tdkLama', true);
            if ($buktiLama != 'default.jpg' || $buktiLama != 'default.jpeg' || $buktiLama != 'default.png' || $buktiLama != 'default.pdf') {
              unlink(FCPATH . '/upload/fileCustomer/BuktiRumah/' . $buktiLama);
            }

            $uploaded_data = $this->upload->data();
            $this->db->set('bukti_keprumah', $uploaded_data['file_name']);
          } else {
            echo $this->upload->display_errors();
          }
        }

        if ($idcard) {
          $file_name = str_replace('.', '', "ID_CARD" . rand());

          $config['upload_path']          = FCPATH . '/upload/fileCustomer/IDCard/';
          $config['allowed_types']        = 'jpg|jpeg|png|pdf';
          $config['file_name']            = $file_name;
          $config['overwrite']            = true;
          $config['max_size']             = 3072;
          $config['max_width']            = 2000;
          $config['max_height']           = 2000;

          $this->upload->initialize($config, true);

          if ($this->upload->do_upload('idcard')) {
            $idcardLama = $this->input->post('idcardLama', true);
            if ($idcardLama != 'default.jpg' || $idcardLama != 'default.jpeg' || $idcardLama != 'default.png' || $idcardLama != 'default.pdf') {
              unlink(FCPATH . '/upload/fileCustomer/IDCard/' . $idcardLama);
            }

            $uploaded_data = $this->upload->data();
            $this->db->set('Id_card', $uploaded_data['file_name']);
          } else {
            echo $this->upload->display_errors();
          }
        }
      }
    }

    if ($kep == "Perusahaan") {
      if ($this->input->post('fper', true) != '' && $this->input->post('nib', true) != '') {
        $fper = $_FILES['fper']['name'];
        $nib = $_FILES['nib']['name'];
        if ($fper) {
          $file_name = str_replace('.', '', "File_Perusahaan" . rand());

          $config['upload_path']          = FCPATH . '/upload/fileCustomer/Perusahaan/';
          $config['allowed_types']        = 'jpg|jpeg|png|pdf';
          $config['file_name']            = $file_name;
          $config['overwrite']            = true;
          $config['max_size']             = 3072;
          $config['max_width']            = 2000;
          $config['max_height']           = 2000;

          $this->upload->initialize($config, true);

          if ($this->upload->do_upload('fper')) {
            $fperLama = $this->input->post('fperLama', true);
            if ($fperLama != 'default.png' || $fperLama != 'default.jpg' || $fperLama != 'default.jpeg' || $fperLama != 'default.pdf') {
              unlink(FCPATH . '/upload/fileCustomer/Perusahaan/' . $fperLama);
            }

            $uploaded_data = $this->upload->data();
            $this->db->set('file_perusahaan', $uploaded_data['file_name']);
          } else {
            echo $this->upload->display_errors();
          }
        }

        if ($nib) {
          $file_name = str_replace('.', '', "NIB_" . rand());

          $config['upload_path']          = FCPATH . '/upload/fileCustomer/NIB/';
          $config['allowed_types']        = 'jpg|jpeg|png|pdf';
          $config['file_name']            = $file_name;
          $config['overwrite']            = true;
          $config['max_size']             = 3072;
          $config['max_width']            = 2000;
          $config['max_height']           = 2000;

          $this->upload->initialize($config, true);

          if ($this->upload->do_upload('nib')) {
            $nibLama = $this->input->post('nibLama', true);
            if ($nibLama != 'default.png' || $nibLama != 'default.jpg' || $nibLama != 'default.jpeg' || $nibLama != 'default.pdf') {
              unlink(FCPATH . '/upload/fileCustomer/NIB/' . $nibLama);
            }

            $uploaded_data = $this->upload->data();
            $this->db->set('file_NIB', $uploaded_data['file_name']);
          } else {
            echo $this->upload->display_errors();
          }
        }
      }
    }

    if ($this->input->post('ktp', true) != '' && $this->input->post('sim', true) != '') {
      $ktp = $_FILES['ktp']['name'];
      $sim = $_FILES['sim']['name'];

      if ($ktp) {
        $file_name = str_replace('.', '', "KTP_" . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/KTP/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('ktp')) {
          $ktpLama = $this->input->post('ktpLama', true);
          if ($ktpLama != 'default.png' || $ktpLama != 'default.jpg' || $ktpLama != 'default.jpeg' || $ktpLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/KTP/' . $ktpLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('file_ktp', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }

      if ($sim) {
        $file_name = str_replace('.', '', $sim . rand());

        $config['upload_path']          = FCPATH . '/upload/fileCustomer/SIM/';
        $config['allowed_types']        = 'jpg|jpeg|png|pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config, true);

        if ($this->upload->do_upload('sim')) {
          $simLama = $this->input->post('simLama', true);
          if ($simLama != 'default.png' || $simLama != 'default.jpg' || $simLama != 'default.jpeg' || $simLama != 'default.pdf') {
            unlink(FCPATH . '/upload/fileCustomer/SIM/' . $simLama);
          }

          $uploaded_data = $this->upload->data();
          $this->db->set('file_sim', $uploaded_data['file_name']);
        } else {
          echo $this->upload->display_errors();
        }
      }
    }

    $data = [
      'id_customer' => $idCust,
      'id_mobil' => $this->input->post('idMobil', true),
      'id_layanan' => $layanan,
      'tgl_rental' => $newDate,
      'tgl_kembali' => $newDate2,
      'total_harga' => $total,
      'biaya_survei' => $survei,
      'biaya_antar' => $antar,
      'supir' => $supir,
      'id_status' => 1
    ];
    $this->model_master->simpanData('tblt_rental', $data);

    $dataStatus = [
      'status' => 0
    ];

    $this->db->where('Id_mobil', $this->input->post('idMobil', true));
    $this->model_master->updateData('mobil', $dataStatus);

    $this->session->set_flashdata('success', "Data Transaksi Rental Created");
    redirect('userpage/transaksi_rental');
  }
  public function transaksi_rental()
  {
    $this->validate_user();
    $data = array(
      'title' => "Data Transaksi Rental Car",
      'active_menu' => 'transaksi_rental',
      'data_trx' => $this->model_trx->getJoinTrx($_SESSION['id_cust'], null)->result_array()

    );

    // print_r($data);
    // die;
    $this->template->loadx('masteruser', 'userpage/transaksi/transaksi_rental', $data);
  }
  public function actionNego()
  {
    $this->validate_user();

    $id_rental =  $this->input->post('id_rental', true);
    $hrg_nego =  $this->input->post('hargaNego', true);

    $where = ['id_rental' => $id_rental];

    $data = [
      'harga_nego' => $hrg_nego,
      'id_status' => 5
    ];

    $simpan = $this->model_master->updateData('tblt_rental', $data, $where);
    $this->session->set_flashdata('success', "Negosiasi Success, menunggu respon dari Admin");
    redirect('userpage/transaksi_rental');
  }
  public function detailTrx($id)
  {
    $this->validate_user();
    $data = array(
      'title' => "Data Transaksi Rental Car",
      'active_menu' => 'transaksi_rental',
      'data_trx' => $this->model_trx->getJoinTrx(null, $id)->row_array()

    );

    // print_r($data);
    // die;
    $this->template->loadx('masteruser', 'userpage/transaksi/details_trx', $data);
  }

  public function trxPembayaran($id)
  {
    $this->validate_user();
    $data = array(
      'title' => "Transaksi Pembayaran DP",
      'active_menu' => 'transaksi_pembayaran',
      'data_trx' => $this->model_trx->getJoinTrx(null, $id)->row_array(),
      'data_bank' => $this->model_master->getAll('bank')->result_array(),


    );

    // print_r($data);
    // die;
    $this->template->loadx('masteruser', 'userpage/transaksi/pembayaran', $data);
  }

  public function actionPembayaranDP()
  {
    $this->validate_user();

    $idRental =  $this->input->post('idRental', true);
    $where = ['id_rental' => $idRental];

    $buktiDP = $_FILES['buktiDP']['name'];

    if ($buktiDP) {
      $file_name = str_replace('.', '', "DP_Bayar" . rand());

      $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiDP/';
      $config['allowed_types']        = 'jpg|jpeg|png|pdf';
      $config['file_name']            = $file_name;
      $config['overwrite']            = true;
      $config['max_size']             = 3072;

      $this->upload->initialize($config, true);

      if ($this->upload->do_upload('buktiDP')) {
        $buktiDPLama = $this->input->post('buktiDPLama', true);
        if ($buktiDPLama != 'default.png' || $buktiDPLama != 'default.jpg' || $buktiDPLama != 'default.jpeg' || $buktiDPLama != 'default.pdf') {
          unlink(FCPATH . '/upload/fileCustomer/BuktiDP/' . $buktiDPLama);
        }

        $uploaded_data = $this->upload->data();
        $this->db->set('bukti_DP', $uploaded_data['file_name']);
        $this->db->where('id_rental', $idRental);
        $this->db->update('tblt_rental');
      } else {
        echo $this->upload->display_errors();
      }
    }
    $DP = str_replace('.', '', $this->input->post('DP', true));

    $data = [
      'DP' => $DP,
      'id_status' => 7
    ];

    $this->model_master->updateData('tblt_rental', $data, $where);

    $this->session->set_flashdata('success', "Data DP Created");
    redirect('userpage/transaksi_rental');
  }

  public function trxPelunasan($id)
  {
    $this->validate_user();
    $data = array(
      'title' => "Transaksi Pelunasan Pembayaran",
      'active_menu' => 'transaksi_pembayaran',
      'data_trx' => $this->model_trx->getJoinTrx(null, $id)->row_array(),
      'data_bank' => $this->model_master->getAll('bank')->result_array(),


    );

    // print_r($data);
    // die;
    $this->template->loadx('masteruser', 'userpage/transaksi/pembayaran', $data);
  }

  public function actionPelunasan()
  {
    $this->validate_user();

    $idRental =  $this->input->post('idRental', true);
    $where = ['id_rental' => $idRental];

    $buktiPel = $_FILES['buktiPelunasan']['name'];

    if ($buktiPel) {
      $file_name = str_replace('.', '', "Pelunasan_" . rand());

      $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiPelunasan/';
      $config['allowed_types']        = 'jpg|jpeg|png|pdf';
      $config['file_name']            = $file_name;
      $config['overwrite']            = true;
      $config['max_size']             = 3072;

      $this->upload->initialize($config, true);

      if ($this->upload->do_upload('buktiPelunasan')) {
        $buktiPelLama = $this->input->post('buktiPelLama', true);
        if ($buktiPelLama != 'default.png' || $buktiPelLama != 'default.jpg' || $buktiPelLama != 'default.jpeg' || $buktiPelLama != 'default.pdf') {
          unlink(FCPATH . '/upload/fileCustomer/BuktiPelunasan/' . $buktiPelLama);
        }

        $uploaded_data = $this->upload->data();
        $this->db->set('bukti_pelunasan', $uploaded_data['file_name']);
        $this->db->where('id_rental', $idRental);
        $this->db->update('tblt_rental');
      } else {
        echo $this->upload->display_errors();
      }
    }
    $bPelunasan = str_replace('.', '', $this->input->post('pelunasan', true));

    $data = [
      'biaya_pelunasan' => $bPelunasan,
      'id_status' => 11
    ];

    $this->model_master->updateData('tblt_rental', $data, $where);

    $this->session->set_flashdata('success', "Data Pelunasan Rental Created");
    redirect('userpage/transaksi_rental');
  }
  public function trxDenda($id)
  {
    $this->validate_user();
    $data = array(
      'title' => "Transaksi Pembayaran Denda",
      'active_menu' => 'transaksi_pembayaran',
      'data_trx' => $this->model_trx->getJoinTrx(null, $id)->row_array(),
      'data_bank' => $this->model_master->getAll('bank')->result_array(),


    );

    // print_r($data);
    // die;
    $this->template->loadx('masteruser', 'userpage/transaksi/pembayaran', $data);
  }
  public function actionPembayaranDenda()
  {
    $this->validate_user();

    $idRental =  $this->input->post('idRental', true);
    $where = ['id_rental' => $idRental];

    $buktiDenda = $_FILES['buktiDenda']['name'];

    if ($buktiDenda) {
      $file_name = str_replace('.', '', 'Bukti_Denda' . rand());

      $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiDenda/';
      $config['allowed_types']        = 'jpg|jpeg|png|pdf';
      $config['file_name']            = $file_name;
      $config['overwrite']            = true;
      $config['max_size']             = 3072;

      $this->upload->initialize($config, true);

      if ($this->upload->do_upload('buktiDenda')) {
        $buktiDendaLama = $this->input->post('buktiDendaLama', true);
        if ($buktiDendaLama != 'default.png' || $buktiDendaLama != 'default.jpg' || $buktiDendaLama != 'default.jpeg' || $buktiDendaLama != 'default.pdf') {
          unlink(FCPATH . '/upload/fileCustomer/BuktiDenda/' . $buktiDendaLama);
        }

        $uploaded_data = $this->upload->data();
        $this->db->set('bukti_denda', $uploaded_data['file_name']);
        $this->db->where('id_rental', $idRental);
        $this->db->update('tblt_rental');
      } else {
        echo $this->upload->display_errors();
      }
    }
    $denda = str_replace('.', '', $this->input->post('dendaTotal', true));

    $data = [
      'total_denda' => $denda,
      'id_status' => 15
    ];

    $this->model_master->updateData('tblt_rental', $data, $where);

    $this->session->set_flashdata('success', "Data Denda Created");
    redirect('userpage/transaksi_rental');
  }
  public function getPriceSupir()
  {
    // $this->validate_user();
    $data = json_decode($_POST['datanya']);
    $where = ['Id_supir' => $data->Id_supir];
    $data = $this->model_master->getWhere('supir',  $where)->row_array();

    echo json_encode($data);
  }
  public function rejectRent($id)
  {
    $this->validate_user();

    $where = ['sha1(id_rental)' => $id];
    $getDataRental = $this->model_master->getWhere('tblt_rental',  $where)->row_array();
    $whereMobil = ['Id_mobil' => $getDataRental['id_mobil']];

    $data = [
      'id_status' => 13,
    ];

    $dataUpdate = [
      'status' => 1,
    ];

    $simpan = $this->model_master->updateData('tblt_rental', $data, $where);
    $simpan = $this->model_master->updateData('mobil', $dataUpdate, $whereMobil);

    $this->session->set_flashdata('success', "Transaksi Rental Anda Berhasil Dibatalkan");
    redirect('userpage/transaksi_rental');
  }
  public function pengembalianBukti()
  {
    $this->validate_user();

    $idRental =  $this->input->post('id_rental', true);
    $where = ['id_rental' => $idRental];

    $buktiPengembalian = $_FILES['buktiPengembalian']['name'];

    if ($buktiPengembalian) {
      $file_name = str_replace('.', '', "Pengembalian_" . rand());

      $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiPengembalian/';
      $config['allowed_types']        = 'jpg|jpeg|png|pdf';
      $config['file_name']            = $file_name;
      $config['overwrite']            = true;
      $config['max_size']             = 3072;

      $this->upload->initialize($config, true);

      if ($this->upload->do_upload('buktiPengembalian')) {
        $buktiPengembalianLama = $this->input->post('buktiPengembalianLama', true);
        if ($buktiPengembalianLama != 'default.png' || $buktiPengembalianLama != 'default.jpg' || $buktiPengembalianLama != 'default.jpeg' || $buktiPengembalianLama != 'default.pdf') {
          unlink(FCPATH . '/upload/fileCustomer/BuktiPengembalian/' . $buktiPengembalianLama);
        }

        $uploaded_data = $this->upload->data();
        $this->db->set('bukti_pengembalian', $uploaded_data['file_name']);
        $this->db->where('id_rental', $idRental);
        $this->db->update('tblt_rental');
      } else {
        echo $this->upload->display_errors();
      }
    }

    $data = [
      'id_status' => 17
    ];

    $this->model_master->updateData('tblt_rental', $data, $where);

    $this->session->set_flashdata('success', "Data Pengembalian Rental Created");
    redirect('userpage/transaksi_rental');
  }
}
