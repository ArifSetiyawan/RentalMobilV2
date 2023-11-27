<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Model
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

    public function getJoinMobil()
    {
        $this->db->select('tm.*, tt.nama_type');
        $this->db->from('mobil as tm');
        $this->db->join('type as tt', 'tm.kode_type = tt.Id_type');
        return $this->db->get();
    }

    public function getJoinDoc()
    {
        $this->db->select('cs.*, doc.*');
        $this->db->from('documents as doc');
        $this->db->join('customer as cs', 'doc.Id_trx = cs.Id_cust');
        return $this->db->get();
    }

    public function getJoinRole()
    {
        $this->db->select('tu.*, tr.*');
        $this->db->from('customer as tu');
        $this->db->join('role as tr', 'tu.role = tr.Id_role');
        $this->db->order_by("tu.Id_cust", "asc");
        return $this->db->get();
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
}
