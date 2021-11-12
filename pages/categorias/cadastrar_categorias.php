<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_categorias.jpg" alt="">

  <h1 class="h1-title">Cadastrar Categoria</h1>

  <form method="POST" class="meu-formulario">

    <input type="text" class="form-input" name="nome_categoria" placeholder="Categoria">

    <button class="form-btn">Cadastrar</button>

  </form>

</section>


<?php

try {
  $nome_categoria = @$_POST['nome_categoria'];

  if ($nome_categoria !== null) {

    $sql = "INSERT INTO categoria (id_categoria,  nome_categoria)
    VALUES (null, '{$nome_categoria}')";

    $pdo->exec($sql);

    echo "<script> location.href = '?page=listar_categorias';</script>";
  }
  // 
} catch (PDOException $e) {
  // 
  echo $sql . "<br>" . $e->getMessage();
}

$pdo = null;
?>