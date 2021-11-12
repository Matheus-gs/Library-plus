<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_usuarios.jpg" alt="">
  <h1 class="h1-title">Cadastrar Usuários</h1>
  <form method="POST" class="meu-formulario">
    <input type="text" class="form-input" name="nome_usuario" placeholder="Nome Completo" required size="100" maxlength="100" />

    <input type="text" class="form-input" name="email_usuario" placeholder="Email " required size="100" maxlength="100" />

    <input type="text" class="form-input" name="endereco_usuario" placeholder="Endereço " required size="100" maxlength="100" />

    <input type="tel" class="form-input" name="telefone_usuario" placeholder="Telefone " required size="20" maxlength="20" />

    <input type="date" placeholder="Data de nascimento" class="form-input" name="data_nascimento_usuario" required />

    <select name="genero_usuario" class="form-option" required>
      <option>Selecione seu gênero</option>
      <option value="masculino">Masculino</option>
      <option value="feminino">Feminino</option>
      <option value="outro">Outro</option>
    </select>

    <button class="form-btn">Cadastrar</button>
  </form>
</section>


<?php

try {
  // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $nome_usuario = @$_POST['nome_usuario'];
  $endereco_usuario = @$_POST['endereco_usuario'];
  $email_usuario = @$_POST['email_usuario'];
  $telefone_usuario = @$_POST['telefone_usuario'];
  $data_nasc_usuario =  @$_POST['data_nascimento_usuario'];
  $genero_usuario = @$_POST['genero_usuario'];

  if ($nome_usuario !== null and $endereco_usuario !== null and $email_usuario !== null and $telefone_usuario !== null and $data_nasc_usuario !== null and $genero_usuario !== null) {
    $sql = "INSERT INTO usuario (id_usuario, nome_usuario, end_usuario, email_usuario, fone_usuario, data_nasc_usuario, genero_usuario)
  VALUES (
    null,
    '{$nome_usuario}',
    '{$endereco_usuario}',
    '{$email_usuario}',
    '{$telefone_usuario}',
    '{$data_nasc_usuario}',
    '{$genero_usuario}'
   )";

    $pdo->exec($sql);

    echo "<script> location.href = '?page=listar_usuarios';</script>";
  }
  // 
} catch (PDOException $e) {
  // 
  echo $sql . "<br>" . $e->getMessage();
}

$pdo = null;
?>