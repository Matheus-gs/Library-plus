<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LibraryPlus</title>

  <link rel="icon" href="./assets/favicon/book-open.svg" />
  <link rel="apple-touch-icon" href="./assets/favicon/book-open.svg" />

  <!-- CSS -->
  <link rel="stylesheet" href="/css/style.css" />

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>

  <header>

    <nav class="navbar-default">

      <div class="logo">
        <a href="?page=bibliotecas">
          <h1>library<span>plus</span></h1>
        </a>
      </div>

      <ul class="menu">
        <li>
          <a href="?page=bibliotecas" class="menu-link">Bibliotecas</a>
        </li>
        <li>
          <a href="?page=atendentes" class="menu-link">Atendentes</a>
        </li>
        <li>
          <a href="?page=usuarios" class="menu-link">Usuários</a>
        </li>
        <li>
          <a href="?page=categorias" class="menu-link">Categorias</a>
        </li>
        <li>
          <a href="?page=livros" class="menu-link">Livros</a>
        </li>
        <li>
          <a href="?page=reservas" class="menu-link">Reservas</a>
        </li>
      </ul>

      <a href="https://github.com/matheus-gs" target="blank" class="sponsor">
        <i data-feather="github"></i>
      </a>

    </nav>

  </header>

  <main>
    <?php

    include("./connect.php");

    // 
    $_page = @$_REQUEST['page'];
    // 

    switch ($_page) {
        // Bibliotecas
      case 'bibliotecas':
        include("./pages/bibliotecas/bibliotecas.php");
        break;
      case 'cadastrar_bibliotecas':
        include("./pages/bibliotecas/cadastrar_bibliotecas.php");
        break;
      case 'listar_bibliotecas':
        include("./pages/bibliotecas/listar_bibliotecas.php");
        break;
      case 'editar_biblioteca':
        include("./pages/bibliotecas/editar_bibliotecas.php");
        break;
        // Atendentes
      case 'atendentes':
        include("./pages/atendentes/atendentes.php");
        break;
      case 'cadastrar_atendentes':
        include("./pages/atendentes/cadastrar_atendentes.php");
        break;
      case 'listar_atendentes':
        include("./pages/atendentes/listar_atendentes.php");
        break;
      case 'editar_atendentes':
        include("./pages/atendentes/editar_atendentes.php");
        break;
        // Usuários
      case 'usuarios':
        include("./pages/usuarios/usuarios.php");
        break;
      case 'cadastrar_usuarios':
        include("./pages/usuarios/cadastrar_usuarios.php");
        break;
      case 'listar_usuarios':
        include("./pages/usuarios/listar_usuarios.php");
        break;
        // Categorias
      case 'categorias':
        include("./pages/categorias/categorias.php");
        break;
      case 'cadastrar_categorias':
        include("./pages/categorias/cadastrar_categorias.php");
        break;
      case 'listar_categorias':
        include("./pages/categorias/listar_categorias.php");
        break;
        // Livros
      case 'livros':
        include("./pages/livros/livros.php");
        break;
      case 'cadastrar_livros':
        include("./pages/livros/cadastrar_livros.php");
        break;
      case 'listar_livros':
        include("./pages/livros/listar_livros.php");
        break;
        // Reservas
      case 'reservas':
        include("./pages/reservas/reservas.php");
        break;
      case 'cadastrar_reservas':
        include("./pages/reservas/cadastrar_reservas.php");
        break;
      case 'listar_reservas':
        include("./pages/reservas/listar_reservas.php");
        break;
        // Home
      default:
        include("./pages/bibliotecas/bibliotecas.php");
    }
    ?>
  </main>

  <!-- JS -->
  <script src="./js/script.js"></script>
</body>

</html>