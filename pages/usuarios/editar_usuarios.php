<!-- Deletando -->
<?php
if (isset($_GET['delete'])) {

  $id = (int)$_GET['delete'];
  $pdo->exec("DELETE FROM usuario WHERE id_usuario=" . $id);
  // 
  print "<script type='text/javascript'>location.href='?page=listar_usuarios';</script>";
}
?>

<!-- Preenchendo os campos com os valores atuais -->
<?php

if (isset($_REQUEST['editar'])) {

  $id = (int)$_GET['editar'];

  $sql = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario =" . $id);
  $sql->execute();

  $fetchAtendente = $sql->fetchAll();

  $nome_usuario = 'nome_usuario';
  $email_usuario = 'email_usuario';
  $telefone_usuario = 'fone_usuario';
  $endereco_usuario = 'end_usuario';
  $data_nasc_usuario = 'data_nasc_usuario';
  $genero_usuario = 'genero_usuario';


  foreach ($fetchAtendente as $key => $value) {
    $nome_usuario_atual = $value[$nome_usuario];
    $email_usuario_atual = $value[$email_usuario];
    $telefone_usuario_atual = $value[$telefone_usuario];
    $endereco_usuario_atual = $value[$endereco_usuario];
    $data_nasc_usuario_atual = $value[$data_nasc_usuario];
    $genero_usuario_atual = $value[$genero_usuario];
  }

?>
  <section id="cadastrar" class="tela-cadastrar formulario">

    <img src="../../assets/images/cadastrar_usuarios.jpg" alt="">

    <h1 class="h1-title">Editar Usuários</h1>

    <form method="POST" class="meu-formulario">

      <input type="text" class="form-input" name="nome_usuario" value="<?php echo $nome_usuario_atual ?>" required size="100" maxlength="100" />

      <input type="text" class="form-input" name="email_usuario" value="<?php echo $email_usuario_atual ?>" required size="100" maxlength="100" />

      <input type="text" class="form-input" name="endereco_usuario" value="<?php echo $endereco_usuario_atual ?>" prequired size="100" maxlength="100" />

      <input type="tel" class="form-input" name="telefone_usuario" value="<?php echo $telefone_usuario_atual ?>" required size="20" maxlength="20" />

      <input type="date" class="form-input" value="<?php echo $data_nasc_usuario_atual ?>" name="data_nascimento_usuario" required />

      <select name="genero_usuario" value="" class="form-option" required>

        <option value="<?php echo $genero_usuario_atual ?>"><?php echo $genero_usuario_atual ?></option>
        <option value="masculino">Masculino</option>
        <option value="feminino">Feminino</option>
        <option value="outro">Outro</option>

      </select>

      <button class="form-btn">Editar</button>


    </form>
  </section>

<?php
  // Editando
  $nome_usuario = @$_POST['nome_usuario'];
  $endereco_usuario = @$_POST['endereco_usuario'];
  $email_usuario = @$_POST['email_usuario'];
  $telefone_usuario = @$_POST['telefone_usuario'];
  $data_nasc_usuario =  @$_POST['data_nascimento_usuario'];
  $genero_usuario = @$_POST['genero_usuario'];

  if ($nome_usuario !== null and $endereco_usuario !== null and $email_usuario !== null and $telefone_usuario !== null and $data_nasc_usuario !== null and $genero_usuario !== null) {

    $id = (int)$_GET['editar'];

    try {

      $sql = "UPDATE usuario SET 
      nome_usuario='{$nome_usuario}',
      end_usuario='{$endereco_usuario}',
      email_usuario='{$email_usuario}',
      fone_usuario='{$telefone_usuario}',
      data_nasc_usuario='{$data_nasc_usuario}',
      genero_usuario='{$genero_usuario}'
      
      WHERE id_usuario=" . $id;

      $stmt = $pdo->prepare($sql);

      $stmt->execute();

      echo  "<script>location.href='?page=listar_usuarios';</script>";
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  $pdo = null;
}
?>