<section id="listar" class="tela-listar ">

  <img src="../../assets/images/listar_usuarios.jpg" alt="">

  <h1 class=" h1-title">Listar Usuários</h1>

  <table class="table-listar" cellspacing='0'>

    <?php
    // 
    $sql = $pdo->prepare("SELECT * FROM usuario");
    $sql->execute();

    $count = $sql->rowCount();

    print "<p class='listar-resultados'>Encontramos $count resultado(s)</p>";

    if ($count == 0) {
      echo ('

        <a href="?page=cadastrar_usuarios" >Clique aqui para cadastrar usuarios</a>
      
      ');
      // 
    } else if ($count !== 0) {
      // 
      echo ('
      
        <tr>

         <!-- Colunas -->
         <th>Id</th>
         <th>Nome</th>
         <th>Email</th>
         <th>Telefone</th>
         <th>Endereço</th>
         <th>Data de nascimento</th>
         <th>Gênero</th>

         <!-- Ações -->
         <th></th>
         <th></th>

        </tr>

      ');
    }

    $fetchAtendente = $sql->fetchAll();

    // Identificadores das colunas
    $id_usuario = 'id_usuario';
    $nome_usuario = 'nome_usuario';
    $email_usuario = 'email_usuario';
    $telefone_usuario = 'fone_usuario';
    $endereco_usuario = 'end_usuario';
    $data_nasc_usuario = 'data_nasc_usuario';
    $genero_usuario = 'genero_usuario';

    function Mask($mask, $str)
    {

      $str = str_replace(" ", "", $str);

      for ($i = 0; $i < strlen($str); $i++) {
        $mask[strpos($mask, "#")] = $str[$i];
      }

      return $mask;
    }

    foreach ($fetchAtendente as $key => $value) {

      $data = strtotime($value['data_nasc_usuario']);
      $nova_data = date('d-m-Y', $data);

      print "<tr>";

      // Colunas
      print "<td>" . $value[$id_usuario] . "</td>";
      print "<td>" . $value[$nome_usuario] . "</td>";
      print "<td>" . $value[$email_usuario] . "</td>";
      print "<td>" . Mask("(##) #####-####", $value[$telefone_usuario]) . "</td>";
      print "<td>" . $value[$endereco_usuario] . "</td>";
      print "<td>" .  str_replace('-', '/', $nova_data) . "</td>";
      print "<td>" . $value[$genero_usuario] . "</td>";


      //===== Ações =====//

      // Editar
      print "<td>
            
              <a href='?page=editar_usuarios&editar=$value[$id_usuario]'>
                <i data-feather='edit' class='edit-icon'></i>
              </a>
                
            </td>";

      // Deletar
      print "<td>
      
              <a href='?page=editar_usuarios&delete=$value[$id_usuario]'>
                <i data-feather='trash' class='delete-icon'></i>
              </a>
          
            </td>";

      print "</tr>";
    };

    ?>

  </table>

</section>