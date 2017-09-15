<?php

namespace app\Controller;

class GalleryController extends CommonController
{
	/** `::class54`: no need for it since PHP 5.5, use `::class` instead */
	const class54 = __CLASS__;

	public function devPortal()
	{
		$title = 'Development portal';
		$viewModel = compact('title');
		$this->render('Gallery/dev-portal', $viewModel);
	}

	public function samples()
	{
		$title = 'Email linkset samples';
		$viewModel = compact('title');
		$this->render('Gallery/samples', $viewModel);
	}

	public function show($offerId, $pictureId)
	{
		$viewModel = $this->showCommon($offerId, $pictureId, "Plain gallery for offer #$offerId");
		$this->render('Gallery/show', $viewModel, 'image');
	}

	public function showJs($offerId, $pictureId)
	{
		$viewModel = $this->showCommon($offerId, $pictureId, "JavaScript gallery for offer #$offerId");
		$this->render('Gallery/show-js', $viewModel, 'slide-js');
	}

	public function domPagination()
	{
		$title        = 'Simplified JavaScript pagination with text list';
		$itemContents = range(1, 25);
		$n            = count($itemContents);
		$iFocus       = $n % 2 == 0 ? $n / 2 - 1 : intval($n / 2);
		$viewModel = compact('title', 'itemContents', 'iFocus');
		$this->render('Gallery/domPagination', $viewModel, 'listscroll-js');
	}
}
