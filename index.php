<?php
/** op-module-webpack:/index.php
 *
 * @created   2018-04-12
 * @version   1.0
 * @package   op-module-webpack
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 * @created   2019-02-25
 */
namespace OP;

/*
//	Get extension from smart url.
if(!$ext = Args()[0] ?? null ){
	return;
}

//	Get layout name.
$layout = Unit('Layout')->Name();

//	Generate MIME.
Load('GetMimeFromExtension');
if( $mime = GetMimeFromExtension($ext) ){

	//	Change MIME.
	Env::Mime($mime);

	//	Disable layout.
	Unit('Layout')->Auto();
}
*/

/* @var $webpack \OP\UNIT\WebPack */
if( $webpack = OP()->Unit('WebPack') ){
	//	Register test for admin.
	if( Env::isAdmin() ){
		$webpack->Auto('./sample/','sample/sample.js','sample/sample.css');
	}

	//	Output packing string.
	$webpack->Auto();
};

//	...
if( Env::isAdmin() ){
	//	...
	$timestamp = date(_OP_DATE_TIME_);
	$layout    = OP()->Layout();

	//	...
	switch( Env::MIME() ){
		case 'text/javascript':
			echo "\n\nconsole.log('WebPack was successful. {$timestamp}, {$layout}');\n";
			break;
		case 'text/css':
			echo "\n\n/* WebPack was successful. {$timestamp}, {$layout}') */\n";
			break;
		default:
	};
}
