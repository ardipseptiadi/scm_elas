<form class="form form-horizontal" action="/gudang/pengiriman/getFormPengiriman?id=<?=$id?>" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2">No Pesanan</label>
    <div class="col-sm-6">
      <input type="text" disabled="true" class="form-control" value="<?=@$no_pesanan?>"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">No Pengiriman</label>
    <div class="col-sm-6">
      <input type="text" readonly="true" class="form-control" name="no_kirim" value="<?=@$no_kiriman?>"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tujuan</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="tujuan" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ekspedisi</label>
    <div class="col-sm-6">
      <?php echo CHtml::dropDownList('listekspedisi', '',
                  $list_ekspedisi,
                  array('empty' => '--Pilih Ekspedisi--')); ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
