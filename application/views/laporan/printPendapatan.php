<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>

  <style type="text/css">
    h1,
    h3,
    h4,
    h5,
    h6 {
      text-align: center;
    }

    .keclogo {
      font-size: 24px;
      font-size: 3vw;
    }

    .garis1 {
      border-top: 2px solid black;
      height: 2px;
      border-bottom: 1px solid black;
    }


    .table {
      width: 100%;
      margin-bottom: 1rem;
      /* color: #858796; */
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #e3e6f0;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #e3e6f0;
    }

    .table tbody+tbody {
      border-top: 2px solid #e3e6f0;
    }

    .table-sm th,
    .table-sm td {
      padding: 0.3rem;
    }

    .table-bordered {
      border: 1px solid #e3e6f0;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #e3e6f0;
    }

    .table-bordered thead th,
    .table-bordered thead td {
      border-bottom-width: 2px;
    }

    .table-borderless th,
    .table-borderless td,
    .table-borderless thead th,
    .table-borderless tbody+tbody {
      border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
      color: #858796;
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary>th,
    .table-primary>td {
      background-color: #cdd8f6;
    }

    .table-primary th,
    .table-primary td,
    .table-primary thead th,
    .table-primary tbody+tbody {
      border-color: #a3b6ee;
    }

    .table-hover .table-primary:hover {
      background-color: #b7c7f2;
    }

    .table-hover .table-primary:hover>td,
    .table-hover .table-primary:hover>th {
      background-color: #b7c7f2;
    }

    .table-secondary,
    .table-secondary>th,
    .table-secondary>td {
      background-color: #dddde2;
    }

    .table-secondary th,
    .table-secondary td,
    .table-secondary thead th,
    .table-secondary tbody+tbody {
      border-color: #c0c1c8;
    }

    .table-hover .table-secondary:hover {
      background-color: #cfcfd6;
    }

    .table-hover .table-secondary:hover>td,
    .table-hover .table-secondary:hover>th {
      background-color: #cfcfd6;
    }

    .table-success,
    .table-success>th,
    .table-success>td {
      background-color: #bff0de;
    }

    .table-success th,
    .table-success td,
    .table-success thead th,
    .table-success tbody+tbody {
      border-color: #89e2c2;
    }

    .table-hover .table-success:hover {
      background-color: #aaebd3;
    }

    .table-hover .table-success:hover>td,
    .table-hover .table-success:hover>th {
      background-color: #aaebd3;
    }

    .table-info,
    .table-info>th,
    .table-info>td {
      background-color: #c7ebf1;
    }

    .table-info th,
    .table-info td,
    .table-info thead th,
    .table-info tbody+tbody {
      border-color: #96dbe4;
    }

    .table-hover .table-info:hover {
      background-color: #b3e4ec;
    }

    .table-hover .table-info:hover>td,
    .table-hover .table-info:hover>th {
      background-color: #b3e4ec;
    }

    .table-warning,
    .table-warning>th,
    .table-warning>td {
      background-color: #fceec9;
    }

    .table-warning th,
    .table-warning td,
    .table-warning thead th,
    .table-warning tbody+tbody {
      border-color: #fadf9b;
    }

    .table-hover .table-warning:hover {
      background-color: #fbe6b1;
    }

    .table-hover .table-warning:hover>td,
    .table-hover .table-warning:hover>th {
      background-color: #fbe6b1;
    }

    .table-danger,
    .table-danger>th,
    .table-danger>td {
      background-color: #f8ccc8;
    }

    .table-danger th,
    .table-danger td,
    .table-danger thead th,
    .table-danger tbody+tbody {
      border-color: #f3a199;
    }

    .table-hover .table-danger:hover {
      background-color: #f5b7b1;
    }

    .table-hover .table-danger:hover>td,
    .table-hover .table-danger:hover>th {
      background-color: #f5b7b1;
    }

    .table-light,
    .table-light>th,
    .table-light>td {
      background-color: #fdfdfe;
    }

    .table-light th,
    .table-light td,
    .table-light thead th,
    .table-light tbody+tbody {
      border-color: #fbfcfd;
    }

    .table-hover .table-light:hover {
      background-color: #ececf6;
    }

    .table-hover .table-light:hover>td,
    .table-hover .table-light:hover>th {
      background-color: #ececf6;
    }

    .table-dark,
    .table-dark>th,
    .table-dark>td {
      background-color: #d1d1d5;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th,
    .table-dark tbody+tbody {
      border-color: #a9aab1;
    }

    .table-hover .table-dark:hover {
      background-color: #c4c4c9;
    }

    .table-hover .table-dark:hover>td,
    .table-hover .table-dark:hover>th {
      background-color: #c4c4c9;
    }

    .table-active,
    .table-active>th,
    .table-active>td {
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover {
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover>td,
    .table-hover .table-active:hover>th {
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table .thead-dark th {
      color: #fff;
      background-color: #5a5c69;
      border-color: #6c6e7e;
    }

    .table .thead-light th {
      color: #6e707e;
      background-color: #eaecf4;
      border-color: #e3e6f0;
    }

    .table-dark {
      color: #fff;
      background-color: #5a5c69;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th {
      border-color: #6c6e7e;
    }

    .table-dark.table-bordered {
      border: 0;
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(255, 255, 255, 0.05);
    }

    .table-dark.table-hover tbody tr:hover {
      color: #fff;
      background-color: rgba(255, 255, 255, 0.075);
    }

    @media (max-width: 575.98px) {
      .table-responsive-sm {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .table-responsive-sm>.table-bordered {
        border: 0;
      }
    }

    @media (max-width: 767.98px) {
      .table-responsive-md {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .table-responsive-md>.table-bordered {
        border: 0;
      }
    }

    @media (max-width: 991.98px) {
      .table-responsive-lg {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .table-responsive-lg>.table-bordered {
        border: 0;
      }
    }

    @media (max-width: 1199.98px) {
      .table-responsive-xl {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .table-responsive-xl>.table-bordered {
        border: 0;
      }
    }

    .table-responsive {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }

    .table-responsive>.table-bordered {
      border: 0;
    }
  </style>
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
</head>

<body>
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-9">
      <h1 class="keclogo"><strong>MURIFIYA RENTAL CAR</strong></h1>
      <h4 style="font-family: 'Courier New', Courier, monospace;">Jl. H. M. Tohir, RT.2/RW.2, Pondok Cina, Kecamatan Beji, Kota Depok</h4>
      <h4 style="font-family: 'Courier New', Courier, monospace;">No. Telepon: +62 859 1027 92737</h4>
      <h4 style="font-family: 'Courier New', Courier, monospace;">Email: muhamadarief251@gmail.com</h4>
    </div>
  </div>
  <div class="container">
    <hr class="garis1" />
    <div>
      <h4 style="font-family: 'Times New Roman', Times, serif;"><strong><u> LAPORAN PENDAPATAN MURIFIYA RENTAL CAR </u></strong></h4>
    </div>
    <div>
      <h5 style="text-align: left; word-spacing: 1px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Tanggal Cetak: <?= tgl_indo(date('Y-m-d')); ?></h5>
    </div>
    <div class="table-responsive-sm">
      <table class="table table-bordered" width="100%" border="1" cellspacing="0">
        <thead class="table-secondary">
          <tr>
            <th>NO #</th>
            <th>Nama Customer</th>
            <th>Nama Mobil </th>
            <th>Layanan</th>
            <th>Tgl Rental</th>
            <th>Tgl Selesai</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($data_pinjam) { ?>
            <?php
            $no = 0;
            $subTotal = 0;
            foreach ($data_pinjam as $pinjam) {
            ?>
              <tr>
                <td><?php echo $no = $no + 1 ?></td>
                <td><?php echo $pinjam['nama'] ?></td>
                <td><?php echo $pinjam['nama_mobil'] ?></td>
                <td><?php echo $pinjam['namaLayanan'] ?></td>
                <td><?php echo $pinjam['tgl_rental'] ?></td>
                <td><?php echo $pinjam['tgl_kembali'] ?></td>
                <td>Rp. <?php echo number_format($pinjam['total_harga'], 0, ',', '.'); ?></td>

              </tr>
            <?php } ?>

          <?php } ?>


        </tbody>
        <tfoot>
          <tr>
            <td colspan="6" style="text-align: center;">Total Pendapatan Rental</td>
            <td>Rp. <?php echo number_format($total_pendapatan['subTotal'], 0, ',', '.'); ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</body>

</html>