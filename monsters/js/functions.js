function getBirthDate() {
	$('#monsterId').change(function() {
		var monsterid = $(this).val();	
		//alert(monsterid);
		if(monsterid != 0) {
		$.ajax({            
            type: "POST",								
            url: "ajaxCalls/getMonsterBirthDate.php",    							
            data: {monsterid: monsterid},
            success: function(msg){
            		//alert(msg);
					var monster = msg.split(";");
					$("#responseText").html("The birthday for " + monster[0] + " is " + monster[1]);
                } 
          });
		} else {
			$("#responseText").html("");
		}
	});
}

function addMonsters() {
	$('#addMonsterButton').click(function() {
		var firstName = $("#monsterFirstName").val();	
		var lastName = $("#monsterLastName").val();
		var birthDate = $("#monsterBirthDate").val();
		//alert(monsterid);
		$.ajax({            
            type: "POST",								
            url: "ajaxCalls/addMonster.php",    							
            data: {firstName: firstName, lastName: lastName, birthDate: birthDate},
            success: function(msg){
					$("#monsterId").html("<option value='0'> </value>" + msg );
					$("#addMonsterResponse").html("Monster Added!");
					$("#monsterFirstName").val("");
					$("#monsterLastName").val("");
					$("#monsterBirthDate").val("");
                } 
          });
	});
}

$(document).ready(function() {
	getBirthDate();	
	addMonsters();
	$("#monsterFirstName").focus(function() {
		$("#addMonsterResponse").html("");	
	});
	
});