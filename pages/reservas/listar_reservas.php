<section id="listar" class="tela-listar ">

  <img src="../../assets/images/listar_reservas.jpg" alt="">

  <h1 class=" h1-title">Listar Reservas</h1>

  <table class="table-listar" cellspacing='0'>

    <?php
    // 
    $sql = $pdo->prepare("SELECT * FROM reserva r JOIN livro l ON l.id_livro = r.livro_id_livro JOIN usuario u ON u.id_usuario = r.aluno_id_aluno JOIN atendente a ON a.id_atendente = r.atendente_id_atendente JOIN biblioteca b ON a.biblioteca_id_biblioteca = b.id_biblioteca ");
    $sql->execute();

    $count = $sql->rowCount();

    print "<p class='listar-resultados'>Encontramos $count resultado(s)</p>";

    if ($count == 0) {

      echo ('

      <a href="?page=cadastrar_reservas" >Clique aqui para cadastrar reservas</a>
      
      ');
      // 
    } else if ($count !== 0) {
      // 
      echo ('
      
      <tr>
      <!-- Colunas -->

      <th>Aluno</th>
      <th>Livro</th>
      <th>Atendente</th>
      <th>Biblioteca</th>
      <th>Data de emprestimo</th>
      <th>Data de devolução</th>

      <!-- Ações -->
      <th></th>

    </tr>

      ');
    }

    $fetchReserva = $sql->fetchAll();

    // Identificadores das colunas
    $aluno = 'nome_usuario';
    $livro = 'titulo_livro';
    $atendente = 'nome_atendente';
    $biblioteca = 'nome_biblioteca';

    foreach ($fetchReserva as $key => $value) {
      $id_reserva = 'aluno_id_aluno';

      $data_emprestimo = strtotime($value['data_emprestimo']);
      $nova_data_emprestimo = date('d-m-Y', $data_emprestimo);

      $data_devolucao = strtotime($value['data_devolucao']);
      $nova_data_devolucao = date('d-m-Y', $data_devolucao);

      print "<tr>";

      // Colunas
      print "<td>" . $value[$aluno] . "</td>";
      print "<td>" . $value[$livro] . "</td>";
      print "<td>" . $value[$atendente] . "</td>";
      print "<td>" . $value[$biblioteca] . "</td>";
      print "<td>" . str_replace('-', '/', $nova_data_emprestimo) . "</td>";
      print "<td>" . str_replace('-', '/', $nova_data_devolucao) . "</td>";
      //===== Ações =====//

      // Deletar
      print "<td>
      
              <a href='?page=editar_reservas&delete=$value[$id_reserva]'>
                <i data-feather='trash' class='delete-icon'></i>
              </a>
          
            </td>";

      print "</tr>";
    };

    ?>

  </table>

</section>