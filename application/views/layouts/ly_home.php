<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Proyecto Integrado DAW">
    <meta name="keywords" content="Reservar mesa para restaurante">
    <meta name="author" content="Gastón García Caballero">
    <title>DAW</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="/css/estilos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
      body {
          padding-top: 70px;
          /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
      }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Navigation -->
    <?php
/*    $f = $this->session->has_userdata("cliente");
    echo "f: " . $f;
debug($f);
debug($this->session->cliente);
debug($this->session->cliente['tipo']);
*/
      //comprobar si existe sesión
//      if ($this->session->set_userdata("cliente")) {
        //comprobar si hay sesión iniciada o si es administrador o cliente
        if ($this->session->cliente['tipo'] != 1) {
          require_once dirname( dirname( dirname(__FILE__))) . "/views/includes/menu.php";
        } else {
          require_once dirname( dirname( dirname(__FILE__))) . "/views/includes/menu_adm.php";
        }
//      }
      //require_once dirname( dirname( dirname(__FILE__))) . "/views/includes/menu.php";
      echo $content_for_layout;
      require_once dirname( dirname( dirname(__FILE__))) . "/views/includes/footer.php";
    ?>
    <!-- jQuery Version 1.11.1 -->
    <script src="/bootstrap/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript ((ly_home))-->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/mi.js"></script>
  </body>
</html>
