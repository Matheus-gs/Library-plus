<section id="listar" class="tela-listar ">

  <img src="../../assets/images/listar_livros.jpg" alt="">

  <h1 class=" h1-title">Listar Livros</h1>

  <table class="table-listar" cellspacing='0'>

    <?php
    // 
    $sql = $pdo->prepare("SELECT * FROM livro l JOIN categoria c ON l.categoria_id_categoria = c.id_categoria");
    $sql->execute();

    $count = $sql->rowCount();

    print "<p class='listar-resultados'>Encontramos $count resultado(s)</p>";

    if ($count == 0) {

      echo ('

      <a href="?page=cadastrar_livros" >Clique aqui para cadastrar livros</a>
      
      ');
      // 
    } else if ($count !== 0) {
      // 
      echo ('
      
      <tr>
      <!-- Colunas -->
      <th>Id</th>
      <th>Título</th>
      <th>Autor</th>
      <th>Editora</th>
      <th>Categoria</th>

      <!-- Ações -->
      <th></th>
      <th></th>

    </tr>

      ');
    }

    $fetchLivro = $sql->fetchAll();

    // Identificadores das colunas
    $id_livro = 'id_livro';
    $nome_livro = 'titulo_livro';
    $autor_livro = 'autor_livro';
    $nome_editora = 'editora_livro';
    $categoria_id_categoria = 'nome_categoria';

    foreach ($fetchLivro as $key => $value) {

      print "<tr>";

      // Colunas
      print "<td>" . $value[$id_livro] . "</td>";
      print "<td>" . $value[$nome_livro] . "</td>";
      print "<td>" . $value[$autor_livro] . "</td>";
      print "<td>" . $value[$nome_editora] . "</td>";
      print "<td>" . $value[$categoria_id_categoria] . "</td>";
      //===== Ações =====//

      // Editar
      print "<td>
            
              <a href='?page=editar_livros&editar=$value[$id_livro]'>
                <i data-feather='edit' class='edit-icon'></i>
              </a>
                
            </td>";

      // Deletar
      print "<td>
      
              <a href='?page=editar_livros&delete=$value[$id_livro]'>
                <i data-feather='trash' class='delete-icon'></i>
              </a>
          
            </td>";

      print "</tr>";
    };

    ?>

  </table>

</section>