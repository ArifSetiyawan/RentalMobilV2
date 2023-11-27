<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reporting extends CI_Model
{
  var $user_id;

  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
  }

  public function tampilLaporanPerTgl()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');

    $this->db->select('tbr.*, tbc.*, tbm.*, tbl.*, tts.*');
    $this->db->from('tblt_rental as tbr');
    $this->db->join('customer as tbc', 'tbr.id_customer = tbc.Id_cust');
    $this->db->join('mobil as tbm', 'tbr.id_mobil = tbm.Id_mobil');
    $this->db->join('layanan as tbl', 'tbr.id_layanan = tbl.Id_layanan');
    $this->db->join('status as tts', 'tbr.id_status = tts.Id_Status');

    if (!empty($dari) && !empty($sampai)) {
      $this->db->where('tbr.tgl_rental >=', $dari);
      $this->db->where('tbr.tgl_rental <=', $sampai);
    }
    return $this->db->get()->result_array();
  }
  public function reportingTransaksi()
  {
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    $this->db->select('tbr.*, tbc.*, tbm.*, tbl.*, tts.*, (SELECT SUM(total_harga) FROM tblt_rental) AS subTotal');
    $this->db->from('tblt_rental as tbr');
    $this->db->join('customer as tbc', 'tbr.id_customer = tbc.Id_cust');
    $this->db->join('mobil as tbm', 'tbr.id_mobil = tbm.Id_mobil');
    $this->db->join('layanan as tbl', 'tbr.id_layanan = tbl.Id_layanan');
    $this->db->join('status as tts', 'tbr.id_status = tts.Id_Status');

    if (!empty($dari) && !empty($sampai)) {
      $this->db->where('tbr.tgl_rental >=', $dari);
      $this->db->where('tbr.tgl_rental <=', $sampai);
    }
    return $this->db->get();
  }
}
