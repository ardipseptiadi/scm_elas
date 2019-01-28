
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Rute Terdekat</h3>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data pesanan berdasarkan data jarak pelanggan
		</div>
    <div>
      <?php
      $this->widget('HarapanBaruGrid',array(
					'id' => 'dt-grid',
					'dataProvider' => $dt,
					'summaryText' => false,
					'columns' => array(
						array(
							'name' => 'Pesanan',
							'type' => 'raw',
							'value' => 'CHtml::encode($data["pesanan"])',
						),
						array(
							'name' => 'Pelanggan',
							'type' => 'raw',
							'value' => 'CHtml::encode($data["pelanggan"])',
						),
						array(
							'name' => 'Jarak',
							'type' => 'raw',
							'value' => 'CHtml::encode($data["jarak"])',
						),
						array(
							'name' => 'Ranking',
							'type' => 'raw',
							'value' => 'CHtml::encode($data["ranking"])',
						),
					),
			)); ?>
    </div>
</div>
</div>
