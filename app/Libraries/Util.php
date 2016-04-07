<?php 
	
namespace CodeCommerce\Libraries;

/**
* 
*/
class Util
{
	
	public static function decimal2($valor) 
    {

        if (is_numeric($valor)) {

            return number_format($valor, 2,",",".");

        } else {

            return number_format(0, 2,",",".");

        }

    }
    
	public static function toFloat($valor) 
    {

        $source = array('.', ','); 
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $valor); 
        return $valor;

    }

}
