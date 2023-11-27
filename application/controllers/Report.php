<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Master', 'model_master');
    $this->load->model('Reporting', 'model_report');
    $this->load->model('Trxpinjam', 'model_trx');
    $this->load->library('template');
    $this->load->library('pdf');
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

  public function reportTransaksi()
  {

    $this->validate_user();

    $data = array(
      'title' => "Report Transaksi Murifiya Rental",
      'active_menu' => 'Report Transaksi Murifiya Rental',
      'prev_menu' => 'Home',
      'data_pinjam' => $this->model_report->tampilLaporanPerTgl(),

    );

    $this->template->loadx('master', 'laporan/reportTransaksi', $data);
  }
  public function reportPendapatan()
  {

    $this->validate_user();

    $data = array(
      'title' => "Report Pendapatan Murifiya Rental",
      'active_menu' => 'Report Pendapatan Murifiya Rental',
      'prev_menu' => 'Home',
      'data_pinjam' => $this->model_report->tampilLaporanPerTgl()

    );

    $this->template->loadx('master', 'laporan/reportPendapatan', $data);
  }

  public function printReportTransaksi()
  {
    $data['title'] = 'Laporan Transaksi';
    $data['data_pinjam'] = $this->model_report->reportingTransaksi()->result_array();
    $this->pdf->setFileName('Report_Transaksi.pdf');
    $this->pdf->setPaper('A4', 'Landscape');
    $this->pdf->loadView('laporan/printTransaksi', $data);
  }
  public function printReportPendapatan()
  {
    $data['title'] = 'Laporan Transaksi';
    $data['data_pinjam'] = $this->model_report->reportingTransaksi()->result_array();
    $data['total_pendapatan'] = $this->model_report->reportingTransaksi()->row_array();

    $this->pdf->setFileName('Report_Transaksi.pdf');
    $this->pdf->setPaper('A4', 'Landscape');
    $this->pdf->loadView('laporan/printPendapatan', $data);
  }
  public function printInvoiceDP($id)
  {
    $data['title'] = 'Laporan Transaksi';
    $data['data_trx'] = $this->model_trx->getJoinTrx('', $id, '')->row_array();
    $this->pdf->setFileName('Invoice_DP.pdf');
    $this->pdf->setPaper('A4', 'Landscape');
    $this->pdf->loadView('userpage/invoice/invoiceDP', $data);
  }
  public function printInvoicePelunasan($id)
  {
    $data['title'] = 'Laporan Transaksi';
    $data['data_trx'] = $this->model_trx->getJoinTrx('', $id, '')->row_array();
    $this->pdf->setFileName('Invoice_Pelunasan.pdf');
    $this->pdf->setPaper('A4', 'Landscape');
    $this->pdf->loadView('userpage/invoice/invoicePelunasan', $data);
  }
  public function printInvoiceDenda($id)
  {
    $data['title'] = 'Laporan Transaksi';
    $data['data_trx'] = $this->model_trx->getJoinTrx('', $id, '')->row_array();
    $this->pdf->setFileName('Invoice_Denda.pdf');
    $this->pdf->setPaper('A4', 'Landscape');
    $this->pdf->loadView('userpage/invoice/invoiceDenda', $data);
  }
}
