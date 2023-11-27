<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $this->validate_user();
        $role = $_SESSION['role'];
        $dataPinjam = '';
        if ($role == 3) {
            $dataPinjam = $this->model_trx->getJoinTrx('', '', $role)->result_array();
        } else {
            $dataPinjam = $this->model_trx->getJoinTrx()->result_array();
        }

        $data = array(
            'title' => "Transaksi",
            'active_menu' => 'trx_pinjam',
            'data_pinjam' => $dataPinjam
        );

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

        $this->template->loadx('master', 'transaksi/add_trx_form', $data);
    }

    public function ApproveNego()
    {
        $this->validate_user();
        $data = json_decode($_POST['datanya']);
        $where = ['Id_rental' => $data->Id_rental];
        $nego = str_replace('.', '', $data->harga_nego);

        $dataApprove = [
            'id_status' => 6,
            'total_harga' => $nego
        ];
        $data = $this->model_master->updateData('tblt_rental', $dataApprove, $where);

        echo json_encode($data);
    }

    public function ApprovalTransaksi($status)
    {
        $this->validate_user();
        $data = json_decode($_POST['datanya']);
        $where = ['Id_rental' => $data->Id_rental];

        if ($status == 7) {
            $dataApprove = [
                'id_status' => 8,
            ];
        } elseif ($status == 9) {
            $dataApprove = [
                'id_status' => 10
            ];
        } elseif ($status == 11) {
            $dataApprove = [
                'id_status' => 12
            ];
        } elseif ($status == 3) {
            $dataApprove = [
                'id_status' => 4
            ];
        } elseif ($status == 15) {
            $dataApprove = [
                'id_status' => 16
            ];
        } elseif ($status == 17) {
            $dataApprove = [
                'id_status' => 18
            ];
        }

        $data = $this->model_master->updateData('tblt_rental', $dataApprove, $where);

        echo json_encode($data);
    }

    public function RejectNego()
    {
        $data = json_decode($_POST['datanya']);
        $where = ['Id_rental' => $data->Id_rental];

        $dataApprove = [
            'id_status' => 4,
            'notes' => $data->notesNego
        ];
        $data = $this->model_master->updateData('tblt_rental', $dataApprove, $where);
        echo json_encode($data);
    }

    public function RejectDP()
    {
        $data = json_decode($_POST['datanya']);
        $where = ['Id_rental' => $data->Id_rental];

        $dataApprove = [
            'id_status' => 6,
            'notes' => $data->notesDP
        ];
        $data = $this->model_master->updateData('tblt_rental', $dataApprove, $where);
        echo json_encode($data);
    }

    public function RejectPelunasan()
    {
        $data = json_decode($_POST['datanya']);
        $where = ['Id_rental' => $data->Id_rental];

        $dataApprove = [
            'id_status' => 10,
            'notes' => $data->notesPelunasan
        ];
        $data = $this->model_master->updateData('tblt_rental', $dataApprove, $where);
        echo json_encode($data);
    }
    public function RejectDenda()
    {
        $data = json_decode($_POST['datanya']);
        $where = ['Id_rental' => $data->Id_rental];

        $dataApprove = [
            'id_status' => 14,
            'notes' => $data->notesDenda
        ];
        $data = $this->model_master->updateData('tblt_rental', $dataApprove, $where);
        echo json_encode($data);
    }

    public function detailTrx($id)
    {
        $this->validate_user();
        $data = array(
            'title' => "Detail Transaksi Rental",
            'active_menu' => 'transaksi_rental',
            'sub_menu' => 'Data Transaksi Peminjaman',
            'data_trx' => $this->model_trx->getJoinTrx(null, $id)->row_array()

        );

        $this->template->loadx('master', 'transaksi/detail_trx', $data);
    }
    public function pengantaranBukti()
    {
        $this->validate_user();

        $idRental =  $this->input->post('id_rental', true);
        $where = ['id_rental' => $idRental];

        $buktiPengantaran = $_FILES['buktiPengantaran']['name'];

        if ($buktiPengantaran) {
            $file_name = str_replace('.', '', "Pengantaran_" . rand());

            $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiPengantaran/';
            $config['allowed_types']        = 'jpg|jpeg|png|pdf';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 3072;

            $this->upload->initialize($config, true);

            if ($this->upload->do_upload('buktiPengantaran')) {
                $buktiPengantaranLama = $this->input->post('buktiPengantaranLama', true);
                if ($buktiPengantaranLama != 'default.png' || $buktiPengantaranLama != 'default.jpg' || $buktiPengantaranLama != 'default.jpeg' || $buktiPengantaranLama != 'default.pdf') {
                    unlink(FCPATH . '/upload/fileCustomer/BuktiPengantaran/' . $buktiPengantaranLama);
                }

                $uploaded_data = $this->upload->data();
                $this->db->set('bukti_pengantaran', $uploaded_data['file_name']);
                $this->db->where('id_rental', $idRental);
                $this->db->update('tblt_rental');
            } else {
                $this->session->set_flashdata('error', "Data Gagal Upload");
                redirect('transaksi');
            }
        }

        $data = [
            'notes' => $this->input->post('notes', true),
            'id_status' => 9
        ];

        $this->model_master->updateData('tblt_rental', $data, $where);

        $this->session->set_flashdata('success', "Data Pengantaran Rental Created");
        redirect('transaksi');
    }
    public function verifikasiBukti()
    {
        $this->validate_user();

        $idRental =  $this->input->post('id_rental', true);
        $idCust =  $this->input->post('idCust', true);

        $where = ['id_rental' => $idRental];

        $kep = $this->input->post('keperluan', true);

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
                        $this->session->set_flashdata('error', "Data Gagal Upload");
                        redirect('transaksi');
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
                        $this->session->set_flashdata('error', "Data Gagal Upload");
                        redirect('transaksi');
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
                        $this->session->set_flashdata('error', "Data Gagal Upload");
                        redirect('transaksi');
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
                        $this->session->set_flashdata('error', "Data Gagal Upload");
                        redirect('transaksi');
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
                        $this->session->set_flashdata('error', "Data Gagal Upload");
                        redirect('transaksi');
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
                        $this->session->set_flashdata('error', "Data Gagal Upload");
                        redirect('transaksi');
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
                    $this->session->set_flashdata('error', "Data Gagal Upload");
                    redirect('transaksi');
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
                    $this->session->set_flashdata('error', "Data Gagal Upload");
                    redirect('transaksi');
                }
            }
        }

        $bukti_survei = $_FILES['bukti_survei']['name'];

        if ($bukti_survei) {
            $file_name = str_replace('.', '', "Verifikasi_" . rand());

            $config['upload_path']          = FCPATH . '/upload/fileCustomer/BuktiSurvei/';
            $config['allowed_types']        = 'jpg|jpeg|png|pdf';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 3072;

            $this->upload->initialize($config, true);

            if ($this->upload->do_upload('bukti_survei')) {
                $bukti_surveiLama = $this->input->post('bukti_surveiLama', true);
                if ($bukti_surveiLama != 'default.png' || $bukti_surveiLama != 'default.jpg' || $bukti_surveiLama != 'default.jpeg' || $bukti_surveiLama != 'default.pdf') {
                    unlink(FCPATH . '/upload/fileCustomer/BuktiSurvei/' . $bukti_surveiLama);
                }

                $uploaded_data = $this->upload->data();
                $this->db->set('bukti_survei', $uploaded_data['file_name']);
                $this->db->where('id_rental', $idRental);
                $this->db->update('tblt_rental');
            } else {
                $this->session->set_flashdata('error', "Data Gagal Upload");
                redirect('transaksi');
            }
        }

        $data = [
            'id_status' => 3
        ];

        $this->model_master->updateData('tblt_rental', $data, $where);

        $this->session->set_flashdata('success', "Data Verifikasi Rental Created");
        redirect('transaksi');
    }
    public function download($filename = NULL, $status = NULL)
    {
        // load download helder
        $this->load->helper('download');
        // read file contents
        if ($status == 3) {
            $data = file_get_contents(base_url('/upload/fileCustomer/BuktiSurvei/' . $filename));
        }
        if ($status == 7) {
            $data = file_get_contents(base_url('/upload/fileCustomer/BuktiDP/' . $filename));
        }
        if ($status == 9) {
            $data = file_get_contents(base_url('/upload/fileCustomer/BuktiPengantaran/' . $filename));
        }
        if ($status == 11) {
            $data = file_get_contents(base_url('/upload/fileCustomer/BuktiPelunasan/' . $filename));
        }
        if ($status == 15) {
            $data = file_get_contents(base_url('/upload/fileCustomer/BuktiDenda/' . $filename));
        }
        if ($status == 17) {
            $data = file_get_contents(base_url('/upload/fileCustomer/BuktiPengembalian/' . $filename));
        }
        force_download($filename, $data);
    }
    public function downloadVerifikasiFile($filename = NULL, $keperluan = NULL, $jenisFile = NULL)
    {
        // load download helder
        $this->load->helper('download');
        // read file contents
        if ($jenisFile == "KTP" && $keperluan == "ALL") {
            $data = file_get_contents(base_url('/upload/fileCustomer/KTP/' . $filename));
        }
        if ($jenisFile == "SIM" && $keperluan == "ALL") {
            $data = file_get_contents(base_url('/upload/fileCustomer/SIM/' . $filename));
        }

        if ($keperluan == "Perseorangan") {
            if ($jenisFile == "KK") {
                $data = file_get_contents(base_url('/upload/fileCustomer/KK/' . $filename));
            } elseif ($jenisFile == "REK") {
                $data = file_get_contents(base_url('/upload/fileCustomer/RekListrik/' . $filename));
            } elseif ($jenisFile == "BK") {
                $data = file_get_contents(base_url('/upload/fileCustomer/BuktiRumah/' . $filename));
            } elseif ($jenisFile == "IDCARD") {
                $data = file_get_contents(base_url('/upload/fileCustomer/IDCard/' . $filename));
            }
        }
        if ($keperluan == "Perusahaan") {
            if ($jenisFile == "PERUSAHAAN") {
                $data = file_get_contents(base_url('/upload/fileCustomer/Perusahaan/' . $filename));
            } elseif ($jenisFile == "NIB") {
                $data = file_get_contents(base_url('/upload/fileCustomer/NIB/' . $filename));
            }
        }

        force_download($filename, $data);
    }
}
