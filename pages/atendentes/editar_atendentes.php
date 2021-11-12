<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM atendente WHERE id_atendente=" . $id);
  // 
  print "<script type='text/javascript'>location.href='?page=listar_atendentes';</script>";
}
?>

<!-- Preenchendo os campos com os valores atuais -->
<?php

if (isset($_REQUEST['editar'])) {

  $id = (int)$_GET['editar'];

  $sql = $pdo->prepare("SELECT * FROM atendente WHERE id_atendente =" . $id);
  $sql->execute();

  $fetchAtendente = $sql->fetchAll();

  $id_biblioteca = 'biblioteca_id_biblioteca';
  $nome_atendente = 'nome_atendente';

  foreach ($fetchAtendente as $key => $value) {
    $id_biblioteca_atual = $value[$id_biblioteca];
    $nome_atendente_atual = $value[$nome_atendente];
  }

  $new_sql = $pdo->prepare("SELECT * FROM biblioteca WHERE id_biblioteca =" . $id_biblioteca_atual);
  $new_sql->execute();

  $fetchBiblioteca = $new_sql->fetchAll();

  $nome_biblioteca = 'nome_biblioteca';

  foreach ($fetchBiblioteca as $key => $value) {
    $nome_biblioteca_atual = $value[$nome_biblioteca];
  }
?>
  <section id="editar" class="tela-cadastrar formulario">

    <img src="../../assets/images/cadastrar_atendentes.jpg" alt="">

    <h1 class=" h1-title">Editar Atendentes</h1>

    <form method="POST" class="meu-formulario">

      <input type="hidden" name="cadastrar_atendente">

      <input type="text" class="form-input" name="nome_atendente" value="<?php echo $nome_atendente_atual ?>" required size="100" maxlength="100">

      <select class="form-option" name="nome_biblioteca">

        <?php
        foreach ($fetchBiblioteca as $key => $value) {
          print "<option value =" . $value['id_biblioteca'] . ">" . $value['nome_biblioteca'] . "</option>";
        }
        ?>

      </select>

      <button class="form-btn">Editar</button>

    </form>

  </section>

<?php
  // Editando
  $nome_atendente = @$_POST['nome_atendente'];
  $nome_biblioteca = @$_POST['nome_biblioteca'];

  if ($nome_biblioteca !== null and $nome_atendente !== null) {

    $id = (int)$_GET['editar'];

    try {

      $sql = "UPDATE atendente SET 
      nome_atendente='{$nome_atendente}',
      biblioteca_id_biblioteca='{$nome_biblioteca}'

      WHERE id_atendente=" . $id;

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