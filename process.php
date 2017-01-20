<?php
require_once('idmore.php');
$IdmoreRO = new IdmoreRO();
if(isset($_GET['act'])):
	switch ($_GET['act']) {
		case 'showprovince':
			$province = $IdmoreRO->showProvince();
			echo $province;
		break;
		
		case 'showcity':
			$idprovince = $_GET['province'];
			$city = $IdmoreRO->showCity($idprovince);
			echo $city;
		break;
		
		case 'cost':
			$origin = 19;
			$destination = $_GET['destination'];
			$weightingrams = $_GET['weight'];
			$weight = $weightingrams * 1000;
			$courier = $_GET['courier'];
			echo $destination;
			$cost = $IdmoreRO->hitungOngkir($origin,$destination,$weight,$courier);
			//parse json
			$costarray = json_decode($cost);
			$results = $costarray->rajaongkir->results;
			if(!empty($results)):
				foreach($results as $r):
					foreach($r->costs as $rc):
						foreach($rc->cost as $rcc):
							echo "<tr><td>$r->code</td><td>$rc->service</td><td>$rc->description</td><td>$rcc->etd</td><td>".number_format($rcc->value)."</td></tr>";
						endforeach;
					endforeach;
				endforeach;
			endif;
	//end of parse json
		break;
		
		case 'getcost':
			$origin = $_GET['origin'];
			$destination = $_GET['destination'];
			$weightingrams2 = $_GET['weight'];
			$weight = $weightingrams2 * 1000;
			$courier = $_GET['courier'];
			$cost = $IdmoreRO->hitungOngkir($origin,$destination,$weight,$courier);
			//parse json
			error_reporting(0);
			$costarray = json_decode($cost);
			$results = $costarray->rajaongkir->results;
			$kurirkota = 10000;
		// print_r($results);
		if($destination == 19){
			echo '
				<label><input onclick="totalOngkir();postdata();" type="radio" id="pilihpaket" name="pilihpaket" value="10000"> <b>Kurir Dalam Kota : Rp.'.number_format($kurirkota,2,",",".").'</b></label>';
		}elseif(!empty($results)){
			foreach($results as $r):
				foreach($r->costs as $rc):
					foreach($rc->cost as $rcc):
						echo '
				<label><input onclick="totalOngkir();postdata();" type="radio" id="pilihpaket" name="pilihpaket" value="'.$rcc->value.'"> <b>'.$rc->service.' : Rp.'.number_format($rcc->value,2,",",".").'</b></label>';
					endforeach;
				endforeach;
			endforeach;
		}else{
			echo 'paket tidak tersedia';
		}
//end of parse json
		break;
		default:
		echo 'aksi tidak tersedia';
		break;
	}
	endif;
