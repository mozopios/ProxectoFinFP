<section class="section-header align-items-center section-bg mt-5">
    <div class="container-fluid">
        <?php $_SESSION["permisos"] = "Administrador"?>
    <?php if(isset($menus)){?>
        <table class="table">
            <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Primero</th>
              <th scope="col">Segundo</th>
              <th scope="col">Postre</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach($menus as $menu):?>
                <?php if($_SESSION["permisos"]!== "Admnistrador"){?>
                    <?php if($menu["estado_menu"]!== "1"){?>
              <tr>
                        <td><?php echo $menu["nombre_menu"];?></td>
                        <td><?php echo $menu["primero"];?></td>
                        <td><?php echo $menu["segundo"];?></td>
                        <td><?php echo $menu["postre"];?></td>
                        <td class="items d-inline-block "><a href="/menu/view/<?php echo $menu["id_menu"];?>"><i class="bi bi-eye-fill text-muted"></i></a></td>
                    </tr>
                    <?php }?>
                <?php } else{?>
                    <tr>
                        <td><?php echo $menu["nombre_menu"];?></td>
                        <td><?php echo $menu["primero"];?></td>
                        <td><?php echo $menu["segundo"];?></td>
                        <td><?php echo $menu["postre"];?></td>
                        <td class="items d-inline-block"><a href="/menu/view/<?php echo $menu["id_menu"];?>"><i class="bi bi-eye-fill text-muted"></i></a>
                        <a href="/menu/edit/<?php echo $menu["id_menu"];?>"><i class="bi bi-person-fill-gear text-primary"></i></a>
                        <a href="/menu/<?php echo $menu["estado_menu"] != 0 ? "alta" : "baja"?>/<?php echo $menu["id_menu"];?>"><i class="<?php echo $menu["estado_menu"] != 0 ? "bi bi-toggle-off text-danger" : "bi bi bi-toggle-on text-success"?>"></i></a></td>
                    </tr>
                <?php }?>
                  <?php endforeach;?>
          </tbody>
        </table>
    </div>
    <?php } 
        else {?>
    <p></p>
    <?php } ?>
</section>

