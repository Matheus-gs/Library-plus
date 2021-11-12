<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM categoria WHERE id_categoria=" . $id);
  // 
  print "<script type='text/javascript'>location.href='?page=listar_categorias';</script>";
}
?>

<!-- Preenchendo os campos com os valores atuais -->
<?php

if (isset($_REQUEST['editar'])) {

  $id = (int)$_GET['editar'];

  $sql = $pdo->prepare("SELECT * FROM categoria WHERE id_categoria =" . $id);
  $sql->execute();

  $fetchCategoria = $sql->fetchAll();

  $id_categoria = 'id_categoria';
  $nome_categoria = 'nome_categoria';

  foreach ($fetchCategoria as $key => $value) {
    $id_categoria_atual = $value[$id_categoria];
    $nome_categoria_atual = $value[$nome_categoria];
  }

?>
  <section id="editar" class="tela-cadastrar formulario">

    <img src="../../assets/images/cadastrar_categorias.jpg" alt="">

    <h1 class=" h1-title">Editar Categoria</h1>

    <form method="POST" class="meu-formulario">

      <input type="hidden" name="cadastrar_atendente">

      <input type="text" class="form-input" name="nome_categoria" value="<?php echo $nome_categoria_atual ?>" required size="100" maxlength="100">

      <button class="form-btn">Editar</button>

    </form>

  </section>

<?php
  // Editando
  $nome_categoria = @$_POST['nome_categoria'];

  if ($nome_categoria !== null) {

    $id = (int)$_GET['editar'];

    try {

      $sql = "UPDATE categoria SET 
      nome_categoria='{$nome_categoria}'

      WHERE id_categoria=" . $id;

      $stmt = $pdo->prepare($sql);

      $stmt->execute();

      echo  "<script>location.href='?page=listar_categorias';</script>";
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  $pdo = null;
}
?>