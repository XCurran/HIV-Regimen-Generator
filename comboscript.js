
// The following function goes over every single NRTI (in both columns) and then compares the same ones. If two of the same NRTIs are selected, an error is given and the 
// combo page does not advance to the results page.

function check() {
			var v1=document.getElementById("Abacavir");
			var v2=document.getElementById("Didanosine");
			var v3=document.getElementById("Lamivudine");
			var v4=document.getElementById("Stavudine");
			var v5=document.getElementById("Tenofovir Disoproxil Fumarate");
			var v6=document.getElementById("Zidovudine");
			
			var c1 = 0;
			var c2 = 0;
			var c3 = 0;
			var c4 = 0;
			var c5 = 0;
			var c6 = 0;
			var ct = 0;
			
			
			if (v1.checked == true){
				var c1 = 1;
			}
			if (v2.checked == true){
				var c2 = 1;
			}
			if (v3.checked == true){
				var c3 = 1;
			}
			if (v4.checked == true){
				var c4 = 1;
			}
			if (v5.checked == true){
				var c5 = 1;
			}
			if (v6.checked == true){
				var c6 = 1;
			}
			
			var ct = c1+c2+c3+c4+c5+c6;
			
			if (ct < 2){
				alert("choose two nrtis")
				return false;
			}
			
			
			
			
		}