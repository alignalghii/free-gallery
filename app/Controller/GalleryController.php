<?php

namespace app\Controller;

use framework\Controller;
use framework\ORM\Statement;

class GalleryController extends Controller
{
	/** `::class54`: no need for it since PHP 5.5, use `::class` instead */
	const class54 = __CLASS__;



	public function index()
	{
		$title = 'Home';
		$viewModel = compact('title');
		$this->render('Gallery/index', $viewModel);
	}


	public function samples()
	{
		$title = 'Email linkset samples';
		$viewModel = compact('title');
		$this->render('Gallery/samples', $viewModel);
	}

	public function show($offerId, $pictureId)
	{
		$title = "Gallery for offer #$offerId focusing picture #$pictureId";

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
		$viewModel = compact('title', 'offer', 'pictures', 'focus');
		$this->render('Gallery/show', $viewModel);
	}

	public function domPagination()
	{
		$title = 'DOM-pagination';
		$viewModel = compact('title');
		$this->render('Gallery/domPagination', $viewModel, 'dom');
	}
}
