<?php
/*
Plugin Name: Blip.Fm Emblender
Plugin URI: http://filosofiadevida.marcocarvalho.com/blip-fm-wordpress-plugin/
Description: Use [blipfm ID] or [blipfm URL-to-music] in posts.
Version: 1.0
Author: Marco Carvalho
Author URI: http://swasthya.marcocarvalho.com/
*/

/*  Copyright 2008  Marco Carvalho  (email : marco.carvalho@onda.com.br)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function blipfm_emblend($tc){

	$blip = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="BlipEmbedPlayer" height="150" width="100%" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab"><param name="movie" value="http://blip.fm/_/swf/BlipEmbedPlayer.swf" /><param name="quality" value="high" /><param name="allowScriptAccess" value="always" /><param name="wmode" value="transparent" /><param name="FlashVars" value="blipId=###BLIP###" /><embed src="http://blip.fm/_/swf/BlipEmbedPlayer.swf" quality="high"height="150" width="100%" name="BlipEmbedPlayer" align="middle"play="true"loop="false"quality="high"allowScriptAccess="always"type="application/x-shockwave-flash"pluginspage="http://www.adobe.com/go/getflashplayer"wmode="transparent"flashVars="blipId=###BLIP###"></embed></object>';

	$preg = '/\[blipfm http:\/\/blip\.fm\/profile\/\w+\/blip\/(\d+)\]/i';
	$preg2 = '/\[blipfm (\d+)\]/i';

	preg_match_all($preg, $tc, $arr, PREG_SET_ORDER);
	preg_match_all($preg2, $tc, $arr2, PREG_SET_ORDER);

	if(is_array($arr)){
		foreach($arr as $a){
			$tc = str_replace($a[0],str_replace('###BLIP###',$a[1],$blip),$tc);
		}
	}
	if(is_array($arr2)){
		foreach($arr2 as $a){
			$tc = str_replace($a[0],str_replace('###BLIP###',$a[1],$blip),$tc);
		}
	}

	return $tc;
}

add_filter('the_content','blipfm_emblend');

?>