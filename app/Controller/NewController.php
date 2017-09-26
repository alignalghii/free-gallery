<?php

namespace app\Controller;

use framework\Utility\Util;

class NewController extends CommonController
{
	/** `::class54`: no need for it since PHP 5.5, use `::class` instead */
	const class54 = __CLASS__;

	public function index()
	{
		$this->redirect('http://www.centralhome.hu/');
	}

	public function show2($saleId, $pictureId)
	{
		$viewModel = $this->showCommon($saleId, $pictureId, "Plain gallery for sale #$saleId focusing #$pictureId");
		$this->render('New/show2', $viewModel, 'edge');
	}

	public function show2Js($saleId, $pictureId)
	{
		$viewModel = $this->showCommon($saleId, $pictureId, "JavaScripted gallery for sale #$saleId focusing #$pictureId");
		$pictures = $viewModel['pictures'];
		$orderNum = self::orderNum($pictures, $pictureId);

		$viewModel['triagedPictures'] = Util::triage(5, 5, $pictures, $orderNum);
		$viewModel['triageCfg'] = ['left' => 5, 'right' => 5]; /** @TODO remove redundancy */

		$this->render('New/show2-js', $viewModel, 'edge-js');
	}

	private static function orderNum($pictures, $pictureId)
	{
		$n = count($pictures);
		for ($i = 0; $i < $n; $i++) {
			if ($pictures[$i]['id'] == $pictureId) return $i;
		}
		return null;
	}
}
