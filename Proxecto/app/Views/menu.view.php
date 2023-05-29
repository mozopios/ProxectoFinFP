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
                <div class="col-lg-2 col-md-6">
                    <label class="form-label" for="nombre_menu">Nombre</label>
                    <input type="text" class="form-control" name="nombre_menu" value="<?php echo isset($menu) ? $menu["nombre_menu"] : "";?>">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["nombre_menu"]) ? $error["nombre_menu"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="primero">Primero</label>
                    <input type="text" class="form-control" name="primero" value="<?php echo isset($menu) ? $menu["primero"] : "";?>">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["primero"]) ? $error["primero"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="segundo">Segundo</label>
                    <input type="text" class="form-control" name="segundo" value="<?php echo isset($menu) ? $menu["segundo"] : "";?>">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["segundo"]) ? $error["segundo"] : "";?></div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="form-label" for="postre">Postre</label>
                    <input type="text" class="form-control" name="postre" value="<?php echo isset($menu) ? $menu["postre"] : "";?>">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["postre"]) ? $error["postre"] : "";?></div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <label class="form-label" for="precio_menu">Precio</label>
                    <div class="d-flex align-items-center col-lg-2">
                        <input type="text" class="form-control" name="precio_menu" value="<?php echo isset($menu) ? $menu["precio_menu"] : "";?>">
                        <i class="bi bi-currency-euro text-black"></i>
                    </div>
                    <div class="col-lg-6 text-danger"><?php echo isset($error["precio_menu"]) ? $error["precio_menu"] : "";?></div>
                </div>
                <div class="col-lg-12 col-md-8">
                    <label class="form-label" for="informacion">Información</label>
                    <textarea class="form-control bg-light" name="informacion"><?php echo isset($menu) ? $menu["informacion"] : "";?></textarea>
                    <div class="col-lg-12 text-danger"><?php echo isset($error["informacion"]) ? $error["informacion"] : "";?></div>
                </div>
                <div class="text-end">
                        <button  class="btn btn-primary mt-5" type="submit">Guardar Cambios</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</section>

