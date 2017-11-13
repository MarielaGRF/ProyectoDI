<?php
include('config.php');
$type = $_POST['type'];
if($type == 'new'){
	$startdate = $_POST['startdate'].'+'.$_POST['zone'];
	$title = $_POST['title'];
	$insert = mysqli_query($con,"INSERT INTO calendario_juntas(`title`, `startdate`, `enddate`, `allDay`, `escuela_id`,`Profesor_id`) VALUES('$title','$startdate','$startdate','false', '1','1')");
	$lastid = mysqli_insert_id($con);
	echo json_encode(array('status'=>'success','eventid'=>$lastid));
}
if($type == 'changetitle'){
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$PROFESORES = $_POST['profesor_id'];	//pendiente
	$ESCUELAS = $_POST['escuela_id'];	//pendiente
	$update = mysqli_query($con,"UPDATE calendario_juntas SET title='$title', escuela_id='1', Profesor_id='1' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}
if($type == 'resetdate'){
	$title = $_POST['title'];
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	$eventid = $_POST['eventid'];
	$update = mysqli_query($con,"UPDATE calendario_juntas SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}
if($type == 'remove'){
	$eventid = $_POST['eventid'];
	$delete = mysqli_query($con,"DELETE FROM calendario_juntas where id='$eventid'");
	if($delete)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}
if($type == 'fetch'){
	$events = array();
	$query = mysqli_query($con, "SELECT * FROM calendario_juntas");
	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$e = array();
		$e['id'] = $fetch['id'];
		$e['title'] = $fetch['title'];
		$e['start'] = $fetch['startdate'];
		$e['end'] = $fetch['enddate'];
		$allday = ($fetch['allDay'] == "true") ? true : false;
		$e['allDay'] = $allday;
		array_push($events, $e);
	}
	echo json_encode($events);
}
?>
