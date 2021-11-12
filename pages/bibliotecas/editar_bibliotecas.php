<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM biblioteca WHERE id_biblioteca=" . $id);
  // 
  print "<script type='text/javascript'>location.href='?page=listar_bibliotecas';</script>";
}
?>

<!-- Preenchendo os campos com os valores atuais -->
<?php
if (isset($_REQUEST['editar'])) {

  $id = (int)$_GET['editar'];

  $sql = $pdo->prepare("SELECT * FROM biblioteca WHERE id_biblioteca =" . $id);
  $sql->execute();

  $fetchBiblioteca = $sql->fetchAll();

  $nome_biblioteca = 'nome_biblioteca';
  $endereco_biblioteca = 'end_biblioteca';

  foreach ($fetchBiblioteca as $key => $value) {
    $nome_biblioteca_atual = $value[$nome_biblioteca];
    $endereco_biblioteca_atual = $value[$endereco_biblioteca];
  }

?>

  <section id="editar" class="tela-cadastrar formulario">

    <img src="../../assets/images/cadastrar_bibliotecas.jpg" alt="">

    <h1 class=" h1-title">Editar Biblioteca</h1>

    <form method="POST" class="meu-formulario">

      <input type="hidden" name="cadastrar_biblioteca">

      <input type="text" class="form-input" name="nome_biblioteca" value="<?php echo $nome_biblioteca_atual ?>" required size="100" maxlength="100">

      <input type="text" class="form-input" name="endereco_biblioteca" value="<?php echo $endereco_biblioteca_atual ?>" required size="100" maxlength="100">

      <button class="form-btn">Editar</button>

    </form>

  </section>

<?php

  // Editando
  $nome_biblioteca = @$_REQUEST['nome_biblioteca'];
  $endereco_biblioteca = @$_REQUEST['endereco_biblioteca'];

  if ($nome_biblioteca !== null and $endereco_biblioteca !== null) {

    $id = (int)$_GET['editar'];

    try {

      $sql = "UPDATE biblioteca SET 
      nome_biblioteca='{$nome_biblioteca}',
      end_biblioteca='{$endereco_biblioteca}'
      
      WHERE id_biblioteca=" . $id;

      $stmt = $pdo->prepare($sql);

      $stmt->execute();

      echo  "<script>location.href='?page=listar_bibliotecas';</script>";
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  $pdo = null;
}
?>