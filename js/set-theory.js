function relEq(r, s) {return relSub(r, s) && relSub(s, r);}
function relSub(r, s)
{
	var isSubSet = true;
	for (var i = 0; i < r.length; i++) {
		isSubSet = isSubSet && (i in s) && s[i][0] == r[i][0] && s[i][1] == r[i][1];
	}
	return isSubSet;
}
