<section id="listar" class="tela-listar ">

  <img src="../../assets/images/listar_bibliotecas.jpg" alt="">

  <h1 class=" h1-title">Listar Atendentes</h1>

  <table class="table-listar" cellspacing='0'>

    <?php
    // 
    $sql = $pdo->prepare("SELECT * FROM atendente AS a INNER JOIN biblioteca AS b ON b.id_biblioteca = a.biblioteca_id_biblioteca");
    $sql->execute();

    $count = $sql->rowCount();

    print "<p class='listar-resultados'>Encontramos $count resultado(s)</p>";

    if ($count == 0) {

      echo ('

      <a href="?page=cadastrar_atendentes" >Clique aqui para cadastrar atendentes</a>
      
      ');
      // 
    } else if ($count !== 0) {
      // 
      echo ('
      
      <tr>
      <!-- Colunas -->
      <th>Id</th>
      <th>Biblioteca</th>
      <th>Nome Atendente</th>

      <!-- Ações -->
      <th></th>
      <th></th>

    </tr>

      ');
    }

    $fetchAtendente = $sql->fetchAll();

    // Identificadores das colunas
    $id_atendente = 'id_atendente';
    $nome_biblioteca = 'nome_biblioteca';
    $nome_atendente = 'nome_atendente';

    foreach ($fetchAtendente as $key => $value) {
      print "<tr>";

      // Colunas
      print "<td>" . $value[$id_atendente] . "</td>";
      print "<td>" . $value[$nome_biblioteca] . "</td>";
      print "<td>" . $value[$nome_atendente] . "</td>";


      //===== Ações =====//

      // Editar
      print "<td>
            
              <a href='?page=editar_atendentes&editar=$value[$id_atendente]'>
                <i data-feather='edit' class='edit-icon'></i>
              </a>
                
            </td>";

      // Deletar
      print "<td>
      
              <a href='?page=editar_atendentes&delete=$value[$id_atendente]'>
                <i data-feather='trash' class='delete-icon'></i>
              </a>
          
            </td>";

      print "</tr>";
    };

    ?>

  </table>

</section>