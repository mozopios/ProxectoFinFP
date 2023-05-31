<section class="section-header align-items-center section-bg mt-5">
    <div class="container-fluid">
        <?php if($_SESSION["permisos"]["pedidos"] == "rw"){?>
            <div class="text-end mb-4 me-3"><a href="/pedidos/add"  class="btn btn-primary">Reservar</a></div>
        <?php }?>
    <?php if(isset($pedidos)){?>
        <table class="table">
            <thead>
            <tr>
              <th scope="col">Correo Electronico</th>
              <th scope="col">Nombre Menu</th>
              <th scope="col">Fecha Recogida</th>
              <th scope="col">Hora Recogida</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach($pedidos as $pedido):?>
                <?php if($_SESSION["permisos"]["pedidos"]=="r"){?>
                    <?php if($pedido["estado_pedido"]=== "0" && $pedido["fecha_recogida"]==date("Y-m-d") || $pedido["fecha_recogida"]==date("Y+1-m-d") && $pedido["hora_recogida"]==date("01:00")){?>
                    <tr>
                        <td><?php echo $pedido["correo_electronico"];?></td>
                        <td><?php echo $pedido["nombre_menu"];?></td>
                        <td><?php echo $pedido["fecha_recogida"];?></td>
                        <td><?php echo $pedido["hora_recogida"];?></td>
                        <td class="items d-inline-block "><a href="/pedidos/view/<?php echo $pedido["id_pedido"];?>"><i class="bi bi-eye-fill text-muted"></i></a>
                        <a href="/pedidos/<?php echo $pedido["estado_pedido"] != 0 ? "process" : "realizado"?>/<?php echo $pedido["id_pedido"];?>"><i class="<?php echo $pedido["estado_pedido"] != 0 ?"bi bi bi-toggle-on text-success" : "bi bi-toggle-off text-danger" ?>"></i></a></td>
                    </tr>
                    <?php }?>
                <?php }else{?>
                    <tr>
                        <td><?php echo $pedido["correo_electronico"];?></td>
                        <td><?php echo $pedido["nombre_menu"];?></td>
                        <td><?php echo $pedido["fecha_recogida"];?></td>
                        <td><?php echo $pedido["hora_recogida"];?></td>
                        <td class="items d-inline-block"><a href="/pedidos/view/<?php echo $pedido["id_pedido"];?>"><i class="bi bi-eye-fill text-muted"></i></a>
                        <a href="/pedidos/<?php echo $pedido["estado_pedido"] != 0 ? "process" : "realizado"?>/<?php echo $pedido["id_pedido"];?>"><i class="<?php echo $pedido["estado_pedido"] != 0 ?"bi bi bi-toggle-on text-success" : "bi bi-toggle-off text-danger" ?>"></i></a></td>
                    </tr>
                <?php }?>
                  <?php endforeach;?>
          </tbody>
        </table>
    </div>
    <?php } 
        else {?>
    <p>No hay registros para mostrar</p>
    <?php } ?>
</section>

