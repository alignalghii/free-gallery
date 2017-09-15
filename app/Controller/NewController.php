<?php

namespace app\Controller;

class NewController extends CommonController
{
	/** `::class54`: no need for it since PHP 5.5, use `::class` instead */
	const class54 = __CLASS__;

	public function index()
	{
		$this->redirect('http://www.centralhome.hu/');
	}

	public function show2($offerId, $pictureId)
	{
		$viewModel = $this->showCommon($offerId, $pictureId, "Plain gallery for offer #$offerId");
		$this->render('New/show2', $viewModel, 'edge');
	}
}
