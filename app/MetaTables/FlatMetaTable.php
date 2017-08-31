<?php

namespace app\MetaTables;

class StudentMetaTable
{
	const class54 = __CLASS__;

	const NAME = 'flat';

	public static $MOBILE_FIELDS = [
		'address' => [\PDO::PARAM_STR,  false, null,  ['nonblank']   ],
	];
}
