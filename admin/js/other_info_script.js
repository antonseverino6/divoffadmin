$(document).ready(function() {

	var subjects = document.querySelector("#subjects");
	var tleStrands = document.querySelector("#tleStrands");
	var components = document.querySelector("#components");
	var tleStrandsDefault = document.querySelector(".tleStrandsDefault");
	var componentDefault = document.querySelector(".componentDefault");
	var non_teacher_position = $("#non_teacher_position");

	var clickedComponent;

	// default to be disabled
	$(".heComponent").attr("disabled", "true");
	$(".afaComponent").attr("disabled", "true");
	$(".iaComponent").attr("disabled", "true");
	$(".ictComponent").attr("disabled", "true");



	function disableComponent(component) { // sets the component to disable
		$("."+component).attr("disabled", "true");
	}

	function removeComponent(component) { // removes SELECTED attribute in a component
		// document.querySelectorAll("."+component)[0].removeAttribute("selected");
		$("."+component).removeAttr("selected");
	}

	function removeDisable(component) { // removes DISABLE attribute in a component
		$("."+component).removeAttr("disabled");
	}


// =========================== CHECKS IF SELECTED SUBJECT IS TLE IN EDIT_OTHER_INFO ===================== //

	if (subjects.value == "Technology and Livelihood Education (TLE)" && subjects.value !== "") {
		tleStrands.removeAttribute("disabled");
		components.removeAttribute("disabled");

		if (tleStrands.value !== '') {
			switch (tleStrands.value) {
				case "Home Economics (HE)" :
					removeDisable("heComponent");
				break;

				case "Agri-Fishery Arts (AFA)" :
					removeDisable("afaComponent");
						
				break;

				case "Industrial Arts (IA)":
					removeDisable("iaComponent");
				break;

				case "Information and Communication Technology (ICT)":
					removeDisable("ictComponent");
				break;

			}
		}
	}


// =================== ON CHANGE OF SUBJECT TO TLE =========================== //

	subjects.addEventListener("change", function() {
		tleStrandsDefault.removeAttribute("selected");
		componentDefault.removeAttribute("selected");
		document.querySelectorAll(".afaComponent")[0].removeAttribute("selected");


		if (subjects.value !== "Technology and Livelihood Education (TLE)") {
			tleStrands.setAttribute("disabled","true");
			components.setAttribute("disabled","true");
			tleStrandsDefault.setAttribute("selected","true");
			componentDefault.setAttribute("selected","true");

			if (tleStrands.hasAttribute("required")) {
				tleStrands.removeAttribute("required");
			}

			if (components.hasAttribute("required")) {
				components.removeAttribute("required");
			}

		} else {
			tleStrands.removeAttribute("disabled");
			components.removeAttribute("disabled");

			if (tleStrands.value === '') {
				tleStrands.setAttribute("required","true");
			}

			if (components.value === '') {
				components.setAttribute("required","true");
			}

		}

	});


// ================== CHANGES DEPENDS ON THE STRAND SELECTED ============================ //

	tleStrands.addEventListener("click", function() {

		switch (tleStrands.value) {
			case "Home Economics (HE)" :
				disableComponent("afaComponent");
				disableComponent("iaComponent");
				disableComponent("ictComponent");

				$(".heComponent").removeAttr("disabled");
				$(".heComponent").attr('selectedIndex', 0);
				document.querySelectorAll(".heComponent")[0].setAttribute("selected","true");
				// components.value = document.querySelectorAll(".heComponent")[0];
				removeComponent("afaComponent");
				removeComponent("iaComponent");
				removeComponent("ictComponent");
			break;

			case "Agri-Fishery Arts (AFA)" :
				disableComponent("heComponent");
				disableComponent("iaComponent");
				disableComponent("ictComponent");
				
				$(".afaComponent").removeAttr("disabled");
				document.querySelectorAll(".afaComponent")[0].setAttribute("selected","true");
				removeComponent("heComponent");
				removeComponent("iaComponent");
				removeComponent("ictComponent");					
			break;

			case "Industrial Arts (IA)":
				disableComponent("heComponent");
				disableComponent("afaComponent");
				disableComponent("ictComponent");

				$(".iaComponent").removeAttr("disabled");
				document.querySelectorAll(".iaComponent")[0].setAttribute("selected","true");
				removeComponent("heComponent");
				removeComponent("afaComponent");
				removeComponent("ictComponent");	
			break;

			case "Information and Communication Technology (ICT)":
				disableComponent("heComponent");
				disableComponent("afaComponent");
				disableComponent("iaComponent");

				$(".ictComponent").removeAttr("disabled");
				document.querySelectorAll(".ictComponent")[0].setAttribute("selected","true");
				removeComponent("heComponent");
				removeComponent("afaComponent");
				removeComponent("iaComponent");
			break;

			default :
				disableComponent("heComponent");
				disableComponent("afaComponent");
				disableComponent("aiComponent");
				disableComponent("ictComponent");					

				document.querySelector(".componentDefault").setAttribute("selected","true");
				removeComponent("heComponent");
				removeComponent("afaComponent");
				removeComponent("iaComponent");
				removeComponent("ictComponent");
			break;
		}

	}); // END OF CLICKED FUNCTION


	$(".subjectToggle").hide(); // defaults hide the subject and its components


	if ($("#non-teaching-input").attr("checked")) {
		showOrHideSubject();

		non_teacher_position.change(function() {
		showOrHideSubject();
		});
		
	} else if ($("#teaching-input").attr("checked")) {
		$(".subjectToggle").slideDown(500);
	}




	$("#teaching-radio").on("click", function() { // if teaching was clicked then it will show subject
		$(".subjectToggle").slideDown(500);
	});

	$("#non-teaching-radio").on("click", function() { // if position is head teacher then show subject

		showOrHideSubject();
		

		non_teacher_position.change(function() {
		showOrHideSubject();
		});

	});		


	function showOrHideSubject() { // THIS IS A FUNCTION THAT CHECKS IF HEAD TEACHERS ARE CHOSEN
		if(non_teacher_position.val() === 'HEAD TEACHER I' || non_teacher_position.val() === 'HEAD TEACHER II'
				|| non_teacher_position.val() === 'HEAD TEACHER III' || non_teacher_position.val() === 'HEAD TEACHER IV'
				|| non_teacher_position.val() === 'HEAD TEACHER V' || non_teacher_position.val() === 'HEAD TEACHER VI') {

			return $(".subjectToggle").slideDown(500);

		} else {
			return $(".subjectToggle").slideUp(500);
		}
	}
		
	$("#sdo-based-radio").on("click", function() { // if sdo was clicked then subject will be hidden
		$(".subjectToggle").slideUp(500);
	});	




});


      
