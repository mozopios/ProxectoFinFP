<section class="section-bg book-a-table mt-5">
      <div class="container align-items-center">
          <div class="col-lg-12 d-flex align-items-center">
            <form action="<?php echo $seccion?>" method="post">
                <?php if(isset($errorGeneral)){?>
                <div class="alert alert-danger">
                    <p class="text-black"><?php echo $errorGeneral?></p>
                </div>
                <?php }?>
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="nombre_usuario">Nombre</label>
                    <input type="text" class="form-control" name="nombre_usuario" value="<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"]["nombre_usuario"] : "";?>" placeholder="Nombre">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["nombre_usuario"]) ? $error["nombre_usuario"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"]["apellidos"] : "";?>" placeholder="Apellidos">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["apellidos"]) ? $error["apellidos"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="correo_electronico">Correo</label>
                    <input type="email" class="form-control" name="correo_electronico" value="<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"]["correo_electronico"] : "";?>" placeholder="Email">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["correo_electronico"]) ? $error["correo_electronico"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"]["telefono"] : "";?>" placeholder="Telefono">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["telefono"]) ? $error["telefono"] : "";?></div>
                </div>
                    <div class=" col-lg-4 col-md-6">
                        <label class="form-label" for="contraseña">Contraseña</label>
                      <input type="password" class="form-control" name="contraseña" value="" placeholder="Sin Modificar">
                      <div class="col-lg-12 text-danger"><?php echo isset($error["contraseña"]) ? $error["contraseña"] : "";?></div>
                    </div>
                    <div class="text-center">
                        <button  class="btn btn-primary" type="submit">Guardar Cambios</button>
                    </div>
            </div>
         </form>

        </div>

      </div>
    </section>