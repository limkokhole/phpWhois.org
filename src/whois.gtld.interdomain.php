<?php

/*
  Whois2.php	PHP classes to conduct whois queries
  
  Copyright (C)1999,2000 easyDNS Technologies Inc. & Mark Jeftovic 
  
  Maintained by Mark Jeftovic <markjr@easydns.com>
  
  For the most recent version of this package: 
  
  http://www.easydns.com/~markjr/whois2/
  
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
  
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

/* interdomain.whois    2.0     David Saez Padros <david@ols.es> */
/* interdomain.whois	1.1	David Saez Padros <david@ols.es> */

if(!defined("__INTERDOMAIN_HANDLER__")) define("__INTERDOMAIN_HANDLER__",1);

require_once('whois.generic.php');

class interdomain_handler {

	function parse ($data_str,$query) {

		$items = array(
			"domain.name" => "Domain Name................",
			"domain.created" => "Creation Date............",
			"domain.expires" => "Expiry Date..............",
			"domain.changed" => "Last Update Date.........",
			"domain.nserver." => "Name Server.............",
			"owner.name" => "Organization Name........",
			"owner.organization" => "Organization Org.........",
			"owner.address.street" => "Organization Street......",
			"owner.address.city" => "Organization City........",
			"owner.address.state" => "Organization State.......",
			"owner.address.pcode" => "Organization PC..........",
			"owner.address.country" => "Organization Country.....",
			"owner.phone" => "Organization Phone.......",
			"owner.email" => "Organization e-mail......",
			"owner.handle" => "Organization Contact Id....",
			"admin.handle" => "Administrative Contact Id..",
			"admin.name" => "Administrative Name......",
                        "admin.organization" => "Administrative Org.......",
                        "admin.address.street" => "Administrative Street....",
                        "admin.address.city" => "Administrative City......",
                        "admin.address.state" => "Administrative State.....",
                        "admin.address.pcode" => "Administrative PC........",
                        "admin.address.country" => "Administrative Country...",
                        "admin.phone" => "Administrative Phone.....",
                        "admin.email" => "Administrative e-mail....",
			"admin.fax" => "Administrative Fax.......",
			"tech.handle" => "Technical Contact Id.......",
                        "tech.name" => "Technical Name...........",
                        "tech.organization" => "Technical Org............",
                        "tech.address.street" => "Technical Street.........",
                        "tech.address.city" => "Technical City...........",
                        "tech.address.state" => "Technical State..........",
                        "tech.address.pcode" => "Technical PC.............",
                        "tech.address.country" => "Technical Country........",
                        "tech.phone" => "Technical Phone..........",
                        "tech.email" => "Technical e-mail.........",
                        "tech.fax" => "Technical Fax............"
			);

		$ret = generic_parser_b($data_str,$items,'dmy');
		return $ret;
	}
}

?>
