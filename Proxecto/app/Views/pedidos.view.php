<section class="section-header align-items-center section-bg mt-5">
    <div class="container-fluid">
        <?php if(isset($errorGeneral)){?>
            <div class="alert alert-danger">
                <p class="text-black"><?php echo $errorGeneral?></p>
            </div>   
        <?php }?>
    <?php if(!isset($pedidos) && count($pedidos)>0){?>
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
                    <tr>
                        <td><?php echo $pedido["correo_electronico"];?></td>
                        <td><?php echo $pedido["nombre_menu"];?></td>
                        <td><?php echo $pedido["fecha_recogida"];?></td>
                        <td><?php echo $pedido["hora_recogida"];?></td>
                        <td class="items d-inline-block "><a href="/pedidos/view/<?php echo $pedido["id_pedido"];?>"><i class="bi bi-eye-fill text-muted"></i></a>
                        <?php if($_SESSION["permisos"]["pedidos"] != "rw"){?>
                            <a href="/pedidos/<?php echo $pedido["estado_pedido"] != 0 ? "process" : "realizado"?>/<?php echo $pedido["id_pedido"];?>"><i class="<?php echo $pedido["estado_pedido"] != 0 ?"bi bi bi-toggle-on text-success" : "bi bi-toggle-off text-danger" ?>"></i></a></td>
                        <?php }?>
                    </tr>
                <?php endforeach;?>
          </tbody>
        </table>
    </div>
    <?php } 
        else {?>
            <?php if(isset($aviso)){?>
                <p><?php echo $aviso?></p>
            <?php }else{?>
                <p>No hay pedidos para mostrar</p>
            <?php } ?>
        <?php } ?>
</section>

