<section class="section-header align-items-center section-bg mt-5 ">
    <div class="container-fluid">
    <?php if(isset($menus)){?>
            <?php if(isset($errorGeneral)){?>
                <div class="alert alert-danger">
                    <p class="text-black"><?php echo $errorGeneral?></p>
                </div>   
            <?php }?>
            <?php if($_SESSION["permisos"]["menus"] === "rwd"){?>
                <div class="text-end mb-4 me-3"><a href="/menus/add"  class="btn btn-primary">Añadir Menu +</a></div>
            <?php }?>
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
                <?php if(strpos($_SESSION["permisos"]["menus"],"d")=== false && $_SESSION["permisos"]["menus"]!== "r" ){;?>
                    <?php if($menu["estado_menu"]!= "1"){?>
              <tr>
                        <td><?php echo $menu["nombre_menu"];?></td>
                        <td><?php echo $menu["primero"];?></td>
                        <td><?php echo $menu["segundo"];?></td>
                        <td><?php echo $menu["postre"];?></td>
                        <td class="items d-inline-block "><a href="/menus/view/<?php echo $menu["id_menu"];?>"><i class="bi bi-eye-fill text-muted"></i></a></td>
                    </tr>
                    <?php }?>
                <?php }else{?>
                    <tr>
                        <td><?php echo $menu["nombre_menu"];?></td>
                        <td><?php echo $menu["primero"];?></td>
                        <td><?php echo $menu["segundo"];?></td>
                        <td><?php echo $menu["postre"];?></td>
                        <td class="items d-inline-block"><a href="/menus/view/<?php echo $menu["id_menu"];?>"><i class="bi bi-eye-fill text-muted"></i></a>
                        <?php if($_SESSION["permisos"]["menus"]==="rwd"){?>
                            <a href="/menus/edit/<?php echo $menu["id_menu"];?>"><i class="bi bi-pencil-square text-primary"></i></a>
                        <?php }
                if($_SESSION["permisos"]["menus"]!=="rwd" || $_SESSION["permisos"]["menus"]!=="r"){;?>
                            <a href="/menus/<?php echo $menu["estado_menu"] != 0 ? "alta" : "baja"?>/<?php echo $menu["id_menu"];?>"><i class="<?php echo $menu["estado_menu"] != 0 ? "bi bi-toggle-off text-danger" : "bi bi bi-toggle-on text-success"?>"></i></a></td>
                        <?php };?>
                    </tr>
                <?php } ?>
                  <?php endforeach;?>
          </tbody>
        </table>
    </div>
    <?php } 
        else {?>
    <p></p>
    <?php } ?>
</section>

