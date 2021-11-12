<section id="cadastrar" class="tela-cadastrar formulario">

  <img src="../../assets/images/cadastrar_atendentes.jpg" alt="">

  <h1 class="h1-title">Cadastrar Atendentes</h1>

  <form method="POST" class="meu-formulario">

    <input type="text" class="form-input" name="nome_atendente" placeholder="Nome do atendente" required size="100" maxlength="100">

    <select class="form-option" name="nome_biblioteca" placeholder="Nome da biblioteca">

      <option>Selecione uma biblioteca</option>

      <?php

      $sql = $pdo->prepare("SELECT * FROM biblioteca");
      $sql->execute();


      $fetchBiblioteca = $sql->fetchAll();



      foreach ($fetchBiblioteca as $key => $value) {
        print "<option value =" . $value['id_biblioteca'] . ">" . $value['nome_biblioteca'] . "</option>";
      }

      ?>

    </select>

    <button class="form-btn">Cadastrar</button>

  </form>

</section>

<?php

try {

  $nome_biblioteca = @$_POST['nome_biblioteca'];
  $nome_atendente = @$_POST['nome_atendente'];


  if ($nome_biblioteca !== null and $nome_atendente !== null) {

    $sql = "INSERT INTO atendente (id_atendente, biblioteca_id_biblioteca, nome_atendente)
            VALUES (null, '{$nome_biblioteca}', '{$nome_atendente}')";

    $pdo->exec($sql);

    echo "<script> location.href = '?page=listar_atendentes';</script>";
  }
  // 
} catch (PDOException $e) {
  // 
  echo $sql . "<br>" . $e->getMessage();
}

$pdo = null;
?>