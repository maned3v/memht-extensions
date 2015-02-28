<?php

//========================================================================
// MemHT Portal
//
// Copyright (C) 2008-2010 by Miltenovikj Manojlo <dev@miltenovik.com>
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
 * @copyright	Copyright (C) 2008-2013 Miltenovikj Manojlo. All rights reserved.
 * @license     GNU/GPLv2 http://www.gnu.org/licenses/
 */

//Deny direct access
defined("_LOAD") or die("Access denied");

class Comments {
	var $info = array();

	public function GetCode() {
		global $User;
		
		$apicom = Utils::GetComOption("facebook_comments","appid","123456789");
		$widthcom = Utils::GetComOption("facebook_comments","width","470");
		$postscom = Utils::GetComOption("facebook_comments","posts","10");
		$colorcom = Utils::GetComOption("facebook_comments","colorscheme","light");
		
		$plugin_comments = array();
		$plugin_comments = array();
		if ($this->info['active']==1) {
			$plugin_comments['info']['status'] = "active";
			$plugin_comments['info']['url'] = $this->info['url'];
			$plugin_comments['content'] = "<div id=\"fb-root\"></div><div class=\"fb-comments\" data-href=\"".$this->info['url']."\" data-width=\"".$widthcom."\" data-num-posts=\"".$postscom."\" data-colorscheme=\"".$colorcom."\"></div>";
		} else {
			$plugin_comments['info']['status'] = "inactive";
		}
		
		return $plugin_comments;
	}
}

function Comments() {
	class Comments extends BaseComments{}
}

?>