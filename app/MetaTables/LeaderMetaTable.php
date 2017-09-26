<?php

namespace app\MetaTables;

class LeaderMetaTable
{
	const class54 = __CLASS__;

	const NAME = 'leader';

	public static $MOBILE_FIELDS = [
		'name'    => [\PDO::PARAM_STR, false, null,  ['nonblank']    ],
	];
}
