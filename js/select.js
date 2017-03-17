function populateOnce(sbOne,sbTwo){
	var sbOne = document.getElementById(sbOne);
	var sbTwo = document.getElementById(sbTwo);
	var i = sbOne.selectedIndex;
	sbTwo.add(sbOne.options[i]);
}