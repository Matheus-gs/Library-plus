<section id="listar" class="tela-listar ">

  <img src="../../assets/images/listar_bibliotecas.jpg" alt="">

  <h1 class=" h1-title">Listar Bibliotecas</h1>

  <table class="table-listar" cellspacing='0'>

    <?php
    $sql = $pdo->prepare("SELECT * FROM biblioteca");
    $sql->execute();

    $count = $sql->rowCount();

    print "<p class='listar-resultados'>Encontramos $count resultado(s)</p>";
    if ($count == 0) {
      print "<a href='?page=cadastrar_bibliotecas' >Clique aqui para cadastrar biblioteca</a>";
    } else if ($count !== 0) {
      echo ('
      
      <tr>
      <!-- Colunas -->
      <th>Id</th>
      <th>Nome</th>
      <th>Endereço</th>

      <!-- Ações -->
      <th></th>
      <th></th>

    </tr>

      ');
    }

    $fetchBiblioteca = $sql->fetchAll();

    // Identificadores das colunas
    $id_biblioteca = 'id_biblioteca';
    $nome_biblioteca = 'nome_biblioteca';
    $endereco_biblioteca = 'end_biblioteca';

    foreach ($fetchBiblioteca as $key => $value) {
      print "<tr>";

      // Colunas
      print "<td>" . $value[$id_biblioteca] . "</td>";
      print "<td>" . $value[$nome_biblioteca] . "</td>";
      print "<td>" . $value[$endereco_biblioteca] . "</td>";


      //===== Ações =====//

      // Editar
      print "<td>
            
              <a href='?page=editar_biblioteca&editar=$value[$id_biblioteca]'>
                <i data-feather='edit' class='edit-icon'></i>
              </a>
                
            </td>";

      // Deletar
      print "<td>
      
              <a href='?page=editar_biblioteca&delete=$value[$id_biblioteca]'>
                <i data-feather='trash' class='delete-icon'></i>
              </a>
          
            </td>";

      print "</tr>";
    };

    ?>

  </table>

</section>