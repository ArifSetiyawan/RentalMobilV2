<script src="<?php echo base_url(); ?>assets/userpage/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery.stellar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/aos.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/jquery.timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/scrollax.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatable/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/userpage/js/main.js"></script>

<script>
  $(document).ready(function() {
    $.extend($.fn.dataTable.defaults, {
      responsive: true,
    });

    $("#data-trx").DataTable({});

    $("#datepicker2").datepicker({
      dateFormat: "dd/mm/yy",
      minDate: new Date()
    });
    $("#datepicker3").datepicker({
      dateFormat: "dd/mm/yy",
    });
  });
</script>
<script type="text/javascript">
  $(".custom-file-input").on("change", function() {
    var file = $(this)[0].files[0];
    $(this).next(".custom-file-label").text(file.name);
    this.value.replace("C:\\fakepath\\", "");
  });
  $('#datepicker2').change(function(e) {
    let valPicker = this.value
    if (this.value != '') {
      $('#datepicker3').removeAttr('disabled')
      $("#datepicker3").datepicker("option", "minDate", new Date(parseDate(this.value).getTime() + 3 * 24 * 60 * 60 * 1000))
    } else {
      $('#datepicker3').prop('disabled', 'disabled')
    }
    $('#datepicker3').change(function(e) {
      if (valPicker != '' && this.value != '') {
        totalPrice(valPicker, this.value)
      }

    });
  });
  $('#layananRental').change(function(e) {
    if (this.value == 2) {
      $("#bSupir").removeAttr('hidden')
    } else {
      $("#bSupir").prop('hidden', 'hidden')

    }

  });

  function totalPrice(date1 = '', date2 = '') {
    let total;
    let layanan = $("#layananRental").val();
    let day = datediff(parseDate(date1), parseDate(date2));
    let harga = $("#harga").val().replace('.', '') * day;
    let biayaAntar = $("#biayaAntar").val().replace('.', '');

    if ($("#biayaSurvey").val() != undefined) {
      let biayaTambahan = $("#biayaSurvey").val().replace('.', '');
      total = (parseInt(harga) + parseInt(biayaTambahan) + parseInt(biayaAntar))
    } else {
      total = (parseInt(harga) + parseInt(biayaAntar))
    }
    console.log($("#harga").val().replace('.', ''))
    if (layanan == 2) {
      total += parseInt($("#biayaSupir").val().replace('.', ''))
    }
    let rupiahFormat = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    $("#totalHarga").val(rupiahFormat)
  }


  function datediff(first, second) {
    return Math.round((second - first) / (1000 * 60 * 60 * 24));
  }

  function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[1] - 1, mdy[0]);
  }
</script>
<?php if ($this->session->flashdata('success')) : ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal("Success!", "<?php echo $_SESSION['success'] ?>", "success");
    });
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal("", "<?php echo $_SESSION['error'] ?>", "error");
    });
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('warning')) : ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal("", "<?php echo $_SESSION['warning'] ?>", "warning");
    });
  </script>
<?php endif; ?>
<?php if ($this->session->flashdata('info')) : ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal("Info!", "<?php echo $_SESSION['info'] ?>", "info");
    });
  </script>
<?php endif; ?>