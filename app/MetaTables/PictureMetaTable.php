<?php

namespace app\MetaTables;

class StudentMetaTable
{
	const class54 = __CLASS__;

	const NAME = 'picture';

	public static $MOBILE_FIELDS = [
		'flat_id'       => [\PDO::PARAM_INT,  false, null,  ['nonblank']    ],
		'src'           => [\PDO::PARAM_STR,  false, null,  ['nonblank']    ],
	];
}
