<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {smarty_function_include_js_once} function plugin
 *
 * Type:     function<br>
 * Name:     smarty_function_include_js_once<br>
 * Purpose:  to include js script files only once on a page
 * @author   Zachie du Bruyn
 * @param array Format:
 * <pre>
 * array(
 *   'file' => required file name property
 * )
 * </pre>
 * @param Smarty
 */
function smarty_function_include_js_once($params, &$smarty)
{
        if ($smarty->debugging) {
            $_params = array();
            require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
            $_debug_start_time = smarty_core_get_microtime($_params, $smarty);
        }
        $_file = isset($params['file']) ? $params['file'] : '';

        if ($_file != '')
        {
            $includes = $smarty->getTemplateVars('smarty_js_includes');

            // Array is empty
            if (!is_array($includes))
            {
                $includes = array();
            }

            $value = '';
            if (!in_array(md5($_file), $includes))
            {
                $includes[] = md5($_file);
                $smarty->assign('smarty_js_includes', $includes);
                $value = "<script type=\"text/javascript\" src=\"$_file\" ></script>";
            }

            return $value;
        }

        if ($smarty->debugging) {
            $_params = array();
            require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
            $smarty->_smarty_debug_info[] = array('filename'  => $_file,
                                                'depth'     => $smarty->_inclusion_depth,
                                                'exec_time' => smarty_core_get_microtime($_params, $smarty) - $_debug_start_time);
        }

}

/* vim: set expandtab: */

?>
