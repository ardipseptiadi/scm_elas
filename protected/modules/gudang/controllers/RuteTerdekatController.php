<?php

class RuteTerdekatController extends Controller
{
	public function init()
	{
		Yii::import('application.modules.admin.models.*');
		Yii::import('application.modules.pemasaran.models.*');
	}
  public function actionIndex()
  {
    $list_pesanan = Pesanan::model()->with('idPelanggan')->findAll(['condition'=>'t.is_deleted =0','order'=>'idPelanggan.jarak']);
    $arr_pesanan = [];
    $i = 1;
    foreach ($list_pesanan as $key => $pesanan) {
      array_push($arr_pesanan,[
        'id' => $key,
        'ranking' => $i,
        'pesanan' => $pesanan->no_order,
        'pelanggan' => $pesanan->idPelanggan->nama,
        'jarak' =>  $pesanan->idPelanggan->jarak,
        ]);
        $i++;
    }
    // $arr_pesanan = [['id'=>1,'ranking'=>1,'pesanan'=>'PSN/01','pelanggan'=>'Asep','jarak'=>1000]];
    $dt = new CArrayDataProvider($arr_pesanan,array(
							'keyField'=>'id'
						));
    $this->render('index',get_defined_vars());
  }
}
