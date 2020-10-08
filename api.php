<?php

include ('conn.php');
$myArray=array();
$myRow=array();

if (empty($_POST['iload'])){
    $vlimit=1;
} else {
    $vlimit=$_POST['iload'];
}

if (isset($_POST['oset'])){
    $oset=$_POST['oset'];
} else {
    $oset=0;
}

$myArray['vlimit']=$vlimit;
$myArray['oset']=$oset;

$query="SELECT * FROM `lore` WHERE 1 ORDER By id ASC LIMIT ".$vlimit." OFFSET ".$oset;
$myArray['query']=$query;
$result=$link->query($query);

while ($row = $result->fetch_array()){
    $myRow[]=array(
        "id"=>$row['id'],
        "content"=>$row['content'],
        "date"=>$row['date']
    );
}

$myArray['content']=$myRow;
echo json_encode($myArray);