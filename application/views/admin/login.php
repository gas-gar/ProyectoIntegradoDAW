<div class="container">

  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <?php

        # Si existe la variable error que envia el controlador mostraremos el error.
        if ( isset( $error))
        {
          echo "<div class='error'>$error</div>";
        }

      ?>
     <!--  <form class="form-signin" method="POST" action="/login/login"> -->
      <form  name="login" id="login" action="login2" method="post">
        <h4 class="form-signin-heading">Por favor, registrese</h4>
        <label for="email" class="sr-only">Email</label>
        <input type="email" id="correo" name="email" class="form-control frm_login_email" placeholder="Email" required autofocus>
        <label for="password" class="sr-only">Contraseña</label>
        <input type="password" id="pass" name="password" class="form-control frm_login_pass" placeholder="Contraseña" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
        <br><br>
        <a class="btn btn-lg btn-warning btn-block" href="/admin/registro">Alta nuevo cliente</a>
      </form>
    </div>
    <div class="col-lg-4"></div>

  </div>

</div> <!-- /container -->
