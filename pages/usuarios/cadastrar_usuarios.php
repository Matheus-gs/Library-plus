<!-- Tela -->
<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_usuarios.jpg" alt="">

  <h1 class="h1-title">Cadastrar Usuários</h1>

  <form method="POST" class="meu-formulario">

    <input type="text" class="form-input" name="nome_usuario" placeholder="Nome Completo" required size="100" maxlength="100" />

    <input type="email" class="form-input" name="email_usuario" placeholder="Email " required size="100" maxlength="100" />

    <input type="text" class="form-input" name="endereco_usuario" placeholder="Endereço " required size="100" maxlength="100" />

    <input type="number" class="form-input" name="telefone_usuario" placeholder="Telefone  " required size="12" maxlength="12" />

    <input type="date" placeholder="Data de nascimento" class="form-input" name="data_nascimento_usuario" required />

    <select name="genero_usuario" class="form-option" required>

      <option value="#">Selecione seu gênero</option>

      <option value="Masculino">Masculino</option>

      <option value="Feminino">Feminino</option>

      <option value="Outro">Outro</option>

    </select>

    <button class="form-btn">Cadastrar</button>

  </form>

</section>
<!--  -->
<?php

try {
  // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $nome_usuario = @$_POST['nome_usuario'];
  $endereco_usuario = @$_POST['endereco_usuario'];
  $email_usuario = @$_POST['email_usuario'];
  $telefone_usuario = @$_POST['telefone_usuario'];
  $data_nasc_usuario =  @$_POST['data_nascimento_usuario'];
  $genero_usuario = @$_POST['genero_usuario'];

  if (
    // 
    $nome_usuario !== null and
    $endereco_usuario !== null and
    $email_usuario !== null and
    $telefone_usuario !== null and
    $data_nasc_usuario !== null and
    $genero_usuario !== "#"
    // 
  ) {

    $sql = "INSERT INTO usuario (
              --  
              id_usuario,
              nome_usuario,
              end_usuario,
              email_usuario,
              fone_usuario, 
              data_nasc_usuario,
              genero_usuario
              -- 
    )
    VALUES (
    -- 
    null,
    '{$nome_usuario}',
    '{$endereco_usuario}',
    '{$email_usuario}',
    '{$telefone_usuario}',
    '{$data_nasc_usuario}',
    '{$genero_usuario}'
    -- 
   )";

    $pdo->exec($sql);

    echo "<script> location.href = '?page=listar_usuarios';</script>";
    // 
  } else if ($genero_usuario == "#") {
    // 
    echo "<script>alert('Por favor insira valores válidos')</script>";
  }
  // 
} catch (PDOException $e) {
  // 
  echo $sql . "<br>" . $e->getMessage();
}
// 
$pdo = null;
?>