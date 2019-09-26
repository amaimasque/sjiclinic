function getExaminations(text, filter){

	var texttosearch = text;		
	var filter = filter;

	$.ajax({
	    url: 'filterexams.php',
		type: 'post',
		data: {texttosearch:texttosearch, filter:filter},
		dataType: 'json',
		success:function(response){

		    var len = response.length;
		    var contexams = document.getElementById("cont_examinations");
		    contexams.innerHTML = '';
		    document.getElementById("divnumexams").innerHTML = len;

		    for( var i = 0; i<len; i++){

		        var divexam = document.createElement("div");
		        divexam.className = "div_examination w3-card";

		        if(response[i]['state']==0){
		        	divexam.className += " div_examination_new";
		        }else{
		        	divexam.className += " div_examination_read";
		        }

		        var link = document.createElement("a");
		        link.href = "viewpending.php?at="+ response[i]['service_type'] +"&id=" + response[i]['service_id'];
		        link.className = "w3-container";

		        var row = document.createElement("div");
		        row.className = "w3-row";

		        var col1 = document.createElement("div");
		        col1.className = "w3-col l8 m8 s12";

		        var divclientname = document.createElement("div");
				var spanclientname = document.createElement("span");
				spanclientname.textContent = "Client Name: " + response[i]['client_fullname'];
				divclientname.appendChild(spanclientname);

				var divpetname = document.createElement("div");
				var spanpetname = document.createElement("span");
				spanpetname.textContent = "Pet Name: " + response[i]['pet_name'];
				divpetname.appendChild(spanpetname);

				col1.appendChild(divclientname);
				col1.appendChild(divpetname);

				var col2 = document.createElement("div");
				col2.className = "w3-col l4 m4 s12";

		        var divdatetext = document.createElement("div");
		        divdatetext.textContent = "Date Entered";
		        var divdate = document.createElement("div");
		        divdate.textContent = response[i]['date_entered'];

		        col2.appendChild(divdatetext);
		        col2.appendChild(divdate);

		        row.appendChild(col1);
		        row.appendChild(col2);

		        link.appendChild(row);

		        divexam.appendChild(link);

		        contexams.appendChild(divexam);

		    }
		},
		error:function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
		}
	});
}

$(document).ready(function(){

	$("#examinations").addClass("button_active");

	getExaminations("","");

	$("#texttosearch").keyup(function(){
				
		var texttosearch = $(this).val();
		var filter = $("#sel_filter").val();
		getExaminations(texttosearch, filter);

	});

	$("#sel_filter").change(function(){
		var texttosearch = $("#texttosearch").val();
		getExaminations(texttosearch, filter);
	});
	
});