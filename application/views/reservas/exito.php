<div class="container">
  <div class="row">
    <div class="col-lg-12 text-lett">
      <div class="col-lg-12 text-lett">
        <h1 class="mt-5">Reserva realizada con éxito.</h1>
        <h4 class="mt-5">Datos de la reserva:</h4>
        </ul>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-lg-12 text-center">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Fecha</th>
              <th scope="col">Hora</th>
              <th scope="col">Comensales</th>
            </tr>
          </thead>
          <tbody>
            <?php
              echo '<tr>
                    <th scope="row">'. ucfirst($this->session->cliente['nombre']) . '</th>
                    <td align=left>'. $this->session->cliente['telefono'] . '</td>
                    <td  align=left>'. $this->session->userdata['fecha'] . '</td>
                    <td align=left>'. $this->session->userdata['hora'] . '</td>
                    <td align=left>'. $this->session->userdata['comensales'] .'</td>
                  </tr>';
            ?>

          </tbody>
        </table>
        <a class="btn btn-primary" href="/modificar_reserva">Modificar Reserva</a>
        <a class="btn btn-primary" href="/bienvenido">Terminar</a>

      </div>
    </div>
<!--      <h2 class="form-signin-heading">Reserva realizada con éxito.</h2><br><br>
      <h4 class="form-signin-heading">Datos de la reserva:</h4>
      <div class="form-group row">
        <form role="form" action="" method="post">
          <label for="nombre" class="col-lg-2 col-form-label">Nombre</label>
            <div class="col-lg-10 text-lett">
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo ucfirst($this->session->cliente['nombre']); ?>" disabled>
          </div>
          <label for="telefono" class="col-lg-2 col-form-label">Teléfono</label>
            <div class="col-lg-10 text-lett">
              <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $this->session->cliente['telefono']; ?>" disabled>
          </div>
          <label for="fecha" class="col-lg-2 col-form-label">Fecha</label>
            <div class="col-lg-10 text-lett">
              <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $this->session->userdata['fecha']; ?>" disabled>
          </div>
          <label for="hora" class="col-lg-2 col-form-label">Hora</label>
            <div class="col-lg-10 text-lett">
              <input type="text" class="form-control" id="hora" name="hora" value="<?php echo $this->session->userdata['hora']; ?>" disabled>
          </div>
          <label for="comensales" class="col-lg-2 col-form-label">Comensales</label>
            <div class="col-lg-10 text-lett mb-5">
              <input type="text" class="form-control" id="comensales" name="comensales" value="<?php echo $this->session->userdata['comensales']; ?>" disabled>
          </div>

          <button type="submit" class="mt-5 btn btn-primary pull-left">Modificar</button>

          <button type="submit" class="mt-5 btn btn-primary pull-right">Terminar</button>
        </form>

      </div>
      <?php
//      debug($this->session->cliente);
/*        echo "<p>Nombre: <b>" . ucfirst($this->session->cliente['nombre']) . "</b></p>";
        echo "<p>Teléfono: <b>" . $this->session->cliente['telefono'] . "</b></p>";
        echo "<p>Fecha: <b>" . $this->session->userdata['fecha'] . "</b></p>";
        echo "<p>Hora: <b>" . $this->session->userdata['hora'] . "</b></p>";
        echo "<p>Comensales: <b>" . $this->session->userdata['comensales'] . "</b></p>";
  */    ?>

    </div>

  </div>

</div>
