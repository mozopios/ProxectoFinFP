<section class="hero d-flex align-items-center section-bg mt-0">
    <?php if(isset($usuarios)){?>
    <div class="container-fluid">
        <table class="table table-responsive">
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
                    <a href="/user/edit/<?php echo $usuario["id_usuario"];?>"><i class="bi bi-person-fill-gear text-primary"></i></a>
                    <a href="/user/<?php echo $usuario["baja_usuario"] != 0 ? "alta" : "baja"?>/<?php echo $usuario["id_usuario"];?>"><i class="<?php echo $usuario["baja_usuario"] != 0 ? "bi bi-person-fill-slash text-danger" : "bi bi-person-plus-fill text-success"?>"></i></a></td>
            </tr>
              <?php endforeach;?>
          </tbody>
          <tfoot>
              
          </tfoot>
        </table>
        </div>
    <?php } 
            else {?>
    <p></p>
    <?php } ?>
</section>