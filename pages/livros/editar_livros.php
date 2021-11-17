<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM livro WHERE id_livro=" . $id);
  // 
  print "<script type='text/javascript'>location.href='?page=listar_livros';</script>";
}
?>

<!-- Preenchendo os campos com os valores atuais -->
<?php

if (isset($_REQUEST['editar'])) {

  $id = (int)$_GET['editar'];

  $sql = $pdo->prepare("SELECT * FROM livro WHERE id_livro =" . $id);
  $sql->execute();

  $fetchLivro = $sql->fetchAll();

  $nome_livro = 'titulo_livro';
  $autor_livro = 'autor_livro';
  $editora_livro = 'editora_livro';
  $edicao_livro = 'edicao_livro';
  $ano_livro = 'ano_livro';
  $localidade_livro = 'localidade_livro';
  $categoria_livro = 'categoria_id_categoria';

  foreach ($fetchLivro as $key => $value) {
    $nome_livro_atual = $value[$nome_livro];
    $autor_livro_atual = $value[$autor_livro];
    $editora_livro_atual = $value[$editora_livro];
    $edicao_livro_atual = $value[$edicao_livro];
    $ano_livro_atual = $value[$ano_livro];
    $localidade_livro_atual = $value[$localidade_livro];
    $categoria_livro_atual = $value[$categoria_livro];
  }

?>
  <section id="editar" class="tela-cadastrar formulario">

    <img src="../../assets/images/cadastrar_livros.jpg" alt="">

    <h1 class=" h1-title">Editar Livros</h1>

    <form method="POST" class="meu-formulario">

      <input type="text" class="form-input" name="nome_livro" required value="<?php echo $nome_livro_atual ?>">

      <input type="text" class="form-input" name="autor_livro" required value="<?php echo $autor_livro_atual ?>">

      <input type="text" class="form-input" name="editora_livro" required value="<?php echo $editora_livro_atual ?>">

      <input type="text" class="form-input" name="edicao_livro" required value="<?php echo $edicao_livro_atual ?>">

      <input type="number" class="form-input" name="ano_livro" required value="<?php echo $ano_livro_atual ?>">

      <input type="text" class="form-input" name="localidade_livro" required value="<?php echo $localidade_livro_atual ?>">

      <select class="form-option" name="categoria_livro" id="">

        <?php

        $sql = $pdo->prepare("SELECT * FROM categoria");
        $sql->execute();

        $fetchCategoria = $sql->fetchAll();

        foreach ($fetchCategoria as $key => $value) {
          print "<option value =" . $value['id_categoria'] . ">" . $value['nome_categoria'] . "</option>";
        }

        ?>

      </select>
      <button class="form-btn">Editar</button>

    </form>


  </section>

<?php
  // 
  $nome_livro = @$_POST['nome_livro'];
  $autor_livro = @$_POST['autor_livro'];
  $editora_livro = @$_POST['editora_livro'];
  $edicao_livro = @$_POST['edicao_livro'];
  $ano_livro = @$_POST['ano_livro'];
  $localidade_livro = @$_POST['localidade_livro'];
  $categoria_livro = @$_POST['categoria_livro'];

  // 
  if ($nome_livro != null and $autor_livro != null and $editora_livro != null and $edicao_livro != null and $ano_livro != null and $localidade_livro != null and $categoria_livro != null) {

    $id = (int)$_GET['editar'];

    try {

      // 
      $sql = "UPDATE livro SET 
      titulo_livro  = '{$nome_livro}',
      autor_livro = '{$autor_livro}',
      editora_livro = '{$editora_livro}',
      edicao_livro = '{$edicao_livro}',
      ano_livro = '{$ano_livro}',
      localidade_livro = '{$localidade_livro}',
      categoria_id_categoria = '{$categoria_livro}'
      -- 
    WHERE id_livro =" . $id;


      $stmt = $pdo->prepare($sql);

      $stmt->execute();

      echo  "<script>location.href='?page=listar_livros';</script>";
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
      $pdo = null;
    }
  }
}

?>