<section class="section-bg ">
<?php if(isset($usuarios)){?>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Correo</th>
          <th scope="col">Telefono</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($usuarios as $usuario):?>
        <tr class="<?php echo $usuario["baja_usuario"]!= 0 ? "table-danger" :"";?>">
            <th scope="row"><?php echo $usuario["id_usuario"];?></th>
            <td><?php echo $usuario["nombre_usuario"];?></td>
            <td><?php echo $usuario["apellidos"];?></td>
            <td><?php echo $usuario["correo_electronico"];?></td>
            <td><?php echo $usuario["telefono"];?></td>
            <td class="row justify-content-between"><a href="/users/view/<?php echo $usuario["id_usuario"];?>"><i class="bi bi-eye-fill"></i></a>
            <a href="/users/<?php echo $usuario["baja_usuario"] != 0 ? "alta" : "baja"?>/<?php echo $usuario["id_usuario"];?>"><i class="<?php echo $usuario["baja_usuario"] != 0 ? "" : "bi bi-person-fill-check"?>"></i></a></td>
        </tr>
          <?php endforeach;?>
      </tbody>
    </table>
<?php } 
        else {?>
<p></p>
<?php } ?>
</section>