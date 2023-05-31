<section class=" section-bg book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header mt-3">
          <p>RALICE <span>SU MEJOR</span> PEDIDO</p>
        </div>
        <div class="row bg-light">

          <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

          <div class="col-lg-8 d-flex align-items-center reservation-form">
            <form action="/reserva" method="post">
              <div class="row gy-4">
                <div class="col-lg-6 col-md-6">
                    <label class="form-label" for="correo_electronico">Correo Electronico</label>
                    <input type="email" name="correo_electronico" value="<?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"]["correo_electronico"] : "";?>" class="form-control" placeholder="Correo Electronico">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["correo_electronico"]) ? $error["correo_electronico"] : "";?></div>
                </div>
                  <div class="col-lg-4 col-md-6">
                      <label class="form-label" for="id_menu">Menu</label>
                      <select class="form-select" name="id_menu">
                            <option>-----------------</option>
                        <?php foreach ($menus as $menu):?>
                            <option value="<?php echo $menu["id_menu"]?>"><?php echo $menu["nombre_menu"]?></option>
                        <?php endforeach;?>
                  </select>
                   <div class="col-lg-12 text-danger"><?php echo isset($error["id_menu"]) ? $error["id_menu"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="fecha_recogida">Fecha Recogida</label>
                    <input type="date" name="fecha_recogida" class="form-control" id="date" placeholder="Fecha">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["fecha_recogida"]) ? $error["fecha_recogida"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="hora_recogida">Hora Recogida</label>
                    <input type="time" class="form-control timer" name="hora_recogida" placeholder="Hora">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["hora_recogida"]) ? $error["hora_recogida"] : "";?></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label" for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
                    <div class="col-lg-12 text-danger"><?php echo isset($error["cantidad"]) ? $error["cantidad"] : "";?></div>
                </div>
                  <div class="col-lg-12 col-md-6">
                    <textarea class="form-control" name="comentario" rows="5" placeholder="Comentario"></textarea>
                    <div class="validate"></div>
              </div>
              </div>
              <div class="text-center mt-2"><button class="btn btn-outline-danger" type="submit">Realizar Reserva</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>

