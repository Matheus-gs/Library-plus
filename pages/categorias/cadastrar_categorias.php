<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_categorias.jpg" alt="">

  <h1 class="h1-title">Cadastrar Categoria</h1>

  <form method="POST" class="meu-formulario">

    <input type="text" class="form-input" name="nome_categoria" placeholder="Categoria" required maxlength="30">

    <button class="form-btn">Cadastrar</button>

  </form>

</section>


<?php

$nome_categoria = @$_POST['nome_categoria'];

$registro_categoria = $pdo->prepare("SELECT * FROM categoria WHERE nome_categoria = '{$nome_categoria}'");
$registro_categoria->execute();

$registro_categoria_num_rows = $registro_categoria->rowCount();

try {

  if ($registro_categoria_num_rows > 0) {

    echo ('
    
    <script type="text/javascript">alert("Não é possível cadastrar categorias iguais")</script>

    
    ');
  } else if ($nome_categoria !== null and $registro_categoria_num_rows == 0) {

    $sql = "INSERT INTO categoria (
              -- 
              id_categoria,  
              nome_categoria
              -- 
    )
    VALUES (
      -- 
      null,
       '{$nome_categoria}'
      --  
    )";

    $pdo->exec($sql);

    echo "<script> location.href = '?page=listar_categorias';</script>";
    // 
  }

  // 
} catch (PDOException $e) {
  // 
  echo $sql . "<br>" . $e->getMessage();
}
// 
$pdo = null;
?>