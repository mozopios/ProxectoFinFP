<section class="section-bg book-a-table mt-5">
    <div class="container align-items-center">
        <div class="col-lg-12 d-flex align-items-center">
            <form action="<?php echo $seccion?>">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="name">Nombre</label>
                    <input type="text" class="form-control" name="nombre_menu" value="<?php echo isset($menu) ? $menu["nombre_menu"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="primero">Primero</label>
                    <input type="text" class="form-control" name="primero" value="<?php echo isset($menu) ? $menu["primero"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="primero">Segundo</label>
                    <input type="text" class="form-control" name="segundo" value="<?php echo isset($menu) ? $menu["segundo"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="postre">Postre</label>
                    <input type="text" class="form-control" name="postre" value="<?php echo isset($menu) ? $menu["postre"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="precio_menu">Precio</label>
                    <input type="text" class="form-control" name="precio_menu" value="<?php echo isset($menu) ? $menu["precio_menu"] : "";?>" disabled>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="informacion">Información</label>
                    <textarea class="form-control bg-light" name="informacion" disabled><?php echo isset($menu) ? $menu["informacion"] : "";?></textarea>
                </div>
               </div>
            </form>
        </div>
    </div>
</section>

