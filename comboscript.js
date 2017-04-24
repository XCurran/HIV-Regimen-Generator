
// The following function goes over every single NRTI (in both columns) and then compares the same ones. If two of the same NRTIs are selected, an error is given and the 
// combo page does not advance to the results page.

function check() {
			var v1=document.getElementById("Abacavir");
			var v2=document.getElementById("Didanosine");
			var v3=document.getElementById("Lamivudine");
			var v4=document.getElementById("Stavudine");
			var v5=document.getElementById("Disoproxil");
			var v6=document.getElementById("Zidovudine");
			
			var v7=document.getElementById("Lopinavir");
			var v8=document.getElementById("Nevirapine");
			var v9=document.getElementById("Raltegravir");
			var v10=document.getElementById("Atazanavir");
			var v11=document.getElementById("Efavirenz");
			var v12=document.getElementById("Darunavir");
			var v13=document.getElementById("Dolutegravir");
			var v14=document.getElementById("Elvitegravir");
		
			
			
			var c1 = 0;
			var c2 = 0;
			var c3 = 0;
			var c4 = 0;
			var c5 = 0;
			var c6 = 0;
			
			var c7 = 0;
			var c8 = 0;
			var c9 = 0;
			var c10 = 0;
			var c11 = 0;
			var c12 = 0;
			var c13 = 0;
			var c14 = 0;
			
			var ct1 = 0;
			var ct2 = 0;
			
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
			if (v7 != null){
				if (v7.checked == true){
					var c7 = 1;
				}
			}
			if (v8 != null){
				if (v8.checked == true){
					var c8 = 1;
				}
			}
			if (v9 != null){
				if (v9.checked == true){
					var c9 = 1;
				}
			}
			if (v10 != null){
				if (v10.checked == true){
					var c10 = 1;
				}
			}
			if (v11 != null){
				if (v11.checked == true){
					var c11 = 1;
				}
			}
			if (v12 != null){
				if (v12.checked == true){
					var c12 = 1;
				}
			}
			if (v13 != null){
				if (v13.checked == true){
					var c13 = 1;
				}
			}
			if (v14 != null){
				if (v14.checked == true){
					var c14 = 1;
				}
			}
			
			
			var ct1 = c1+c2+c3+c4+c5+c6;
			
			var ct2 = c7+c8+c9+c10+c11+c12+c13+c14;
			
			if (ct1 < 2){
				alert("Choose at least two NRTIs and one non-NRTI")
				return false;
			}
			if (ct2 == 0){
				alert("Choose at least two NRTIs and one non-NRTI")
				return false;
			}
		}

function check2(){
	
}