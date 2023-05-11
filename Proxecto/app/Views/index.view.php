<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($usuarios as $usuario){?>
    <tr class="<?php echo $usuario["baja_usuario"]!= 0 ? "table-danger" :"";?>">
        <th scope="row"><?php echo $usuario["id_usuario"];?></th>
        <td><?php echo $usuario["nombre_usuario"];?></td>
        <td><?php echo $usuario["apellidos"];?></td>
        <td><?php echo $usuario["correo_electronico"];?></td>
        <td><a href="/view/<?php echo $usuario["id_usuario"]?>"><i class="bi bi-eye-fill"></i>
    </tr>
      <?php }?>
  </tbody>
</table>
<p class="text-danger">No hay registros para mostrar</p>
        