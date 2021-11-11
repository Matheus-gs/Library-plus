<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_bibliotecas.jpg" alt="">

  <h1 class=" h1-title">Cadastrar Biblioteca</h1>

  <form method="POST" class="meu-formulario">

    <input type="hidden" name="cadastrar_biblioteca">

    <input type="text" class="form-input" name="nome_biblioteca" placeholder="Nome da biblioteca" required size="100" maxlength="100">

    <input type="text" class="form-input" name="endereco_biblioteca" placeholder="Endereço da biblioteca" required size="100" maxlength="100">

    <button class="form-btn">Cadastrar</button>

  </form>

</section>

<?php

if (isset($_POST['cadastrar_biblioteca'])) {
  $sql = $pdo->prepare("INSERT INTO biblioteca  VALUES(null,?,?)");
  $sql->execute(array($_POST['nome_biblioteca'], $_POST['endereco_biblioteca']));
  print "<script type='text/javascript'>alert('Biblioteca cadastrada com sucesso!')</script>";
  print "<script type='text/javascript'>location.href='?page=listar_bibliotecas'</script>";
}
?>