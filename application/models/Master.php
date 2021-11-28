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
