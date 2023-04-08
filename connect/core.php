<?php
date_default_timezone_set("Asia/Jakarta");
function hari($hariini){
	$semingu = array(
		"Minggu",
		"Senin",
		"Selasa",
		"Rabu",
		"Kamis",
		"Jum'at",
		"Sabtu"
	);

	return $semingu[$hariini];
}
function bulan($bln){
	if ($bln == "01") {
		return "Januari";
	} else if ($bln == "0") {

	} else if ($bln == "02") {
		return "Februari";
	} else if ($bln == "03") {
		return "Maret";
	} else if ($bln == "04") {
		return "April";
	} else if ($bln == "05") {
		return "Mei";
	} else if ($bln == "06") {
		return "Juni";
	} else if ($bln == "07") {
		return "Juli";
	} else if ($bln == "08") {
		return "Agustus";
	} else if ($bln == "09") {
		return "September";
	} else if ($bln == "10") {
		return "Oktober";
	} else if ($bln == "11") {
		return "November";
	} else if ($bln == "12") {
		return "Desember";
	}
}
function tglskrg($tgl){
	$tanggal	= substr($tgl, 8, 2);
	$bulan		= bulan(substr($tgl, 5, 2));
	$tahun 		= substr($tgl, 0, 4);

	return $tanggal. ' '.$bulan.' '.$tahun;
}
function get($sql){
	global $link;

	if ($x = mysqli_query($link, $sql) or die(mysqli_error($link))) {
		return $x;
	}
}

function run($sql){
	global $link;

	if (mysqli_query($link, $sql) or die("Query failed to Execute! : ".mysqli_error($link))) {
		return TRUE;
	} else {
		return FALSE;
	}
}
function select($column, $table, $params=NULL){
	if ($params != NULL) {
		$sql = "SELECT $column FROM $table WHERE $params ";
	} else {
		$sql = "SELECT $column FROM $table ";
	}

	return get($sql);
}

function insert($table, $column, $values){
	$sql = "INSERT INTO $table ($column) VALUES ($values)";

	return run($sql);
}

function update($table, $data, $params){
	$sql = "UPDATE $table SET $data WHERE $params ";

	return run($sql);
}

function delete($table, $id=NULL, $params = NULL){
	if ($params != NULL) {
		$sql = "DELETE FROM $table WHERE $params ";
	}
	if ($id != NULL) {
		$sql = "DELETE FROM $table WHERE id = '$id' ";
	}

	return run($sql);
}
function jam(){
	$items = array(
		"00",
		"01",
		"02",
		"03",
		"04",
		"05",
		"06",
		"07",
		"08",
		"09",
		"10",
		"11",
		"12",
		"13",
		"14",
		"15",
		"16",
		"17",
		"18",
		"19",
		"20",
		"21",
		"22",
		"23"
	);

	return $items;
}
function menit(){
	$mnt = array(
		"00",
		"01",
		"02",
		"03",
		"04",
		"05",
		"06",
		"07",
		"08",
		"09",
		"10",
		"11",
		"12",
		"13",
		"14",
		"15",
		"16",
		"17",
		"18",
		"19",
		"20",
		"21",
		"22",
		"23",
		"24",
		"25",
		"26",
		"27",
		"28",
		"29",
		"30",
		"31",
		"32",
		"33",
		"34",
		"35",
		"36",
		"37",
		"38",
		"39",
		"40",
		"41",
		"42",
		"43",
		"44",
		"45",
		"46",
		"47",
		"48",
		"49",
		"50",
		"51",
		"52",
		"53",
		"54",
		"55",
		"56",
		"57",
		"58",
		"59"
	);

	return $mnt;
}
?>