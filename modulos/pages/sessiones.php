<?php

//print tabla

$data_table = '';
if (!$_GET) {
$data_table = $mikrotik->print_sessions();
}
if ($_GET['table_search']) {
  $data_table = $mikrotik->print_sessions_search($_GET['table_search']);
}
if ($data_table) {

  $content_table = '';
  foreach ($data_table as $valores) {
    $content_table .= '
    <tr>
      <td>'.$valores['.id'].'</td>
      <td>'.$valores['user'].'</td>
      <td>'.$valores['calling-station-id'].'</td>
      <td>'.$valores['status'].'</td>
      <td>'.$valores['user-ip'].'</td>
      <td>'.$valores['nas-port-id'].'</td>
      <td>'.$valores['uptime'].'</td>
      </tr>
    ';
}

}else{
  $content_table = '';
  $content_table .= '
  <tr>
  <td>No hay datos</td>
  <td>No hay datos</td>
  <td>No hay datos</td>
  <td>No hay datos</td>
  <td>No hay datos</td>
  <td>No hay datos</td>
  <td>No hay datos</td>
  </tr>
  ';
}


  $content_body = '
  <div class="box-sessions">
  <h2 class="box-sessions-title">Sessiones de  Usuarios Conectados</h2>
  <div class="search">
      <form action="sessions.php">
          <input type="text" name="table_search" class="input-search" placeholder="Search">
          <button class="submit-search" type="submit"><span class="icon-magnifying-glass"></span></button>
      </form>
  </div>
  <div class="box-table">
      <table class="table-sessions">
          <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>MAC-ADDRES</th>
              <th>Status</th>
              <th>Ip-remota</th>
              <th>Puerto en host</th>
              <th>Tiempo activo</th>
          </tr>
          '.$content_table.'
      </table>
  </div>
</div>';


$mikrotik->disconnect();



 ?>
