<?php

namespace framework\Utility;

class Util
{
	const class54 = __CLASS__;

	public static function eq($a, $b) {return $a == $b;}

	public static function triage($leftN, $rightN, $arr, $index)
	{
		$n   = count($arr);
		$res = [];
		if ($index >= $leftN) {
			for ($i = 0; $i < $index - $leftN; $i++) {
				$res[$i] = ['notdisplayed-left', $arr[$i]];
			}
			for ($i = $index - $leftN; $i < $index; $i++) {
				$res[$i] = ['left', $arr[$i]];
			}
		} else { // index < leftN
			for ($i = 0; $i < $index; $i++) {
				$res[$i] = ['left', $arr[$i]];
			}
		}
		$res[$index] = ['focus', $arr[$i]];
		if ($index + $rightN < $n) {
			for ($i = $index + 1; $i <= $index + $rightN; $i++) {
				$res[$i] = ['right', $arr[$i]];
			}
			for ($i = $index + $rightN + 1; $i < $n; $i++) {
				$res[$i] = ['notdisplayed-right', $arr[$i]];
			}
		} else { // index + rightN >= n
			for ($i = $index + 1; $i < $n; $i++) {
				$res[$i] = ['right', $arr[$i]];
			}
		}
		return $res;
	}

}
