<?php

namespace app\MetaTables;

class StudyGroupMetaTable
{
	const class54 = __CLASS__;

	const NAME = 'advisor';

	public static $MOBILE_FIELDS = [
		'name'    => [\PDO::PARAM_STR, false, null,  ['nonblank']    ],
	];
}
