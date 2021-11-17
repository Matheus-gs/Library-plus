<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_livros.jpg" alt="">

  <h1 class="h1-title">Cadastrar Livros</h1>

  <form method="POST" class="meu-formulario">

    <input type="text" class="form-input" name="nome_livro" required placeholder="Título">

    <input type="text" class="form-input" name="autor_livro" required placeholder="Autor">

    <input type="text" class="form-input" name="editora_livro" required placeholder="Editora">

    <input type="text" class="form-input" name="edicao_livro" required placeholder="Edição">

    <input type="number" class="form-input" name="ano_livro" required placeholder="Ano de publicação">

    <input type="text" class="form-input" name="localidade_livro" required placeholder="Localidade">

    <select class="form-option" name="categoria_livro" id="">

      <option value="#">Selecione a categoria</option>

      <?php

      $sql = $pdo->prepare("SELECT * FROM categoria");
      $sql->execute();

      $fetchCategoria = $sql->fetchAll();

      foreach ($fetchCategoria as $key => $value) {
        print "<option value =" . $value['id_categoria'] . ">" . $value['nome_categoria'] . "</option>";
      }

      ?>

    </select>

    <button class="form-btn">Cadastrar</button>

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

$registro_livro = $pdo->prepare("SELECT * FROM livro WHERE titulo_livro = '{$nome_livro}'");
$registro_livro->execute();

$registro_livro_num_rows = $registro_livro->rowCount();

try {
  //
  if ($registro_livro_num_rows) {


    echo ('
    
    <script type="text/javascript">alert("Não é possível cadastrar livros iguais")</script>

    
    ');
  } else if ($nome_livro != null and $autor_livro != null and $editora_livro != null and $edicao_livro != null and $ano_livro != null and $localidade_livro != null and $categoria_livro != null) {

    // 
    $sql = "INSERT INTO livro (
      id_livro,
      titulo_livro,
      autor_livro,
      editora_livro,
      edicao_livro,
      ano_livro,
      localidade_livro,
      categoria_id_categoria
      -- 
    ) VALUES (
      null,
      '{$nome_livro}',
      '{$autor_livro}',
      '{$editora_livro}',
      '{$edicao_livro}',
      '{$ano_livro}',
      '{$localidade_livro}',
      '{$categoria_livro}'
      -- 
    )";

    // 
    $pdo->exec($sql);

    // 
    echo ('
    
    <script type="text/javascript">location.href="?page=listar_livros"</script>

    ');
  }
  // 
} catch (PDOException $e) {
  // 
  echo $sql . "<br>" . $e->getMessage();
}

$pdo = null;

?>