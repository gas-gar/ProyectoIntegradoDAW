<div class="container">
  <div class="row">
    <div class="col-lg-12 text-lett">
      <?php

        # Si existe la variable error que envia el controlador mostraremos el error.
        if ( isset( $error))
        {
          echo "<div class='error'>$error</div>";
        }

      ?>
      <h1 class="mt-5">Reservas</h1>
      <!-- FORMULARIO DE RESERVA -->
      <form role="form" action="/add_reserva" method="post">

        <div class="form-group row">
          <label for="nombre" class="col-lg-2 col-form-label">Nombre</label>

            <div class="col-lg-5 text-lett">
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $this->session->cliente['nombre']; ?>" disabled>
            </div>

        </div>

        <div class="form-group row">
          <label for="correo" class="col-lg-2 col-form-label">Email</label>

            <div class="col-lg-8 text-lett">
                <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $this->session->cliente['correo']; ?>" disabled>
          </div>

        </div>

        <div class="form-group row">
          <label for="fecha" class="col-lg-2 col-form-label">Fecha</label>

            <div class="col-lg-3 text-lett">
                <input type="date" class="form-control" id="fecha" name="fecha">
          </div>

        </div>

        <div class="form-group row">
          <label for="hora" class="col-lg-2 col-form-label">Hora</label>

            <div class="col-lg-5 text-lett">
              <input type="time" class="form-control" id="hora" name="hora">
          </div>

        </div>

        <div class="form-group row">
          <label for="comensales" class="col-lg-2 col-form-label">Comensales</label>

            <div class="col-lg-1 text-lett">
              <input type="number" class="form-control" id="comensales" name="comensales">
          </div>

        </div>

<!--          <div class="form-group row">
          <label for="enabled" class="col-lg-2 col-form-label">Activado</label>

            <div class="col-lg-3 text-lett">
              <input type="checkbox"  id="enabled" name="enabled">
          </div>
-->
        </div>



        <br><br>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <!-- FIN FORMULARIO DE RESERVA -->
    </div>

  </div>

</div>
