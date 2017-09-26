<?php

namespace app\MetaTables;

class DepartmentMetaTable
{
	const class54 = __CLASS__;

	const NAME = 'department';

	public static $MOBILE_FIELDS = [
		'address' => [\PDO::PARAM_STR,  false, null,  ['nonblank']   ],
	];
}
