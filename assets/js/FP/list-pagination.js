window.onload = main;


function main()
{

	var listItems = gatherListItems(document, 'pics');
	var n = listItems.length;

	var pointer = n % 2 == 0 ? n / 2 - 1 : Math.floor(n / 2);

	var leftButton  = document.querySelector('#left');
	var rightButton = document.querySelector('#right');

	leftButton.onclick  = moveLeft;
	rightButton.onclick = moveRight;
	paginate();

	function moveLeft()
	{
		if (pointer > 0) {
			pointer--;
			paginate();
		}
	}

	function moveRight()
	{
		if (pointer < n - 1) {
			pointer++;
			paginate();
		}
	}

	function paginate()
	{
		check(leftButton, rightButton, pointer, n);
		annotedItems = triage(5, 5, listItems, pointer);

		for (var i = 0; i < n; i++) {
			var tag = annotedItems[i][0];
			var li  = annotedItems[i][1];
			switch (tag) {
				case 'hide':
					li.style.display = 'none';
					li.style.fontWeight = '';
					break;
				case 'focus':
					li.style.display = '';
					li.style.fontWeight = 'bold';
					break;
				default:
					li.style.display = '';
					li.style.fontWeight = '';
			}
		}

		return annotedItems;
	}

	function check()
	{
		leftButton.style.visibility  = pointer > 0     ? 'visible' : 'hidden';
		rightButton.style.visibility = pointer < n - 1 ? 'visible' : 'hidden';
	}

}


function triage(leftN, rightN, arr, index)
{
	var n   = arr.length;
	var res = [];
	var i;
	if (index >= leftN) {
		for (i = 0; i < index - leftN; i++) {
			res[i] = ['hide', arr[i]];
		}
		for (i = index - leftN; i < index; i++) {
			res[i] = ['left', arr[i]];
		}
	} else { // index < leftN
		for (i = 0; i < index; i++) {
			res[i] = ['left', arr[i]];
		}
	}
	res[index] = ['focus', arr[i]];
	if (index + rightN < n) {
		for (i = index + 1; i <= index + rightN; i++) {
			res[i] = ['right', arr[i]];
		}
		for (i = index + rightN + 1; i < n; i ++) {
			res[i] = ['hide', arr[i]];
		}
	} else { // index + rightN >= n
		for (i = index + 1; i < n; i++) {
			res[i] = ['right', arr[i]];
		}
	}
	return res;
}


function test_triage()
{
	var actual1   = triage(2, 2, [10, 20, 30, 40, 50, 60, 70, 80, 90], 4);
	var expected1 = [['hide', 10], ['hide', 20], ['left', 30], ['left', 40], ['focus', 50], ['right', 60], ['right', 70], ['hide', 80], ['hide', 90]];

	var actual2 = triage(2, 2, [10, 20, 30, 40], 1);
	var expected2f = [['fill', null], ['left', 10], ['focus', 20], ['right', 30], ['right', 40]];
	var expected2  = [                  ['left', 10], ['focus', 20], ['right', 30], ['right', 40]];

	var actual3 = triage(2, 2, [10, 20, 30, 40], 2);
	var expected3f = [['left', 10], ['left', 20], ['focus', 30], ['right', 40], ['fill', null]];
	var expected3  = [['left', 10], ['left', 20], ['focus', 30], ['right', 40]                ];

	return relEq(actual1, expected1) && relEq(actual2, expected2) && relEq(actual3, expected3);
}
