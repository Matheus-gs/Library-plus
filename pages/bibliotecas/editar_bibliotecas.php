<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM biblioteca WHERE id_biblioteca=" . $id);
  // 
  print "<script type='text/javascript'>location.href='?page=listar_bibliotecas';</script>";
}

?>

<!-- Editando -->
<?php


echo ('
  <section id="editar" class="tela-cadastrar formulario">
  
  
    <h1 class=" h1-title">Editar Biblioteca</h1>
  
    <form method="POST" class="meu-formulario">
  
      <input type="hidden" name="cadastrar_biblioteca">
  
      <input type="text" class="form-input" name="nome_biblioteca" placeholder="Nome da biblioteca" required size="100" maxlength="100">
  
      <input type="text" class="form-input" name="endereco_biblioteca" placeholder="Endereço da biblioteca" required size="100" maxlength="100">
  
      <button class="form-btn">Editar</button>
  
    </form>
  
  </section>
');

if (isset($_REQUEST['editar'])) {

  $nome_biblioteca = @$_REQUEST['nome_biblioteca'];
  $endereco_biblioteca = @$_REQUEST['endereco_biblioteca'];

  if ($nome_biblioteca !== null and $endereco_biblioteca !== null) {

    $id = (int)$_GET['editar'];

    try {

      $sql = "UPDATE biblioteca SET nome_biblioteca='$nome_biblioteca', end_biblioteca='$endereco_biblioteca' WHERE id_biblioteca=" . $id;

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