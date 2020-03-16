
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-lett">
        <?php
//        debug($reservas);
          //si es administrador la persona que está modificando
          if ($reservas[0]['Administrador'] != null) {
            //modificando administrador
            echo '<h1 class="mt-5">Listado de reservas para el ' . $reservas[0]['Administrador'] . '</h1>';
          } else {
            // modificando cliente
            echo '<h1 class="mt-5">Listado de reservas para ' . ucfirst($reservas[0]['nombre_cliente']) . '</h1>';





            
          }

         ?>

      </div>
    </div>
    <br>
    <div class="col-lg-12">
      <div class="col-lg-10 text-center">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Restaurante</th>
              <th scope="col">Cliente</th>
              <th scope="col">email</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Día</th>
              <th scope="col">Hora</th>
              <th scope="col">Comensales</th>
            </tr>
          </thead>
          <tbody>
            <?php
//            debug($reservas);
              foreach ( $reservas as $reserva)
              {
                echo '<tr id="' . $reserva['id_reserva'] . '">
                    <td scope="row">'.$reserva['id_reserva'].'</td>
                    <td scope="row">'.$reserva['restaurante'].'</td>
                    <td align=left>'.$reserva['nombre_cliente'].'</td>
                    <td align=left>'.$reserva['correo_cliente'].'</td>
                    <td align=left>'.$reserva['telefono_cliente'].'</td>
                    <td  align=left>'.$reserva['fecha'].'</td>
                    <td  align=left>'.$reserva['hora'].'</td>
                    <td  align=left>'.$reserva['comensales'].'</td>
                    <td><a href="#" OnClick="mod('.$reserva['id_reserva'].')"><img class="mod" src="/images/edit.png" width=20px></a></td>
                    <td><a href="#" OnClick="delete_author('.$reserva['id_reserva'].')"><img src="/images/delete_2.png"  width=20px></a></td>
                  </tr>';
                }
            ?>
          </tbody>
        </table>
        <a href="bienvenido">Salir</a>
      </div>
      <div class="formulario col-lg-2 text-center" id="formulario">
        <form role="form" action="#" method="post">
          <label for="nombre" class="col-lg-2 col-form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $reserva['nombre_cliente']; ?>">
          <label for="correo" class="col-lg-2 col-form-label">Email</label>
          <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $reserva['correo_cliente']; ?>">
          <label for="fecha" class="col-lg-2 col-form-label">Fecha</label>
          <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $reserva['fecha']; ?>">
          <label for="telefono" class="col-lg-2 col-form-label">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $reserva['telefono_cliente']; ?>">
          <label for="comensales" class="col-lg-2 col-form-label">Comensales</label>
          <input type="number" class="form-control" id="comensales" name="comensales" value="<?php echo $reserva['comensales']; ?>">
          <button onclick="cancelar()" class="btn btn-primary">Cancelar</button>
          <button onclick="modificar_reserva()" class="btn btn-primary">Modificar</button>
        </form>
      </div>
    </div>
</div>
