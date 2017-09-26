<?php

namespace app\MetaTables;

class SaleMetaTable
{
	const class54 = __CLASS__;

	const NAME = 'sale';

	public static $MOBILE_FIELDS = [
		'department_id'    => [\PDO::PARAM_INT,  false, null,  ['nonblank'               ]    ],
		'leader_id' => [\PDO::PARAM_INT,  false, null,  ['nonblank'               ]    ],
		'date'       => [\PDO::PARAM_STR,  false, null,  ['nonblank', 'dateformat' ]    ],
		'email'      => [\PDO::PARAM_STR,  false, null,  ['nonblank', 'emailformat']    ],
	];
}
