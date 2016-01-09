<?php
/**
 * Short description for index.php
 *
 * @package index
 * @author raghuram <raghuram@raghuram-HP-Pavilion-g6-Notebook-PC>
 * @version 0.1
 * @copyright (C) 2016 raghuram <raghuram@raghuram-HP-Pavilion-g6-Notebook-PC>
 * @license MIT
 */

//echo $_SERVER['REQUEST_URI'];

$html = '';
$html .= '<input id="url" style="display:none" value="' . explode('/',$_SERVER['REQUEST_URI'])[3] . '"/>';
echo $html;
?>
