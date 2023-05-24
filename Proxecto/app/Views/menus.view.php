<section class="section-bg ">
<?php if(isset($menus)){?>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Primero</th>
          <th scope="col">Segundo</th>
          <th scope="col">Postre</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($menus as $menu):?>
            <?php if($menu["estado_menu"]!== 0){?>
            <tr>
                <td><?php echo $menu["nombre_menu"];?></td>
                <td><?php echo $menu["primero"];?></td>
                <td><?php echo $menu["segundo"];?></td>
                <td><?php echo $menu["postre"];?></td>
                <td class="row justify-content-between"><a href="/menus/view/<?php echo $menu["id_menu"];?>">Mas Información...</a>
            </tr>
            <?php }?>
          <?php endforeach;?>
      </tbody>
    </table>
<?php } 
        else {?>
<p></p>
<?php } ?>
</section>

