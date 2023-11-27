<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trxpinjam extends CI_Model
{
    var $user_id;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getAll($tabel)
    {
        return $this->db->get($tabel);
    }

    public function getWhere($tabel, $where = null)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function simpanData($tbl, $data = null)
    {
        $this->db->insert($tbl, $data);
    }

    public function hapusData($tabel, $where = null)
    {
        $this->db->delete($tabel, $where);
    }

    public function updateData($tabel, $data = null, $where = null)
    {
        $this->db->update($tabel, $data, $where);
    }
    public function getJoinTrx($whereCust = null, $whereRent = null, $whereRole = NULL)
    {
        $this->db->select('tbr.*, tbc.*, tbm.*, tbl.*, tts.*');
        $this->db->from('tblt_rental as tbr');
        $this->db->join('customer as tbc', 'tbr.id_customer = tbc.Id_cust');
        $this->db->join('mobil as tbm', 'tbr.id_mobil = tbm.Id_mobil');
        $this->db->join('layanan as tbl', 'tbr.id_layanan = tbl.Id_layanan');
        $this->db->join('status as tts', 'tbr.id_status = tts.Id_Status');

        if ($whereCust != null) {
            $this->db->where('id_customer', $whereCust);
        }

        if ($whereRole != null) {
            if ($whereRole == 3) {
                $this->db->where_in('tbr.id_status', ['1', '8']);
            }
        }

        if ($whereRent != null) {
            $this->db->where('sha1(id_rental)', $whereRent);
        }

        return $this->db->get();
    }
}
