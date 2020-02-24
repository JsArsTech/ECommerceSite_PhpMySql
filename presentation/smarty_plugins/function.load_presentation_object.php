<?php 
/*
Plug in functions inside plugin-in files must be named:
smarty_type_name
*/

function smarty_function_load_presentation_object($params, $smarty)
{   
    require_once  PRESENTATION_DIR . $params['filename'] . '.php';
    
    $className = str_replace(
        ' ', '', 
             ucwords(str_replace('_', ' ', $params['filename'])));
    

    $obj = new $className;

    if (method_exists($obj, 'init'))
    {
        $obj->init();
    }

    $smarty->assign($params['assign'], $obj);
}
?>