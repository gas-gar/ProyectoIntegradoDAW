<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Layouts
{
  // Instance de Codeigniter
  private $CI = null;

  function __construct()
  {
    $this->CI =& get_instance();
  }
  public function view( $data = array())
  {
    if ( !empty( $data))
    {
      $view_content = $this->CI->load->view( $data['vista'],  $data['params'], TRUE);

      $this->CI->load->view('layouts/' . $data['layout'], array(
        'content_for_layout' => $view_content,
        'title_for_layout' => $data['titulo']
      ));
   }

  }

}
