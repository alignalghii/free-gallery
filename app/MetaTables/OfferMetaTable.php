<?php

namespace app\MetaTables;

class StudentMetaTable
{
	const class54 = __CLASS__;

	const NAME = 'offer';

	public static $MOBILE_FIELDS = [
		'flat_id'    => [\PDO::PARAM_INT,  false, null,  ['nonblank'               ]    ],
		'advisor_id' => [\PDO::PARAM_INT,  false, null,  ['nonblank'               ]    ],
		'date'       => [\PDO::PARAM_STR,  false, null,  ['nonblank', 'dateformat' ]    ],
		'email'      => [\PDO::PARAM_STR,  false, null,  ['nonblank', 'emailformat']    ],
	];
}
