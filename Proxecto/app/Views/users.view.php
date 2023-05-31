<section class="section-header align-items-center section-bg mt-5">
    <div class="container-fluid">
        <?php if(strpos($_SESSION["permisos"]["menus"],"d")!== false){?>
            <div class="text-end mb-4 me-3"><a href="/users/add"  class="btn btn-primary">Añadir Usuario +</a></div>
        <?php }?>
        <?php if(isset($usuarios)){?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach($usuarios as $usuario):?>
            <tr>
                <td><?php echo $usuario["nombre_usuario"];?></td>
                <td><?php echo $usuario["apellidos"];?></td>
                <td><?php echo $usuario["correo_electronico"];?></td>
                <td><?php echo $usuario["telefono"];?></td>
                <td class="items d-inline-block"><a href="/users/view/<?php echo $usuario["id_usuario"];?>"><i class="bi bi-eye-fill text-muted"></i></a>
                    <a href="/users/edit/<?php echo $usuario["id_usuario"];?>"><i class="bi bi-person-fill-gear text-primary"></i></a>
                    <a href="/users/<?php echo $usuario["baja_usuario"] != 0 ? "alta" : "baja"?>/<?php echo $usuario["id_usuario"];?>"><i class="<?php echo $usuario["baja_usuario"] != 0 ? "bi bi-person-fill-slash text-danger" : "bi bi-person-plus-fill text-success"?>"></i></a></td>
            </tr>
              <?php endforeach;?>
          </tbody>
          <tfoot>
              
          </tfoot>
        </table>
    <?php } 
            else {?>
    <p class="text-bg-info"> No hay usuarios en la base de datos</p>
    <?php } ?>
    </div>
</section>