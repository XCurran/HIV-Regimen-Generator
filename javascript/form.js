


//calculates the BSA (m^2) based on height(cm) and weight(kg)
function bsa(height, weight){
	return Math.sqrt((height * weight) / 3600);
}

//alert(bsa(150,54));

function updateBSA(height,weight){
	var result = bsa(height,weight);
	document.getElementById("bsa").value = result.toFixed(4);
	
}