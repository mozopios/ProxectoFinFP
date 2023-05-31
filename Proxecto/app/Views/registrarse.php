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
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9 mt-5">
                    <div class="card shadow-lg">
                            <div class="card-body">
                                <h1 class="fs-4 card-title fw-bold mb-4">Registrarse</h1>
                                <form method="post" action ="/registro">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="nombre_usuario">Nombre</label>
                                        <input id="name" type="text" class="form-control" name="nombre_usuario" value="">
                                        <div class="text-danger">
                                            <?php echo isset($error["nombre_usuario"]) ?$error["nombre_usuario"]: "";?>	
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="apellidos">Apellidos</label>
                                        <input id="name" type="text" class="form-control" name="apellidos" value="" >
                                        <div class="text-danger">
                                            <?php echo isset($error["apellidos"]) ? $error["apellidos"] : "";?>	
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="telefono">Telefono</label>
                                        <input id="name" type="text" class="form-control" name="telefono" value="">
                                        <div class="text-danger">
                                            <?php echo isset($error["telefono"]) ? $error["telefono"] : "";?>	
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="correo_electronico">Correo Electronico</label>
                                        <input id="email" type="email" class="form-control" name="correo_electronico" value="">
                                        <div class="text-danger">
                                            <?php echo isset($error["correo_electronico"]) ? $error["correo_electronico"] : "";?>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="contraseña">Contraseña</label>
                                        <input id="password" type="password" class="form-control" name="contraseña">
                                        <div class="text-danger">
                                           <?php echo isset($error["contraseña"]) ? $error["contraseña"] : "";?>
                                        </div>
                                    </div>

                                    <div class="align-items-center d-flex mt-5">
                                        <button type="submit" class="btn btn-primary ms-auto">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer border-0 ">
                                <div class="text-center">
                                    Ya tienes cuenta? <a href="/login" class="text-primary">Inicie Sesión</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
