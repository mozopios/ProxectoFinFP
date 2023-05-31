<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pios d'rriba</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">

</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Pios d'rriba</h1>
      </a>

      <nav id="navbar" class="navbar justify-content-between">
        <ul>
            <?php if($seccion !== "/"){?>
                <li><a href="/">Home</a></li>
            <?php }?>    
            <?php if($seccion !== "/menus"){?>
                <li><a href="/menus">Menus</a></li>
            <?php }?>
            <?php if(strpos($_SESSION["permisos"]["usuarios"],"d") !== false && $seccion !== "/users"){?>
                <li><a href="/users">Usuarios</a></li>
            <?php  }?>
            <?php if(strpos($seccion, "/pedidos") === false){?>
                <li><a href="/pedidos<?php echo strpos($_SESSION["permisos"]["pedidos"],"d")!== false || $_SESSION["permisos"]["pedidos"] == "r" ? "" : "/cliente/".$_SESSION["usuario"]["id_usuario"];?>">Pedidos</a></li>
            <?php  }?>
            <?php if($seccion !== "/perfil"){?>
                <li><a href="/users/profile/<?php echo $_SESSION["usuario"]["id_usuario"];?>">Perfil</a></li>
            <?php }?>
                <li><a class="<?php echo isset($_SESSION["usuario"]) ? "btn btn-danger p-2" : "btn btn-success p-2"?>" href="/<?php echo isset($_SESSION["usuario"]) ? "cerrar" : "/login"?>"><i class="<?php echo isset($_SESSION["usuario"]) ? "bi-box-arrow-right text-light" : "bi bi-box-arrow-in-right text-light"?>"></i></a></li>
        </ul>
      </nav>
            <?php if(strpos($_SESSION["permisos"]["pedidos"],"d")===false &&  $_SESSION["permisos"]["pedidos"]!=="r" && $seccion !== "/"){?>
                <a class="btn-book-a-table" href="/reserva">Reservar</a>
            <?php }?>
                
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
