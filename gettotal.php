<?php
require_once('idmore.php');
$IdmoreRO = new IdmoreRO();
print_r($_POST);//get post data
$data = $_POST;
echo '<br/>';
$cost = $IdmoreRO->hitungOngkir($data['oricity'],$data['descity'],$data['weight'],$data['service']);
//parse json
$costarray = json_decode($cost);
$results = $costarray->rajaongkir->results;
// print_r($results);
if(!empty($results)){
	foreach($results as $r):
		foreach($r->costs as $rc):
			foreach($rc->cost as $rcc):
				echo '<label>'.$r->code.'<br/>'.$rc->service.'<br/>'.$rc->description.' Rp.'.number_format($rcc->value).'</label><br/>';
			endforeach;
		endforeach;
	endforeach;
}else{
	echo 'paket tidak tersedia';
}