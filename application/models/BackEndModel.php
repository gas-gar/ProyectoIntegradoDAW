<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BackEndModel extends CI_Model
{
  # Variable donde se guarda la conexión a la base de datos
  private $db = null;

  function __construct()
  {
    parent::__construct();
    # Cargamos la conexión a la base de datos
    $this->db = $this->load->database('default', true);
  }

   # Ejecuta consultas y devuelve los resultados en un array
  public function ExecuteArrayResults( $sql)
  {
    $query = $this->db->query( $sql);
    $rows = $query->result_array();
    $query->free_result();

    return ( $rows);
  }

  public function ExecuteResultsParamsArray( $sql, $params)
  {

    $query = $this->db->query( $sql, $params);
    $rows['data'] = $query->result_array();
    $query->free_result();

    return ( $rows);

  }


  # Ejecuta querys sin devolver resultados deletes, inserts o updates
  public function Execute( $sql)
  {
    $this->db->query( $sql);
  }

  /** INSERTAR DATOS EN LA TABLA, RECIBIDO COMO PARÁMETROS */
  public function insert( $tabla, $datos)
  {
    //debug($tabla); debug($datos); die;
    return $this->db->insert( $tabla, $datos);
//    debug($i);die;
  }

  public function update( $tabla, $datos, $where)
  {
    $this->db->update( $tabla, $datos, $where);
  }

  public function delete( $tabla, $where)
  {
    $this->db->delete( $tabla, $where);
  }

  # Método para validar el email y contraseña que nos han pasado desde el formulario
  public function login( $datos)
  {
    $sql = "SELECT * FROM usuario WHERE correo = '".$datos['correo']."' And pass = '".$datos['pass']."'";

    return ( $this->ExecuteArrayResults( $sql ));

  }
  /** LISTADO DE CLIENTES */
  public function ListClientes()
  {
    $sql = "SELECT * FROM usuario ORDER BY nombre ASC";
    return ( $this->ExecuteArrayResults( $sql ));
  }
  public function comprobar_reserva($datos)
  {
//    debug($datos);
    //obtener comensales de la misma fecha
    $sql_comensales = "SELECT SUM(comensales) AS total FROM reserva WHERE fecha = '".$datos['fecha']."';";
    $comensales = $this->ExecuteArrayResults( $sql_comensales );
    //obtener el aforo del restaurante
    $sql_aforo = "SELECT aforo FROM restaurante where id_restaurante = '1';";
    $aforo = $this->ExecuteArrayResults( $sql_aforo );
    $respuesta['aforo'] = $aforo[0]['aforo'];
    $respuesta['reservado'] = $comensales[0]['total'];
    return $respuesta;
/*    debug($comensales);
    debug($aforo);
    //comprobar total aforo con esta reserva
    if ($aforo[0]['aforo'] > ($comensales[0]['total']+$datos['comensales'])) {
//      echo "No hay sitio";
      header ( "location: /reserva/error");
    } else {
      echo "Si hay sitio";
      // TODO: guardar reserva en la BD
    }
*/
}//fin COMPROBAR_RESERVA
//Método para validar el email y contraseña que nos han pasado desde el formulario
public function listado_reservas()
{
  //seleccionamos las columnas necesarias, siempre y cuando la fecha sea posterior a la actual
  $sql = "SELECT 'Administrador', res.id_reserva, r.nombre as restaurante, u.nombre as nombre_cliente, u.correo as correo_cliente, u.telefono as telefono_cliente, res.fecha, res.hora, res.comensales
          FROM reserva res
          INNER JOIN restaurante r ON res.id_restaurante = r.id_restaurante
          INNER JOIN usuario u ON res.id_cliente = id_usuario
          WHERE res.fecha > CURRENT_DATE()
          ORDER BY res.fecha ASC;";

  return ( $this->ExecuteArrayResults( $sql ));
}
public function listado_reservas_cliente($id)
{
  //obtener las reservas realizadas por el cliente id
  $sql_cliente = "SELECT r.id_reserva, rest.nombre as restaurante, u.nombre as nombre_cliente, u.correo as correo_cliente, u.telefono as telefono_cliente, r.fecha, r.hora, r.comensales
                  FROM reserva r
                  INNER JOIN restaurante rest ON rest.id_restaurante = r.id_restaurante
                  INNER JOIN usuario u ON r.id_cliente = u.id_usuario
                  WHERE r.fecha > CURRENT_DATE() AND r.id_cliente = $id
                  ORDER BY r.fecha ASC";
    return $this->ExecuteArrayResults( $sql_cliente );
  //$reserva_cliente = $this->ExecuteArrayResults( $sql_cliente );
//  debug($reserva_cliente);
/*  $respuesta['id_reserva'] = $reserva_cliente[0]['id_reserva'];
  $respuesta['restaurante'] = $reserva_cliente[0]['restaurante'];
  $respuesta['nombre'] = $reserva_cliente[0]['nombre'];
  $respuesta['correo'] = $reserva_cliente[0]['correo'];
  $respuesta['telefono'] = $reserva_cliente[0]['telefono'];
  $respuesta['fecha'] = $reserva_cliente[0]['fecha'];
  $respuesta['hora'] = $reserva_cliente[0]['hora'];
  $respuesta['comensales'] = $reserva_cliente[0]['comensales'];
  return $respuesta;
  */
}
}//FIN CLASE
