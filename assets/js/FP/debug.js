function departmentArr2Str(arr)
{
	switch (arr.length) {
		case 0: return '';
		case 1: return arr[0];
		default:
			var str = arr[0];
			for (var i = 1; i < arr.length; i++) {
				str += ', ' + arr[i];
			}
			return str;
	}
}
