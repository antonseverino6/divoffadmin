  	$(document).ready(function() {
      var employee = $("#employee");
      var sdo_based_type = $(".sdo_based_type");
      var teacher_and_non_teacher_type = $(".teacher_type");
      var position = $("#position");
      // classes for select position
      var sdo_based_position = $(".sdo_based_position");
      var non_teaching_position = $(".non_teaching_position");
      var teaching_position = $(".teaching_position");
      // classes for select employee
      var teaching = $(".teaching");
      var non_teaching = $(".non_teaching");
      var sdo_based_personnel = $(".sdo_based_personnel");
      var employee_type = $("#employee_type");

      var subjects = $("#subjects");
      var tleStrands = $("#tleStrands");
      var components = $("#components");

      var subjectDefault = $(".subjectDefault");
      var tleStrandsDefault = $(".tleStrandsDefault");
      var componentDefault = $(".componentDefault");

      var heComponent = $(".heComponent");
      var afaComponent = $(".afaComponent");
      var iaComponent = $(".iaComponent");
      var ictComponent = $(".ictComponent");


	$("#reset_btn").on("click", function() {
		$("#school_name").val("no_value");
		employee.val("no_value");
		subjects.val("no_value");
		employee_type.val("no_value");
		position.val("no_value");
		subjects.val("no_value");
		tleStrands.val("no_value");
		components.val("no_value");

      	ifDisabledThenRemove(sdo_based_position);
      	ifDisabledThenRemove(non_teaching_position);
      	ifDisabledThenRemove(teaching_position);	

      	ifDisabledThenRemove(teaching);
      	ifDisabledThenRemove(non_teaching);
      	ifDisabledThenRemove(sdo_based_personnel);	

      	ifDisabledThenRemove(teacher_and_non_teacher_type);
      	ifDisabledThenRemove(sdo_based_type);

      	ifDisabledThenRemove(sdo_based_position);
      	ifDisabledThenRemove(non_teaching_position);
      	ifDisabledThenRemove(teaching_position);

      	ifDisabledThenRemove(heComponent);
      	ifDisabledThenRemove(afaComponent);
      	ifDisabledThenRemove(iaComponent);
      	ifDisabledThenRemove(ictComponent);	

      	subjects.attr("disabled", "true");
      	tleStrands.attr("disabled", "true");
      	components.attr("disabled", "true");
	});

      function ifDisabledThenRemove(classOrId) {
        if (classOrId.attr("disabled")) {
          classOrId.removeAttr("disabled");
        }
      }

      function disableComponent(component) { // sets the component to disable
        $("."+component).attr("disabled", "true");
      }

      // === THIS WILL DISABLE EMPLOYEE TYPE AND POSITION DEPENDS ON WHAT EMPLOYEE IS SELECTED ==== //
      // if (employee.val() === '') {
        $("#employee").on("change", function() {

          switch(employee.val()) {
            case 'NON-TEACHING':
              sdo_based_type.attr("disabled","true");
              teaching_position.attr("disabled","true");
              sdo_based_position.attr("disabled","true");
              ifDisabledThenRemove(teacher_and_non_teacher_type);
              ifDisabledThenRemove(non_teaching_position);
              if (!subjects.attr("disabled")) {
                subjects.attr("disabled", "true");
              }
              if (subjects.val() !== "no_value") {
                // subjectDefault.attr("selected", "true");
                subjects.val("no_value");
              }               
              if (tleStrands.val() !== "no_value") {
                // tleStrandsDefault.attr("selected", "true");
                tleStrands.val("no_value");
              } 

              if (components.val() !== "no_value") {
                // componentDefault.attr("selected", "true");
                components.val("no_value");
              }
            break;
            case 'TEACHING':
              sdo_based_type.attr("disabled","true");
              non_teaching_position.attr("disabled","true");
              sdo_based_position.attr("disabled","true");
              ifDisabledThenRemove(teacher_and_non_teacher_type);
              ifDisabledThenRemove(teaching_position);
              ifDisabledThenRemove(subjects);
            break;
            case 'SDO BASED PERSONNEL':
              teacher_and_non_teacher_type.attr("disabled","true");
              non_teaching_position.attr("disabled","true");
              teaching_position.attr("disabled","true");
              ifDisabledThenRemove(sdo_based_type);
              ifDisabledThenRemove(sdo_based_position);
              if (!subjects.attr("disabled")) {
                subjects.attr("disabled", "true");
              }
              if (subjects.val() !== "no_value") {
                // subjectDefault.attr("selected", "true");
                subjects.val("no_value");
              }  

              if (tleStrands.val() !== "no_value") {
                // tleStrandsDefault.attr("selected", "true");
                tleStrands.val("no_value");

              } 

              if (components.val() !== "no_value") {
                // componentDefault.attr("selected", "true");
                components.val("no_value");
              }
            break;
            default :
              if (sdo_based_type.attr("disabled")) {
                sdo_based_type.removeAttr("disabled");
              } else if (teacher_and_non_teacher_type.attr("disabled")) {
                teacher_and_non_teacher_type.removeAttr("disabled");
              } else if (sdo_based_type.attr("disabled") && teacher_and_non_teacher_type.attr("disabled")) {
                sdo_based_type.removeAttr("disabled");
                teacher_and_non_teacher_type.removeAttr("disabled");
              }
              ifDisabledThenRemove(non_teaching_position);
              ifDisabledThenRemove(teaching_position);
              ifDisabledThenRemove(sdo_based_position);
              if (!subjects.attr("disabled")) {
                subjects.attr("disabled", "true");
              }
              if (subjects.val() !== "no_value") {
                // subjectDefault.attr("selected", "true");
                subjects.val("no_value");
              }  
              if (tleStrands.val() !== "no_value") {
                // tleStrandsDefault.attr("selected", "true");
                tleStrands.val("no_value");
              } 

              if (components.val() !== "no_value") {
                // componentDefault.attr("selected", "true");
                components.val("no_value");
              }
            break;
          }
        });        
      // }


        employee_type.on("change", function() {
          switch (employee_type.val()) {
            case 'KINDER':
              sdo_based_personnel.attr("disabled","true");
              ifDisabledThenRemove(teaching);
              ifDisabledThenRemove(non_teaching);
            break;
            case 'ELEMENTARY':
              sdo_based_personnel.attr("disabled","true");
              ifDisabledThenRemove(teaching);
              ifDisabledThenRemove(non_teaching);
            break;
            case 'JUNIOR HIGH SCHOOL':
              sdo_based_personnel.attr("disabled","true");
              ifDisabledThenRemove(teaching);
              ifDisabledThenRemove(non_teaching);
            break;
            case 'SENIOR HIGH SCHOOL':
              sdo_based_personnel.attr("disabled","true");
              ifDisabledThenRemove(teaching);
              ifDisabledThenRemove(non_teaching);
            break;
            case 'OSDS':
              teaching.attr("disabled","true");
              non_teaching.attr("disabled","true");
              ifDisabledThenRemove(sdo_based_personnel);
            break;
            case 'CID':
              teaching.attr("disabled","true");
              non_teaching.attr("disabled","true");
              ifDisabledThenRemove(sdo_based_personnel);
            break;
            case 'SGOD':
              teaching.attr("disabled","true");
              non_teaching.attr("disabled","true");
              ifDisabledThenRemove(sdo_based_personnel);
            break;
            default: 
              ifDisabledThenRemove(sdo_based_personnel);
              ifDisabledThenRemove(teaching);
              ifDisabledThenRemove(non_teaching);
            break;
          }
        });      

        var teaching_choices = ['TEACHER I','TEACHER II','TEACHER III','SPECIAL SCIENCE TEACHER I','SPECIAL EDUCATION TEACHER I','SPECIAL EDUCATION TEACHER II',
                'SPECIAL EDUCATION TEACHER III','MASTER TEACHER I','MASTER TEACHER II','MASTER TEACHER III','MASTER TEACHER IV'];

        position.on("change", function() {

          if (position.val() !== "HEAD TEACHER I" && position.val() !== "HEAD TEACHER II" && position.val() !== "HEAD TEACHER III" &&
              position.val() !== "HEAD TEACHER IV" && position.val() !== "HEAD TEACHER V"  && position.val() !== "HEAD TEACHER VI" &&
              position.val() !== teaching_choices[0] && position.val() !== teaching_choices[1] && position.val() !== teaching_choices[2] && 
  			 position.val() !== teaching_choices[3] && position.val() !== teaching_choices[4] && position.val() !== teaching_choices[5] && 
  			 position.val() !== teaching_choices[6] && position.val() !== teaching_choices[7] && position.val() !== teaching_choices[8] && 
  			 position.val() !== teaching_choices[9] && position.val() !== teaching_choices[10] && position.val() !== teaching_choices[11]) {
          	subjects.attr("disabled", "true");
            subjects.val("no_value");
            tleStrands.val("no_value");
            components.val("no_value");
          }  else {
            ifDisabledThenRemove(subjects);

          }

        });

  // ======== THIS IS FOR THE SUBJECT AREA AND COMPONENTS ======= //

   subjects.on("change", function() {

    switch (subjects.val()) {
      case "Technology and Livelihood Education (TLE)" :
        ifDisabledThenRemove(tleStrands);
        ifDisabledThenRemove(components);
      break;

      default :
        if (!tleStrands.attr("disabled")) {
          tleStrands.attr("disabled", "true");
        }
        if (!components.attr("disabled")) {
          components.attr("disabled", "true");
        }      
        if (tleStrands.val() !== "no_value") {
          // tleStrandsDefault.attr("selected", "true");
          tleStrands.val("no_value");
        } 

        if (components.val() !== "no_value") {
          // componentDefault.attr("selected", "true");
          components.val("no_value");
        }  
      break;
    }

   });


   tleStrands.on("change", function() {

    switch (tleStrands.val()) {
      case "Home Economics (HE)" :
        disableComponent("iaComponent");
        disableComponent("afaComponent");
        disableComponent("ictComponent");

        if (heComponent.attr("disabled")) {
          ifDisabledThenRemove(heComponent);
        }

        components.val("Beauty Care");

      break;

      case "Agri-Fishery Arts (AFA)" :
        disableComponent("heComponent");
        disableComponent("iaComponent");
        disableComponent("ictComponent");

        if (afaComponent.attr("disabled")) {
          ifDisabledThenRemove(afaComponent);
        }
        components.val("Agri-Crop Production");
      break;

      case "Industrial Arts (IA)" :
        disableComponent("heComponent");
        disableComponent("afaComponent");
        disableComponent("ictComponent");

        if (iaComponent.attr("disabled")) {
          ifDisabledThenRemove(iaComponent);
        }
        components.val("Automotive Servicing");
      break;   

      case "Information and Communication Technology (ICT)" :
        disableComponent("heComponent");
        disableComponent("afaComponent");
        disableComponent("iaComponent");

        if (ictComponent.attr("disabled")) {
          ifDisabledThenRemove(ictComponent);
        }
        components.val("Computer Systems Servicing");
      break;   

      default :
        disableComponent("heComponent");
        disableComponent("afaComponent");
        disableComponent("iaComponent");
        disableComponent("iaComponent");
        components.val("no_value");

      break;      
    }

   });

      // AJAX CALL FOR SEARCH

  		$("#search_count_btn").click(function() {
  			$.ajax({
  				url: "ajax/search_count.php",
  				type: "GET",
  				data: $('#search_count_form').serialize(),
  				success: function(d) {
  					$("#search_count_tbody").html(d);
  				}
  			});
  		});

  		$("#search_count_btn").click(function() {
  			$.ajax({
  				url: "ajax/count_of_results.php",
  				type: "GET",
  				data: $('#search_count_form').serialize(),
  				success: function(d) {
  					$("#number_of_results").html(d);
  				}
  			});
  		});  		
  	});