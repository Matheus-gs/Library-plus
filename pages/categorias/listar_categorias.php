<section id="listar" class="tela-listar ">

  <img src="../../assets/images/listar_categorias.jpg" alt="">

  <h1 class=" h1-title">Listar Categorias</h1>

  <table class="table-listar" cellspacing='0'>

    <?php
    // 
    $sql = $pdo->prepare("SELECT * from categoria");
    $sql->execute();

    $count = $sql->rowCount();

    print "<p class='listar-resultados'>Encontramos $count resultado(s)</p>";

    if ($count == 0) {

      echo ('

      <a href="?page=cadastrar_categorias" >Clique aqui para cadastrar categorias</a>
      
      ');
      // 
    } else if ($count !== 0) {
      // 
      echo ('
      
      <tr>
      <!-- Colunas -->
      <th>Id</th>
      <th>Categoria</th>


      <!-- Ações -->
      <th></th>
      <th></th>

    </tr>

      ');
    }

    $fetchCategoria = $sql->fetchAll();

    // Identificadores das colunas
    $id_categoria = 'id_categoria';
    $nome_categoria = 'nome_categoria';

    foreach ($fetchCategoria as $key => $value) {
      print "<tr>";

      // Colunas
      print "<td>" . $value[$id_categoria] . "</td>";
      print "<td>" . $value[$nome_categoria] . "</td>";

      //===== Ações =====//

      // Editar
      print "<td>
            
              <a href='?page=editar_categorias&editar=$value[$id_categoria]'>
                <i data-feather='edit' class='edit-icon'></i>
              </a>
                
            </td>";

      // Deletar
      print "<td>
      
              <a href='?page=editar_categorias&delete=$value[$id_categoria]'>
                <i data-feather='trash' class='delete-icon'></i>
              </a>
          
            </td>";

      print "</tr>";
    };

    ?>

  </table>

</section>