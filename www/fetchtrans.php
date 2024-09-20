<?php

$con=mysqli_connect('db','root','hindikoalam','portal')
    or die("connection failed".mysqli_errno());
    $con->set_charset("utf8");
$request=$_REQUEST;
$col =array(
    0   =>  'id',
    1   =>  'box_no',
    2   =>  'date_created',
    3   =>  'date_sent',
    4   =>  'date_rcv',
    5   =>  'courier',
    6   =>  'province',
    7   =>  'status',
    
);  //create column like table in database

$sql ="select * from box_db WHERE status = 'IN TRANSIT'";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="select * from box_db WHERE status = 'IN TRANSIT' AND 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '%".$request['search']['value']."%' ";
    $sql.=" OR box_no Like '%".$request['search']['value']."%' ";
    $sql.=" OR date_created Like '%".$request['search']['value']."%' ";
    $sql.=" OR date_sent Like '%".$request['search']['value']."%' ";
    $sql.=" OR date_rcv Like '%".$request['search']['value']."%' ";
    $sql.=" OR courier Like '%".$request['search']['value']."%' ";
    $sql.=" OR province Like '%".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."  ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0];
    $subdata[]=$row[1];
    $subdata[]=$row[2];
    $subdata[]=$row[3];
    $subdata[]=$row[4];
    $subdata[]=$row[5];
    $subdata[]=$row[6];
    $subdata[]=$row[7];
    
    if($row[7]=='IN TRANSIT'){
    
    $subdata[]='<a id="view_list" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="fas fa-list"></i>VIEW LIST</a><a id="rcvbox" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="fas fa-folder-plus"></i>RECEIVE BOX</a>';
    } 
    $data[]=$subdata;

}


$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>