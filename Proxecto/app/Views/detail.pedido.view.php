<section class="section-bg book-a-table mt-5">
    <div class="container align-items-center">
        <div class="col-lg-12 d-flex align-items-center">
            <form action="<?php echo $seccion?>">
                <div class="row gy-3">
                    <h5>Información Cliente</h5>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="name">Nombre Cliente</label>
                        <input type="text" class="form-control" name="name" value="<?php echo isset($user) ? $user["nombre_usuario"] : "";?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" value="<?php echo isset($user) ? $user["apellidos"] : "";?>" disabled>
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
                <div class="row gy-3 mt-3">
                    <h5>Información Menú</h5>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="name">Nombre Menu</label>
                        <input type="text" class="form-control" name="nombre_menu" value="<?php  echo isset($menu) ? $menu["nombre_menu"] : "";?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="primero">Primero</label>
                        <input type="text" class="form-control" name="primero" value="<?php  echo isset($menu) ? $menu["primero"] : "";?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="primero">Segundo</label>
                        <input type="text" class="form-control" name="segundo" value="<?php  echo isset($menu) ? $menu["segundo"] : "";?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="postre">Postre</label>
                        <input type="text" class="form-control" name="postre" value="<?php  echo isset($menu) ? $menu["postre"] : "";?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="precio_menu">Cantidad</label>
                        <input type="text" class="form-control" name="precio_menu" value="<?php  echo isset($pedido) ? $pedido["cantidad"] : "";?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="precio_menu">Precio Menu</label>
                        <div class="d-flex align-items-center col-lg-3">
                            <input type="text" class="form-control d-flex align-items-center" name="precio_menu" value="<?php  echo isset($menu) ? $menu["precio_menu"] : "";?>" disabled>
                            <i class="bi bi-currency-euro text-black"></i>
                        </div>
                    </div>
                </div>
                <div class="row gy-4 mt-3">
                    <h5>Información Pedido</h5>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="fecha_recogida">Fecha Recogida</label>
                        <input type="text" class="form-control" name="precio_menu" value="<?php  echo $pedido["fecha_recogida"];?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label" for="hora_recogida">Hora Recogida</label>
                        <input type="text" class="form-control" name="precio_menu" value="<?php  echo $pedido["fecha_recogida"];?>" disabled>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label text-danger" for="precio_menu">Total a pagar en Caja</label>
                        <div class="d-flex align-items-center col-lg-3">
                            <input type="text" class="form-control d-flex align-items-center" name="precio_menu" value="<?php  echo isset($pedido) ? $pedido["total_pagar"] : "";?>" disabled>
                            <i class="bi bi-currency-euro text-black"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label" for="hora_recogida">Estado</label>
                        <input type="text" class="form-control text-lg-center text-black <?php  echo $pedido["estado_pedido"] === "0" ? "bg-danger" : "bg-success";?>" name="precio_menu" value="<?php  echo $pedido["estado_pedido"] === "0" ? "En Proceso" : "Realizado";?>" disabled>
                    </div>
               </div>
            </form>
        </div>
    </div>
</section>

