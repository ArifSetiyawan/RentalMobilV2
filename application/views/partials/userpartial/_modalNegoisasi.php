<div class="modal fade" id="modalNego" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_nego">Negoisasi Harga Rental Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="body_modalNego" style="font-size:14px">
        <div class="container-fluid">
          <form class="form-horizontal">
            <input class="col-md-7 form-control" type="hidden" name="id_rental" id="id_rental" />
            <div class="form-group align-items-center">
              <label>Harga Rental</label>
              <div>
                <input class="form-control col-md-10" name="hargaRental" id="hargaRental" value="<?php echo $trx['total_harga'] ?>" />
              </div>
            </div>
            <div class="form-group align-items-center">
              <label>Harga Negoisasi</label>
              <div>
                <input class="form-control col-md-10" name="hargaNego" id="hargaNego" />
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnSaveNego">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>