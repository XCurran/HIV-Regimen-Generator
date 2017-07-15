
// The following function goes over every single NRTI (in both columns) and then compares the same ones. If two of the same NRTIs are selected, an error is given and the 
// combo page does not advance to the results page.

function check() {
			var ct1= 0;
			var ct2 =0;
			
			for (c = 1; c < 30; c++) { 
				var s = "a"+c;
				if (document.getElementById(s) != null){
					if (c == 1 || c == 2 || c == 3 || c == 4 || c == 5 || c == 7 || c == 8){
						if (document.getElementById(s).checked == true){
							ct1 = ct1 + 1;
						}
					}
					else{
						if (document.getElementById(s).checked == true){
							ct2 = ct2 + 1;
						}
					}
				}	
			}
			
			if (ct1 < 2){
				alert("CHOOSE AT LEAST TWO NRTIs");
				return false;
			}
			
			if (ct2 == 0){
				alert("CHOOSE AT LEAST ONE OTHER ARV");
				return false;
			}
		}

function check2(){
	var c = 0;
	var d=0;
	do{
		
		if (document.getElementById(c).checked == true){
			d = 1;
			c = c +1;
			return true;
		}
		
		else{
			c = c +1;
		}
	}
	while(document.getElementById(c) != null);
	
	if (d==0){
		alert("CHOOSE AT LEAST ONE OPTION")
		return false;
	}
	
}

function check3(){
		var c = 0;
		
		if (document.getElementById("medtypes").checked == true || document.getElementById("medtypet").checked == true){
			return true;
		}
		
		else{
			alert("CHOOSE BETWEEN SUSPENSION/TABLETS OR BOTH")
			return false;
		}
		
}
function select1(){
	
	for (c = 0; c < 30; c++) { 
		var s = "a"+c;
		if (document.getElementById(s) != null){
			document.getElementById(s).checked = true;
		}
	}
	
}

function select2(){
	
	var c = 0;
	
	do{
		
		if (document.getElementById(c).checked == false){
			document.getElementById(c).checked = true;
			c = c +1;
			
		}
		
		else{
			c=c+1;
		}
	}
	while(document.getElementById(c) != null);
		
}

















