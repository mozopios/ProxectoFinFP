<section class="section-bg book-a-table mt-5">
      <div class="container align-items-center">
          <div class="col-lg-12 d-flex align-items-center">
            <form action="<?php echo $seccion?>" method="post">
                <?php if(isset($error["general"])){?>
                <div class="alert alert-danger">
                    <p class="text-black"><?php echo $error["general"]?></p>
                </div>
                <?php }?>
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="nombre_usuario">Nombre</label>
                    <input type="text" class="form-control" name="nombre_usuario" value="<?php echo isset($user) ? $user["nombre_usuario"] : "";?>" placeholder="Nombre">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["nombre_usuario"]) ? $error["nombre_usuario"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="<?php echo isset($user) ? $user["apellidos"] : "";?>" placeholder="Apellidos">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["apellidos"]) ? $error["apellidos"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="id_rol">Rol</label>
                    <select class="form-select" name="id_rol" <?php echo strpos($_SESSION["permisos"]["usuarios"],"d") !== false  && $user["id_usuario"] !== $_SESSION["usuario"]["id_usuario"] ? "" : "disabled"?>>
                        <?php if($roles > 0 && strpos($_SESSION["permisos"]["usuarios"],"d") !== false){
                            foreach ($roles as $rol):?>
                                <option value="<?php echo $rol["id_rol"] ?>" <?php echo (isset($user["id_rol"]) && $user["id_rol"] == $rol["id_rol"]) ? "selected" : "";?>><?php echo $rol["nombre_rol"] ?></option>
                            <?php endforeach;?>
                        <?php }?>
                    </select>
                    <div class="col-lg-12 text-danger"><?php echo isset($error["id_rol"]) ? $error["id_rol"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="correo_electronico">Correo</label>
                    <input type="email" class="form-control" name="correo_electronico" value="<?php echo isset($user) ? $user["correo_electronico"] : "";?>" placeholder="Email">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["correo_electronico"]) ? $error["correo_electronico"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo isset($user) ? $user["telefono"] : "";?>" placeholder="Telefono">
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

