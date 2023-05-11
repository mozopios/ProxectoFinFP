<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pios d'rriba</title>
    
    <!-- Bootstrap 5 css y js -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap-icons/bootstrap-icons.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4 text-white">Pios d'rriba</span>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 text-decoration-none">
           <li><a href="#" class="nav-link px-2 <?php echo $seccion=="/home" ? "text-secondary" : "text-white";?>">Home</a></li>
          
          <li><a href="#" class="nav-link px-2 text-white">Comidas</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Reservas</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Clientes</a></li>
        </ul>

        <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">Login</button>
                <button type="button" class="btn btn-warning">Sign-up</button>
                <button type="button" class="btn btn-warning">Sing-out</button>
        </div>
      </div>
    </div>
  </header>
