<?php
/**
 * Plugin Name: WordPress Easy Setting
 * Plugin URI: https://www.ibadboy.net
 * Description: 这个库封装了WordPress自带的Settings API并提供简洁明了的调用方法。
 * Author: Xiyuan Sun <sxy@ibadboy.net>
 * Author URI: https://www.ibadboy.net
 * Version: 1.4.0
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

require_once dirname( __FILE__ ) . '/src/class.settings-api.php';
require_once dirname( __FILE__ ) . '/example/oop-example.php';

new WeDevs_Settings_API_Test();