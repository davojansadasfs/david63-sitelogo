<?php
/**
*
* @package Site Logo Extension
* @copyright (c) 2014 david63
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'LOGO_CENTRE'					=> 'Centreren',
	'LOGO_LEFT'						=> 'Links',
	'LOGO_RIGHT'					=> 'Rechts',

	'SITE_LOGO'						=> 'Aangepaste site logo',

	'SITE_LOGO_EXPLAIN'				=> 'Hier kan je de opties voor het aangepaste logo instellen, om het standaard logo te vervangen.',

	'SITE_LOGO_HEIGHT'				=> 'Hoogte logo',
	'SITE_LOGO_HEIGHT_EXPLAIN'		=> 'Als je dit leeg laat, wordt de orginele hoogte van het logo gebruikt.<br />De standaard logo hoogte is 152px.',

	'SITE_LOGO_IMAGE'				=> 'Pad naar het aangepaste logo.',
	'SITE_LOGO_IMAGE_EXPLAIN'		=> 'Als je dit leeg laat wordt het standaard logo gebruikt.<br />Als je een afbeelding van een andere server wilt gebruiken, voer dan de volledige link van de afbeelding in. Zoniet, dan kan je de locatie van het logo op jou website invullen.',

	'SITE_LOGO_LEFT'				=> 'Linker hoeken',
	'SITE_LOGO_LEFT_EXPLAIN'		=> 'De linkerhoeken afronden zodat het bij de banner past.',
	'SITE_LOGO_LOG'					=> '<strong>Aangepaste site logo opties aangepast</strong>',

	'SITE_LOGO_MANAGE'				=> 'Beheer site logo',

	'SITE_LOGO_OPTIONS'				=> 'Site logo opties',

	'SITE_LOGO_PIXELS'				=> 'Pixels',
	'SITE_LOGO_PIXELS_EXPLAIN'		=> 'Stel hier het aantal pixels in voor de afronding.',
	'SITE_LOGO_POSITION'			=> 'Site logo positie',

	'SITE_LOGO_REMOVE'				=> 'Verwijder site logo',
	'SITE_LOGO_REMOVE_EXPLAIN'		=> 'Als je deze optie instelt, wordt de site logo niet meer weergegeven.',
	'SITE_LOGO_RIGHT'				=> 'Rechter hoeken',
	'SITE_LOGO_RIGHT_EXPLAIN'		=> 'De rechterhoeken afronden zodat het bij de banner past.',

	'SITE_LOGO_WIDTH'				=> 'Breedte logo',
	'SITE_LOGO_WIDTH_EXPLAIN'		=> 'Als je dit leeg laat, wordt de orginele breedte van het logo gebruikt.<br />De standaard logo breedte is 149px.',

	'SITE_NAME_SUPRESS'				=> 'sitenaam en beschrijving verbergen',
	'SITE_NAME_SUPRESS_EXPLAIN'		=> 'Als je deze optie instelt wordt de <strong>Sitenaam</strong> en <strong>Site beschrijving</strong> niet meer weergegeven',

	'SITE_SEARCH_REMOVE'			=> 'Verwijder zoekbok',
	'SITE_SEARCH_REMOVE_EXPLAIN'	=> 'Als je deze optie instelt wordt de zoekbok uit de header niet meer weergegeven.',
));
