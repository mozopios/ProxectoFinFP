<section class="section-bg book-a-table mt-5">
    <div class="container align-items-center">
        <div class="col-lg-12 d-flex align-items-center">
            <form action="<?php echo $seccion?>">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($user) ? $user["nombre_usuario"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="<?php echo isset($user) ? $user["apellidos"] : "";?>" disabled>
                </div>
                  <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="rol">Rol</label>
                    <input type="text" class="form-control" name="rol" value="<?php echo isset($user) ? $user["nombre_rol"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="email">Correo</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($user) ? $user["correo_electronico"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo isset($user) ? $user["telefono"] : "";?>" disabled>
                </div>
               </div>
            </form>
        </div>
    </div>
</section>

