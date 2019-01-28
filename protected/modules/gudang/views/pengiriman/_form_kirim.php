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
      <input type="text" class="form-control" name="tujuan" readonly value="<?=@$tujuan?>" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Jarak</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="jarak" readonly value="<?=@$jarak?> meter" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Kendaraan</label>
    <div class="col-sm-6">
      <?php echo CHtml::dropDownList('listkendaraan', '',
                  $list_kendaraan,
                  array('empty' => '--Pilih Kendaraan--')); ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
