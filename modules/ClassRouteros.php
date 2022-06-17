<?php
$con_query_router = "SELECT * FROM routers";
 $con_response_router = mysqli_query($con, $con_query_router);

 $cont_array_query = mysqli_fetch_assoc($con_response_router);

 // $cont_array_query['ip'], $cont_array_query['user'], $cont_array_query['pass']



 ?>
