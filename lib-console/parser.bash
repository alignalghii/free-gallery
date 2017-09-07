# Little parser for command-line options of the `console.bash` miniapplication

function parse {
	case "$1" in
		help)
			help;;
		server-start)
			(
				cd web;
				php -S localhost:8000 htaccess-for-builtin-server.php &
			);;
		server-status)
			server-status;;
		server-stop)
			line=`server-status`;
			pid=`echo "$line" | awk '{print $2}'`;
			if test -z $pid;
				then
					message "No process found to stop";
				else
					echo $line;
					if confirm "Confirm killing process $pid? (empty: no, any other: yes) ";
						then kill "$pid";
					fi;
			fi;;
		test-out)
			testWithHosts localhost:8000 mini-studadmin http://web.studentadministrationframework.nhely.hu;;
		test-in)
				php test/frontal-test.php;;
		configure)
			configure;;
		environment)
			if test $# -lt 2;
				then
					echo Current environment:;
					echo +-------------;
					sed 's/^/|  /' database/config.sed;
					echo +-------------;
					echo Environments to be selected:
					(
						cd database;
						ls config.*.sed | sed 's/^config\.\([a-zA-Z0-9_-]\+\)\.sed$/ - \1/' | grep -v sample;
					);
				else
					environment="$2";
					(
						cd database;
						cp "config.$environment.sed" config.sed;
					);
			fi;;
		database-create)
			database-create;; # autodetect by config.sed module and db_name function
		database-drop)
			database-drop;;   # autodetect by config.sed module and db_name function
		schema-create)
			schema-create "`db_name`";;
		schema-drop)
			schema-drop "`db_name`";;
		dbtest)
			dbtest-runner "`db_name`";;
		unit-tests)
			(cd test; php unit-tests.php);;
		*)
			help;
	esac;
}
