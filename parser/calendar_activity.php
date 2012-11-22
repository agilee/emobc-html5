<?php

/**
 * Copyright 2012 Neurowork Consulting S.L.
 *
 * This file is part of eMobc.
 *
 *  eMobc is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  eMobc is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with eMobc.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 *Calendar XLM Passer
 *
 *@param string $xml Xml file
 *@param string $data dataId to read
 *@return $total
 */

function traer_info($xml, $data){
	if(!strrpos("__".$xml, "http")){
		$sx = simplexml_load_file($xml);
	} else {
		$content = file_get_contents($xml);
		$sx = simplexml_load_string($content);
	}
	foreach($sx->data as $item)
	{
		if ($data == $item->dataId) {
			$header = $item->headerText;
			foreach($item->events->event as $item2)
			{
			$title[] = $item2->title;
			$date[] = $item2->eventDate;
			$time[] = $item2->time;
			$text[] = $item2->text;
			$nextLevelLevelId[] = $item2->nextLevel->nextLevelLevelId;
			$nextLevelDataId[] = $item2->nextLevel->nextLevelDataId;
			}		
		}
	}	
	$total[0] = $header;
	$total[1] = $title;
	$total[2] = $nextLevelLevelId;
	$total[3] = $nextLevelDataId;
	$total[4] = $date;
	$total[5] = $time;
	$total[6] = $text;
	return $total;

}
?>
