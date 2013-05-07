// JavaScript Document

startList = function() {
	if (document.all&&document.getElementById) {
		var navRoot = document.getElementById("nav");
		setLi(navRoot);
	}
}

function setLi(node) {
	if (node.childNodes) {
		var i = 0;
		for (i = 0; i<node.childNodes.length; i++) {
			var child = node.childNodes[i];
			if (child.nodeName=="LI") {
				child.onmouseover=function() { this.className+=" over"; }
	  		child.onmouseout=function() { this.className=this.className.replace(" over", ""); }
	  		if (child.childNodes) {
	  			var j = 0;
	  			for (j=0; j<child.childNodes.length; j++) {
						ulnode = child.childNodes[j];
						if (ulnode.nodeName=="UL") {
							setLi(ulnode);
			   		}
			   	}
	  		}
			}
		}
	}
}