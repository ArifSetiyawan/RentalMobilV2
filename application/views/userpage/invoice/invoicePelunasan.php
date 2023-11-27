<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Invoice Pelunasan Pembayaran</title>

  <style>
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }

    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }

    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    /** RTL **/
    .invoice-box.rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
      text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
      text-align: left;
    }
  </style>
</head>
<?php
function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<body>
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="2">
          <table>
            <tr>
              <td class="title">
                <img src="<?php echo 'assets/userpage/images/logo.png'; ?>" style="width: 100%; max-width: 300px" />
              </td>

              <td>
                Invoice Pelunasan Pembayaran<br />
                Created: <?= tgl_indo(date('Y-m-d')); ?><br />
                Due: <?= tgl_indo(date('Y-m-d')); ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="information">
        <td colspan="2">
          <table>
            <tr>
              <td>
                Pondok Cina, Kecamatan Beji.<br />
                Jl. H. M. Tohir, RT.2/RW.2<br />
                Kota Depok, Jawa Barat 16424
              </td>

              <td>
                Murifiya Rental Car.<br />
                The Car Rental Awesome<br />
                murifiya@gmail.com
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="heading">
        <td>Item</td>

        <td>Price</td>
      </tr>

      <tr class="item">
        <td>Biaya Survei</td>

        <td>Rp. <?php echo number_format($data_trx['biaya_survei'], 0, ',', '.'); ?></td>
      </tr>

      <tr class="item">
        <td>Biaya Antar</td>

        <td>Rp. <?php echo number_format($data_trx['biaya_antar'], 0, ',', '.'); ?></td>
      </tr>

      <tr class="item last">
        <td>Biaya Rental <?= $data_trx['nama_mobil'] ?></td>
        <?php
        $x = strtotime($data_trx['tgl_kembali']);
        $y = strtotime($data_trx['tgl_rental']);
        $jmlHari = abs(($x - $y) / (60 * 60 * 24));
        ?>
        <td><?= $jmlHari ?> X Rp. <?php echo number_format($data_trx['harga'], 0, ',', '.'); ?></td>
      </tr>

      <tr class="total">
        <td></td>

        <td>Total: Rp. <?php echo number_format($data_trx['total_harga'], 0, ',', '.'); ?></td>
      </tr>
      <tr class="heading">
        <td>Pembayaran DP</td>

        <td>Jumlah</td>
      </tr>

      <tr class="details">
        <td>DP yang sudah dibayarkan</td>

        <td>Rp. <?php echo number_format($data_trx['DP'], 0, ',', '.'); ?></td>
      </tr>

      <tr class="heading">
        <td>Pelunasan Pembayaran</td>

        <td>Jumlah</td>
      </tr>

      <tr class="details">
        <td>Biaya Pelunasan yang sudah dibayarkan</td>

        <td>Rp. <?php echo number_format(($data_trx['total_harga'] - $data_trx['DP']), 0, ',', '.'); ?></td>
      </tr>
    </table>
  </div>
</body>

</html>