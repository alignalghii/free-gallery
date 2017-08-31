
function db_name {
	echo '{{{DB_NAME}}}' | sed -f database/config.sed;
}


function database-create {
	sed -f database/config.sed database/database/create.sql.tpl | mysql;
}

function database-drop {
	sed -f database/config.sed database/database/drop.sql.tpl | mysql;
}


function schema-create {
	db_name="$1";
	cd database/schema;
	while read tablename;
		do
			mysql "$db_name" < "table-create-$tablename.sql";
	done < dependencies.dat;
}

function schema-drop {
	db_name="$1";
	tac database/schema/dependencies.dat\
	|
	while read tablename;
		do
			echo 'DROP TABLE `'"$tablename"'`' | mysql "$db_name";
	done;
}
