#!/bin/bash

source lib-console/aux.bash;           # used by `parser` module
source lib-console/parser.bash;        # used by `parse` function call
source lib-console/test.bash;          # used by `parse` function call
source lib-console/configure.bash;     # used by `parse` function call
source lib-console/database.bash;      # used by `parse` function call
source lib-console/dbtest-runner.bash; # used by `parse` function call

case "$#" in
	0) help;;
	1) parse "$1";;
	*) parse "$1" "$2";
esac;
