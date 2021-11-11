<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM atendente WHERE id_atendente=" . $id);
  // 
  print "<script type='text/javascript'>location.href='?page=listar_atendentes';</script>";
}
?>

<?php
echo ('
<section id="editar" class="tela-cadastrar formulario">


  <h1 class=" h1-title">Editar Atendentes</h1>

  <form method="POST" class="meu-formulario">

    <input type="hidden" name="cadastrar_atendente">

    <input type="text" class="form-input" name="nome_atendente" placeholder="Nome do atendente" required size="100" maxlength="100">

    <select class="form-option" name="nome_biblioteca" placeholder="Nome da biblioteca">

      <option>Selecione uma biblioteca</option>

');
?>


<?php

$sql = $pdo->prepare("SELECT * FROM biblioteca");
$sql->execute();


$fetchBiblioteca = $sql->fetchAll();



foreach ($fetchBiblioteca as $key => $value) {
  print "<option value =" . $value['id_biblioteca'] . ">" . $value['nome_biblioteca'] . "</option>";
}

?>

<?php echo ('

</select>

<button class="form-btn">Editar</button>

</form>

</section>


');

?>

<!-- Editando -->
<?php

if (isset($_REQUEST['editar'])) {

  $nome_atendente = @$_REQUEST['nome_atendente'];
  $nome_biblioteca = @$_REQUEST['nome_biblioteca'];

  if ($nome_biblioteca !== null and $nome_atendente !== null) {

    $id = (int)$_GET['editar'];

    try {

      $sql = "UPDATE atendente SET biblioteca_id_biblioteca='$nome_biblioteca', nome_atendente='$nome_atendente' WHERE id_atendente=" . $id;

      $stmt = $pdo->prepare($sql);

      $stmt->execute();

      echo  "<script>location.href='?page=listar_atendentes';</script>";
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  $pdo = null;
}


?>