<?php
/* ----------------------------------------------------------------------
 * app/service/views/json.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2012-2023 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This source code is free and modifiable under the terms of
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */

header('Content-type: application/json');

$base_resp = $this->getVar('dontEmitOK') ? [] : ["ok" => !is_null($this->getVar('ok')) ? (bool)$this->getVar('ok') : true];
$return = array_replace($base_resp, caSanitizeArray($this->getVar('content'),['allowStdClass' => true]));

if($this->getVar('pretty_print')){
	print caFormatJson(json_encode($return, JSON_INVALID_UTF8_SUBSTITUTE | JSON_UNESCAPED_SLASHES));
} else {
	print json_encode($return, JSON_INVALID_UTF8_SUBSTITUTE | JSON_UNESCAPED_SLASHES);
}
