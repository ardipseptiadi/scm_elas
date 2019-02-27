<?php

class PeramalanController extends Controller
{
	public function actionIndex()
	{
		$model = new Peramalan;
		if(isset($_POST[get_class($model)]))
			$model->attributes = $_POST[get_class($model)];
		// var_dump($_POST);
		$this->render('index',get_defined_vars());
	}

	public function actionCreate()
	{
		// $cek = Peramalan::model()->getDataPesananBulan('2019-01',1);
		// return $cek;
		$model = new Peramalan;

		if(isset($_POST['Peramalan'])){
			$post = $_POST['Peramalan'];
			$bln_ramal = $post['bln_ramal'];
			$bln_data = $post['bln_data'];
			$id_bahanbaku = $post['id_bahanbaku'];

			$bulanramal = '01-'.$bln_ramal;
			$daten = new DateTime($bulanramal);
			$daten->modify('-1 months');
			$date_end = $daten->format('m-Y');

			$data_pesanan=[];
			$listbulan = $this->periodeBulan($bln_data,$date_end);
			if(count($listbulan) == 1){
				$this->redirect(['index']);
			}
			foreach ($listbulan as $value) {
			  $get_data = Peramalan::model()->getDataPesananBulan($value,$id_bahanbaku);
			  if($get_data){
			    $data_pesanan[] = (int)$get_data;
			  }else{
			    $data_pesanan[] = 0;
			  }
			}
			if(!empty($data_pesanan)){
				$mPeramalan = new Peramalan;
			  $peramalan = $this->sem_MSE($data_pesanan);
				$mPeramalan->peramalan = $bln_ramal;
				$mPeramalan->data_mulai = $bln_data;
				$mPeramalan->hasil = $peramalan;
				$mPeramalan->id_bahanbaku = $id_bahanbaku;
			  if($mPeramalan->save()){
			    $this->redirect(['index']);
			  }
			}
				$this->redirect(['index']);
		}
		$produk = BahanBaku::model()->findAll(array('order' => 'nama'));
    $list_produk = CHtml::listData($produk,'id_bahanbaku', 'nama');

		$this->render('create',get_defined_vars());
	}

	private function periodeBulan($date1,$date2)
	{
	  //format YYYY-MM
	  $date1 = explode('-',$date1);
	  $bln1 = $date1[0];
	  $thn1 = $date1[1];
	  $date2 = explode('-',$date2);
	  $bln2 = $date2[0];
	  $thn2 = $date2[1];
	  $hasil = [];

	  if($thn1 < $thn2){
	    $jmlbln = 12 - $bln1 + 1 + $bln2;
	    for($i=$bln1;$i<=12;$i++){
	      $hasil[] = $thn1.'-'.$i;
	    }
	    for($i=1;$i<=$bln2;$i++){
	      $hasil[] = $thn2.'-'.$i;
	    }
	  }elseif($thn1 == $thn2){
	    $jmlbln = $bln2 - $bln1 + 1;
	    for($i=$bln1;$i<=$bln2;$i++){
	      $hasil[] = $thn1.'-'.$i;
	    }
	  }
	  return $hasil;

	}

	private function singleExpo($data, $alpha, $numForecasts)
	{
	  $y = array();
	  $y[0] = 0;
	  $y[1] = $data[0];
	  $i = 2;
	  for ($i=2;$i<count($data);$i++)
	  {
	    $y[$i] = $alpha * $data[$i-1] + (1 - $alpha) * $y[$i-1];
	  }
	  for ($j=0;$j<$numForecasts;$j++)
	  {
	    $y[$i] = $alpha * $data[count($data)-1] + (1-$alpha) * $y[$i-1];
	    $i++;
	  }

	  return $y;
	}

	private function sem_MSE($data)
	{
		$alpha = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9);
		$numForecasts = 1;
	  foreach($alpha as $key => $value)
	  {
			$mse=[];
	    for($k = 1;$k<count($data);$k++)
	    {
	      $temp = $data[$k] - $this->singleExpo($data,$value,$numForecasts)[$k];
	      $mse[$k] = pow($temp,2);
	    }
	    $ja["$value"] = $this->singleExpo($data,$value,$numForecasts)[$k];
	    $sum = array_sum($mse);
	    $jt["$value"] = $sum / count($data);
	  }
	  $cari =array_keys($jt,min($jt));
	  $hasil= $ja[$cari[0]];
	  return $hasil;
	}

	public function actionUpdate($id)
	{
		$mPeramalan = Peramalan::model()->findByPk($id);
		$bulanramal = '01-'.$mPeramalan->peramalan;
		$daten = new DateTime($bulanramal);
		$daten->modify('-1 months');
		$date_end = $daten->format('m-Y');

		$data_pesanan=[];
		$listbulan = $this->periodeBulan($mPeramalan->data_mulai,$date_end);
		if(count($listbulan) == 1){
			$this->redirect(['index']);
		}


		foreach ($listbulan as $value) {
			$get_data = Peramalan::model()->getDataPesananBulan($value,$mPeramalan->id_bahanbaku);
			if($get_data){
				$data_pesanan[] = (int)$get_data;
			}else{
				$data_pesanan[] = 0;
			}
		}
		if(!empty($data_pesanan)){
			$peramalan = $this->sem_MSE($data_pesanan);
			$mPeramalan->hasil = $peramalan;
			if($mPeramalan->update()){
				$this->redirect(['index']);
			}
		}
		$this->redirect(['index']);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
