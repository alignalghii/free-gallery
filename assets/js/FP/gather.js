
function gatherListItems(doc, listId)
{
	var coll = document.querySelector('ul#' + listId);
	return Array.from(coll.children);
}

function gatherListIds()
{
	els = document.querySelectorAll('ul > li[id]');
	return els.semiMap(getId);
}

function getId(el) {return el.getAttribute('id');}

NodeList.prototype.semiMap = function (callback) {
	var vals = [];
	this.forEach(
		function (node) {
			val = callback(node);
			vals.push(val);
		}
	);
	return vals;
}

function gatherIds_hack(resourceLimit)
{
	var ids = [];
	var resourceConsumed = 0;
	var state = 'virgin';
	var i = 0;
	while (state != 'exited' && resourceConsumed < resourceLimit) {
		var el = document.getElementById(i);
		switch (state) {
			case 'virgin':
				if (el) {
					ids.push(i);
					state = 'entered';
				}
				break;
			case 'entered':
				if (el) {
					ids.push(i);
				} else {
					state = 'exited';
				}
				break;
		}
		i++;
		resourceConsumed++;
	}
	return ids;
}
