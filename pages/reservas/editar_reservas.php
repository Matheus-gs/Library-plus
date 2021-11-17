<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM reserva WHERE aluno_id_aluno='{$id}'");
  // 
  print "<script type='text/javascript'>location.href='?page=listar_reservas';</script>";
}
?>