<?php
use \yii\base\Exception;

/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {hlt_checkbox} function plugin
 * Type:     function<br>
 * Name:     hlt_checkbox<br>
 * Purpose:  print out a string value
 *
 * @author Monte Ohrt <monte at ohrt dot com>
 * @link   http://www.smarty.net/manual/en/language.function.counter.php {counter}
 *         (Smarty online manual)
 *
 * @param array $params parameters
 * @param Smarty_Internal_Template $template template object
 * @return null|string
 * @throws Exception
 */
function smarty_function_hlt_checkbox($params, $template)
{
    if (empty($params["value"]))
        $value = 0;
    else
        $value = $params["value"];

    $text = '';
    if ($value)
        $text = '<img style="margin-bottom: -2px;" src="/images/sprite1.png">';
    else
        $text = '<img style="margin-bottom: -2px;" src="/images/sprite2.png">';
    return $text;
}
