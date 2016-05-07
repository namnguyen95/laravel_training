<?php 
// Pull in the NuSOAP
require_once('lib/nusoap.php');
// Create server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('Service', 'urn:Service');
// Character encoding
$server->soap_defencoding = 'utf-8';
/*-------------------*/
// Registrations of our functions
$server->register('TongHaiSo',
					array('a'=>'xsd:int', 'b'=>'xsd:int'),
					array('tong'=>'xsd:int'),
					'urn:Servicewsdl',
					'urn:Servicewsdl#TongHaiSo',
					'rpc',
					'literal',
					'Tong Hai So');

$server->register('Chao',
					array('a'=>'xsd:string'),
					array('LoiChao'=>'xsd:string'),
					'urn:Servicewsdl',
					'urn:Servicewsdl#Chao',
					'rpc',
					'literal',
					'Chao ');
$server->register('MonAnTrongNgay',
					array(),
					array('ds_mon_an'=>'xsd:xml'),
					'urn:Servicewsdl',
					'urn:Servicewsdl#MonAnTrongNgay',
					'rpc',
					'literal',
					'MonAnTrongNgay');
// end function

// Our web service functions will be here
function MonAnTrongNgay(){
	$pdo 		= new PDO('mysql:host=localhost;dbname=nha_hang','root','');
	$stament 	= $pdo->prepare('SELECT * FROM mon_an WHERE trong_ngay=1');
	$stament->excute();
	$danhsach   = $stament->fetchAll(PDO::FETCH_OBJ);
	$xml 		= "123";
	

	return $xml;
}
function Chao($name){
	if (isset($name)) {
		return 'Chào '.$name;
	}
}
function TongHaiSo($a, $b){
	if(is_numeric($a) && is_numeric($b)){
		$respone = $a + $b;
		return $respone;
	}else{
		return "";
	}
}
// ---------------------------------------------------------------------------
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
// ---------------------------------------------------------------------------


 ?>