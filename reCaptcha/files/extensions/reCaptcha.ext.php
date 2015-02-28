<?php

//========================================================================
// MemHT Portal
// 
// Copyright (C) 2008-2011 by Miltenovikj Manojlo <dev@miltenovik.com>
// http://www.memht.com
// 
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your opinion) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License along
// with this program; if not, see <http://www.gnu.org/licenses/> (GPLv2)
// or write to the Free Software Foundation, Inc., 51 Franklin Street,
// Fifth Floor, Boston, MA02110-1301, USA.
//========================================================================

/**
 * @author      Miltenovikj Manojlo <dev@miltenovik.com>
 * @copyright	Copyright (C) 2008-2011 Miltenovikj Manojlo. All rights reserved.
 * @license     GNU/GPLv2 http://www.gnu.org/licenses/
 */

//Deny direct access
defined("_LOAD") or die("Access denied");

class Captcha extends BaseCaptcha {
	static function Display() {
		global $config_sys;
		if ($config_sys['captcha']!=1) return true;
		
		require_once(_PATH_EXTENSIONS._DS."reCaptcha"._DS."recaptchalib.php");
		$publickey = Utils::GetComOption("reCaptcha","publickey","YOUR_PUBLIC_RECAPTCHA_API_KEY"); //Get your API key from http://recaptcha.net
		echo recaptcha_get_html($publickey);
	}
	
	static function Check($return=false) {
		global $User,$config_sys;
		if ($config_sys['captcha']!=1) return true;
		
		require_once(_PATH_EXTENSIONS._DS."reCaptcha"._DS."recaptchalib.php");
		$privatekey = Utils::GetComOption("reCaptcha","privatekey","YOUR_PRIVATE_RECAPTCHA_API_KEY"); //Get your API key from http://recaptcha.net
		$resp = recaptcha_check_answer($privatekey,$User->Ip(),Io::GetVar("POST","recaptcha_challenge_field"),Io::GetVar("POST","recaptcha_response_field"));
		
		if ($resp->is_valid) {
			return true;
		} else if ($return) {
			return _t("WRONG_CAPTCHA_TEXT");
		} else {
			Error::Trigger("USERERROR",_t("WRONG_CAPTCHA_TEXT"),$resp->error);
		}
	}
}

?>