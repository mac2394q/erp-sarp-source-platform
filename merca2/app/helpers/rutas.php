<?php
class rutas {
    public static function retornarVista(){
        $link = $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];
        $escaped_link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
        return $escaped_link;
    }
    public static function validarRutas($url){
        $encabezados = @get_headers($url);
        if(preg_match("|200|", $encabezados[0])){
            return "200";
        }elseif (preg_match("|404|", $encabezados[0])) {
            return "404";
        }
        
    }
    function url_origin($s, $use_forwarded_host=false) {
        $ssl = ( ! empty($s['HTTPS']) && $s['HTTPS'] == 'on' ) ? true:false;
        $sp = strtolower( $s['SERVER_PROTOCOL'] );
        $protocol = substr( $sp, 0, strpos( $sp, '/'  )) . ( ( $ssl ) ? 's' : '' );
      
        $port = $s['SERVER_PORT'];
        $port = ( ( ! $ssl && $port == '80' ) || ( $ssl && $port=='443' ) ) ? '' : ':' . $port;
        
        $host = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
        $host = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
      
        return $protocol . '://' . $host;
      
      }
      
      function full_url( $s, $use_forwarded_host=false ) {
        return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
      }
      
    //   $absolute_url = full_url( $_SERVER );
    //   echo $absolute_url;
      
    
}
?>