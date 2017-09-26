<?php

namespace app\Controller;

use framework\Controller;
use framework\ORM\Statement;

class CommonController extends Controller
{

	protected function showCommon($saleId, $pictureId, $title)
	{
		$identifySale = [':saleId' => [$saleId, \PDO::PARAM_INT]];
		$saleStatement = new Statement(
			'
				SELECT
					`a`.`id`      AS `leader_id`,
					`a`.`name`    AS `leader_name`,
					`f`.`id`      AS `department_id`,
					`f`.`address` AS `department_address`,
					`o`.`id`      AS `sale_id`,
					`o`.`date`    AS `due_date`,
					`o`.`email`   AS `sent_email`
				FROM `sale` AS `o`
					JOIN `department`    AS `f` ON `f`.`id` = `o`.`department_id`
					JOIN `leader` AS `a` ON `a`.`id` = `o`.`leader_id`
				WHERE `o`.`id` = :saleId
			',
			$identifySale
		);
		$sale = $saleStatement->queryOneOrAll(true);

		$picsStatement = new Statement(
			'
				SELECT
					`p`.`id`      AS `id`,
					`p`.`src`     AS `src`
				FROM `sale` AS `o`
					JOIN `department`    AS `f` ON `f`.`id`      = `o`.`department_id`
					JOIN `picture` AS `p` ON `p`.`department_id` = `f`.`id`
				WHERE `o`.`id` = :saleId
			',
			$identifySale
		);
		$pictures = $picsStatement->queryOneOrAll(false);
		$focus = $pictureId;

		$prevId = $nextId = $cache = null;
		$status = 'virgin';
		foreach ($pictures as $picture) {
			switch ($status) {
				case 'virgin':
					if ($picture['id'] == $pictureId) {
						$status = 'focus';
						$prevId = $cache;

						$focusedPicture = $picture;
					}
					break;
				case 'focus':
					if ($picture['id'] != $pictureId) {
						$status = 'after';
						$nextId = $picture['id'];
					}
					break;
			}
			$cache = $picture['id'];
		}
		return compact('title', 'sale', 'pictures', 'focus', 'focusedPicture', 'saleId', 'pictureId', 'prevId', 'nextId');
	}

}
