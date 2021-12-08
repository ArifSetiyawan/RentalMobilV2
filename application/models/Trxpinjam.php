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
    public function getJoinTrx()
    {
        $this->db->select('trp.id_pinjam, trp.tgl_pinjam ,trp.metode_pembayaran, trp.durasi_peminjaman , trp.diskon , mm.nama_mobil, mm.tahun_buat, mp.nama');
        $this->db->from('trx_peminjaman as trp');
        $this->db->join('m_mobil as mm', 'trp.mobil = mm.id_mobil');
        $this->db->join('m_pelanggan as mp', 'trp.customer = mp.id_pelanggan');

        return $this->db->get();
    }
}
