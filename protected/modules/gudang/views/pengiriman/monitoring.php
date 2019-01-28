<?php
/* @var $this PemesananController */

$this->breadcrumbs=array(
	'Pengiriman',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Pengiriman</h3>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Monitoring Pengiriman
		</div>
		<div>
			<?php
				$this->widget('HarapanBaruGrid',array(
					'id' => 'list_kiriman',
					'dataProvider' => $providerKiriman,
					'columns' => array(
						'no_pengiriman',
						'idPesanan.no_order',
						'idKendaraan.no_polisi',
						'tujuan',
					)
				));
			 ?>
		</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Proses Pesanan</h4>
      </div>
      <div class="modal-body">
        <!-- <div id="prosesPengiriman"></div> -->
				<form class="form form-horizontal" id="form-proses-kirim">
					<div class="form-group">
						<label class="control-label col-sm-2">No Pengiriman</label>
						<div class="col-sm-4">
							<input type="text" id="field_no_pengiriman" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">No Order</label>
						<div class="col-sm-4">
							<input type="text" id="field_no_order" readonly/>
						</div>
					</div>
					<div class="form-group" style="display:none">
						<label class="control-label col-sm-2">Pilih</label>
						<div class="col-sm-4">
							<select class="form-control">
								<option>--Pilih--</option>
								<option>1</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Tanggal Kirim</label>
						<div class="col-sm-4">
							<input type="text" class="form-control tgl_form" name="tgl_kirim"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Tujuan</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="tujuan_kirim"/>
						</div>
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="submitKirim">Kirim</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
Yii::app()->clientScript->registerScript('pengirimanPopup', '
		$(document).ready(function(){
			$(".tgl_form").datepicker({
	    	orientation:"bottom",
	    	autoclose:true,
	    	format:"yyyy-mm-dd"
	    });
			$(\'#btnKirim\').click(function(){
				var val = $(this).data("id");
				// var html_pop = $(\'#prosesPengiriman\');
				$.ajax({
					type: \'GET\',
					dataType: \'JSON\',
					data: {
							id: val,
					},
					url: window.location.origin + \'/gudang/pengiriman/getDataPesanan\',
					beforeSend: function(){
					},
					success:  function(response){
						// html_pop.html(response);
						if(response.status == true){
							var no_order = response.pesanan.no_order;
							var no_kirim = response.pengiriman.no_pengiriman;
						}
						$(\'#field_no_pengiriman\').attr("value",no_kirim);
						$(\'#field_no_order\').attr("value",no_order);
					}
				});
	    });

			$(\'#submitKirim\').click(function(){
				var dataform = $(\'#form-proses-kirim\').serialize();
				console.log(dataform);
			});
		});
');
 ?>
