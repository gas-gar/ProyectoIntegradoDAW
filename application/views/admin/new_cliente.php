
<!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-lett">
        <h2 class="mt-5">Cliente nuevo</h2>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-lg-12 text-left">

        <form role="form" action="/add_cliente" method="post">


          <div class="form-group row">
            <label for="nombre" class="col-lg-2 col-form-label">Nombre</label>

              <div class="col-lg-5 text-lett">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca su nombre por favor...">
            </div>

          </div>

          <div class="form-group row">
            <label for="correo" class="col-lg-2 col-form-label">Email</label>

              <div class="col-lg-8 text-lett">
                  <input type="text" class="form-control" id="correo" name="correo" placeholder="Introduzca su correo por favor...">
            </div>

          </div>

          <div class="form-group row">
            <label for="telefono" class="col-lg-2 col-form-label">Teléfono</label>

              <div class="col-lg-3 text-lett">
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Introduzca su teléfono por favor...">
            </div>

          </div>

          <div class="form-group row">
            <label for="pass" class="col-lg-2 col-form-label">Contraseña</label>

              <div class="col-lg-5 text-lett">
                <input type="pass" class="form-control" id="pass" name="pass" placeholder="Introduzca su contraseña por favor...">
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

        <br><br>
      </div>
    </div>

  </div>
