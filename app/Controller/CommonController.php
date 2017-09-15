<?php

namespace app\Controller;

use framework\Controller;
use framework\ORM\Statement;

class CommonController extends Controller
{

	protected function showCommon($offerId, $pictureId, $title)
	{
		$identifyOffer = [':offerId' => [$offerId, \PDO::PARAM_INT]];
		$offerStatement = new Statement(
			'
				SELECT
					`a`.`id`      AS `advisor_id`,
					`a`.`name`    AS `advisor_name`,
					`f`.`id`      AS `flat_id`,
					`f`.`address` AS `flat_address`,
					`o`.`id`      AS `offer_id`,
					`o`.`date`    AS `due_date`,
					`o`.`email`   AS `sent_email`
				FROM `offer` AS `o`
					JOIN `flat`    AS `f` ON `f`.`id` = `o`.`flat_id`
					JOIN `advisor` AS `a` ON `a`.`id` = `o`.`advisor_id`
				WHERE `o`.`id` = :offerId
			',
			$identifyOffer
		);
		$offer = $offerStatement->queryOneOrAll(true);

		$picsStatement = new Statement(
			'
				SELECT
					`p`.`id`      AS `id`,
					`p`.`src`     AS `src`
				FROM `offer` AS `o`
					JOIN `flat`    AS `f` ON `f`.`id`      = `o`.`flat_id`
					JOIN `picture` AS `p` ON `p`.`flat_id` = `f`.`id`
				WHERE `o`.`id` = :offerId
			',
			$identifyOffer
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
		return compact('title', 'offer', 'pictures', 'focus', 'focusedPicture', 'offerId', 'pictureId', 'prevId', 'nextId');
	}

}
