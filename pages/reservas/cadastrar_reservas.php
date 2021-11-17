<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_reservas.jpg" alt="">

  <h1 class="h1-title">Cadastrar Reservas</h1>

  <form method="POST" class="meu-formulario">

    <select class="form-option" name="nome_usuario">

      <option value="#">Selecione um usuário</option>

      <?php

      $sql = $pdo->prepare("SELECT * FROM usuario");
      $sql->execute();

      $fetchUsuario = $sql->fetchAll();

      foreach ($fetchUsuario as $key => $value) {
        print "<option value =" . $value['id_usuario'] . ">" . $value['nome_usuario'] . "</option>";
      }

      ?>

    </select>

    <select class="form-option" name="nome_livro">

      <option value="#">Selecione o livro</option>

      <?php

      $sql = $pdo->prepare("SELECT * FROM livro");
      $sql->execute();

      $fetchLivro = $sql->fetchAll();

      foreach ($fetchLivro as $key => $value) {
        print "<option value =" . $value['id_livro'] . ">" . $value['titulo_livro'] . "</option>";
      }

      ?>

    </select>

    <select class="form-option" name="nome_atendente">

      <option value="#">Selecione um atendente</option>

      <?php

      $sql = $pdo->prepare("SELECT * FROM atendente");
      $sql->execute();

      $fetchAtendente = $sql->fetchAll();

      foreach ($fetchAtendente as $key => $value) {
        print "<option value =" . $value['id_atendente'] . ">" . $value['nome_atendente'] . "</option>";
      }

      ?>

    </select>

    <input type="date" class="form-input" name="data_emprestimo" required>

    <input type="date" class="form-input" name="data_devolucao" required>

    <button class="form-btn">Cadastrar</button>
  </form>

</section>

<?php
// 
$nome_usuario = @$_POST['nome_usuario'];
$nome_livro = @$_POST['nome_livro'];
$nome_atendente = @$_POST['nome_atendente'];
$data_emprestimo = @$_POST['data_emprestimo'];
$data_devolucao = @$_POST['data_devolucao'];


$registro_livro = $pdo->prepare("SELECT * FROM livro WHERE titulo_livro = '{$nome_livro}'");
$registro_livro->execute();

$registro_livro_num_rows = $registro_livro->rowCount();

try {
  //
  if ($registro_livro_num_rows) {
    echo ('
    
    <script type="text/javascript">alert("Não é possível cadastrar reservas iguais")</script>
    
    ');
  } else if (
    $nome_usuario != null and
    $nome_livro != null and
    $nome_atendente != null and
    $data_emprestimo != null and
    $data_devolucao != null
  ) {

    // 
    $sql = "INSERT INTO reserva (
      aluno_id_aluno,
      livro_id_livro,
      atendente_id_atendente,
      data_emprestimo,
      data_devolucao
      -- 

    ) VALUES (
      '{$nome_usuario}',
      '{$nome_livro}',
      '{$nome_atendente}',
      '{$data_emprestimo}',
      '{$data_devolucao}'
      -- 
    )";

    // 
    $pdo->exec($sql);

    // 
    echo ('
    
    <script type="text/javascript">location.href="?page=listar_reservas"</script>

    ');
  }
  // 
} catch (PDOException $e) {
  // 
  echo $sql . "<br>" . $e->getMessage();
}

$pdo = null;

?>