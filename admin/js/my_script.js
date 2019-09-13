$(document).ready(function() {

function allow_only_decimals() {
  $('.decimal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.,]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
  });
}

allow_only_decimals();



$(function () {
   $("#inputEmployId").keydown(function (e) {
       if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         (e.keyCode >= 35 && e.keyCode <= 40) ||
         $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
         return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
         (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
   });
});


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});


// ========== Add Employee ============= //

// $('#add_employee_btn').click(function() {

//   if($('#add_first_name').val() == '' || $('#add_last_name').val() == '' || $('#add_middle_name').val() == '' || $('#add_tin_num').val() == '' || 
//      $('#add_email').val() == '' || $('#add_place_birth').val() == '' || $('#add_per_add').val() == '' || $('#add_school_name').val() == '' || 
//      $('#add_school_id').val() == '' || $('#add_biometric').val() == '' || $('#add_job_title').val() == '' || $('#add_work_shift').val() == '' ||
//      $('#add_employ_status').val() == '' || $('#add_role_type').val() == '' || $('#add_div_code').val() == '' || $('#add_region_code').val() == '' ||
//      $('#add_contact_num').val() == '' || $('#add_item_num').val() == '') {

//     Swal.fire({
//       type: 'warning',
//       title: 'Oops...',
//       text: 'All fields should not be left empty except employee id and suffix!',
//     });
    
    // $("#insert_employee_danger").addClass('alert alert-danger').text('All fields should not be left empty except employee id and suffix!').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
//   }else {
//     $.ajax({
//       url: "/divoffadmin/admin/ajax/add_employee.php",
//       type: "post",
//       data: $("#add_employee_form").serialize(),
//       success:function(data) {  
//         $('#insert_success').text(data);
//         $('#insert_employee_danger').text(data);
//         $("#insert_employee_success").addClass('alert alert-success').text('Employee Added!').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
//       }
//     });
//   }
// });

// ==================  TYPEAHEAD FOR EDIT FORMS IN AJAX ============== //

function typeahead_edit_comp_name() {
  $('#edit-comp-name').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_station.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });
}

function typeahead_edit_designation() {
  $('#edit-designation').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_designation.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });  
}

function typeahead_edit_status() {
  $('#edit-status').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_status.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });
}

function typeahead_edit_branch() {
  $('#edit-branch').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/work_exp_branch.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });  
}

function typeahead_edit_cs_exam() {
  $('#edit-cs-exam').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/civil_service_examination.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  }); 
}

function typeahead_edit_special_order_no() {
  $('#edit-special-order-no').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_special_order_no.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  }); 
}

function typeahead_edit_nature_of_ass() {
  $('#edit-nature-ass').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_nature_of_ass.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  });  
}   

function typeahead_edit_item_number() {
  $('#edit-item-number').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_item_number.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  }); 
}

function typeahead_edit_position() {
  $('#edit-position').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_position.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  }); 
}

function typeahead_edit_remarks() {
  $('#edit-remarks').typeahead({
      source: function (query, result) {
          $.ajax({
              url: "/divoffadmin/admin/ajax_autocomplete/details_remarks.php",   
              method: "POST",   
              data: {query:query},            
              dataType: "json",
              success: function (data) {
                result($.map(data, function (item) {
                  return item;
                }));
              }
          });
      },
      autoSelect: false
  }); }
 


// ==================  END OF TYPEAHEAD FOR EDIT FORMS IN AJAX ============== //

function fetch_to_delete_employee() {
  $('.delete_employee_details').click(function() {

    var tin_num = $(this).attr("id");
    $.ajax({
        url: "/divoffadmin/admin/ajax/fetch_to_delete_employee.php",
        type: "post",
        data: {id: tin_num},
        success:function(d) {
          $("#delete_employee_modal").html(d);
          $("#myModal10").modal("show");
          deleteEmployee();
        }
    });
  });  
}

fetch_to_delete_employee();

function deleteEmployee() {
  $('#delete_work_exp_btn').click(function() {
    $.ajax({
      url: "/divoffadmin/admin/ajax/delete_employee.php",
      type: "post",
      data: $('#delete_employee_form').serialize(),
      success:function(d) {
        window.location.reload();
        fetch_to_delete_employee();
      }
    });
  });
}


/************************************************/
            /* Edit AJAX Calls */
/************************************************/

function editWorkExp() {

  $('.edit_workexp_btn').click(function() {
    var work_exp_id = $(this).attr("id");
      $.ajax({
        url: "/divoffadmin/admin/ajax/fetch_to_update_work_exp.php",
        type: "post",
        data: {id : work_exp_id},
        success:function(data) {
          $("#update_work_exp_form_modal").html(data);
          $('#myModal4').modal('show');
          updateWorkExp();
          allow_only_decimals();
          typeahead_edit_comp_name();
          typeahead_edit_designation();
          typeahead_edit_status();
          typeahead_edit_branch();
        }
      });
  });

}
editWorkExp();

function editCivilService() {
  $('.edit_civilserv_btn').click(function() {
  var civil_service_id = $(this).attr("id");
    $.ajax({
      url: "/divoffadmin/admin/ajax/fetch_to_update_civil_service.php",
      type: "post",
      data: {id:civil_service_id},
      success:function(data) {
        $("#update_civil_service_form_modal").html(data);
        $('#myModal5').modal('show');
        updateCivilService();
        allow_only_decimals();
        typeahead_edit_cs_exam();
      }
    });
  });
}
editCivilService();

function editDetails() {
  $('.edit_details_btn').click(function() {
     var details_id = $(this).attr('id');

     $.ajax({
        url: "/divoffadmin/admin/ajax/fetch_to_update_details.php",
        type: "post",
        data: {id:details_id},
        success:function(data) {
          $('#update_details_form_modal').html(data);
          $('#myModal6').modal('show');
          updateDetails();
          allow_only_decimals();
          typeahead_edit_special_order_no();
          typeahead_edit_nature_of_ass();
          typeahead_edit_item_number();
          typeahead_edit_position();
          typeahead_edit_remarks();
        }
     }); 
  });
}
editDetails();


/************************************************/
            /* UPDATE AJAX Calls */
/************************************************/

function updateWorkExp() {

  $("#update_work_exp_btn").click(function() {
    if($('#edit-comp-name').val() == '' || $('#edit-status').val() == '' || $('#edit-designation').val() == '' || $('#edit-salary').val() == '' || $('#edit-branch').val() == '') {
        $("#alert_workexp_station_empty").addClass('alert alert-danger').text('Lv. of abs. and Date of Lv. are the only fields that can be left empty!').fadeIn( 300 ).delay( 1200 ).fadeOut( 1000 );
    }else if($('#edit-from-date-month-work-exp').val() == 0 || $('#edit-from-date-day-work-exp').val() == 0 || $('#edit-to-date-day-work-exp') == 0 || $('#edit-to-date-month-work-exp').val() == 0 ) {
        $("#alert_workexp_station_empty").addClass('alert alert-danger').text('Lv. of abs. and Date of Lv. are the only fields that can be left empty!').fadeIn( 300 ).delay( 1200 ).fadeOut( 1000 );      
    }else {
        $.ajax({
          url: "/divoffadmin/admin/ajax/update_work_exp.php",
          type: "post",
          data:$("#update_work_exp_form").serialize(),
          success:function(data){
              $("#table_work_exp_body").html(data);
              $("#update_work_exp_success_alert").addClass('alert alert-success').text('Work Experience Updated!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
              editWorkExp();
              viewWorkExp();
              getDeleteWorkExp();
              allow_only_decimals();
              typeahead_edit_comp_name();
              typeahead_edit_designation();
              typeahead_edit_status();
              typeahead_edit_branch();
          }
        });
    }
  });
}

function updateCivilService() {

  $("#update_civil_service_btn").click(function() {
    if($('#edit-cs-exam').val() == '' || $('#edit-rating').val() == '') {
      $("#alert_civilservice_station_empty").addClass('alert alert-danger').text('Any Field should not be left empty!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
    }else if($('#edit-cs-month').val() == 0 || $('#edit-cs-day').val() == 0) {
      $("#alert_civilservice_station_empty").addClass('alert alert-danger').text('Please pick a date!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
    }else {  
      $.ajax({
        url: "/divoffadmin/admin/ajax/update_civil_service.php",
        type: "post",
        data:$("#update_civil_service_form").serialize(),
        success:function(d){
            $("#table_civil_service_body").html(d);
            $("#update_civil_service_success_alert").addClass('alert alert-success').text('Civil Service Updated!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
            editCivilService();
            viewCivil();
            getDeleteCivilService();
            allow_only_decimals();
            typeahead_edit_cs_exam();
        }
      });
    }

  });
}

function updateDetails() {

  $("#update_details_btn").click(function() {
    if($('#edit-special-order-no').val() == '' || $('#edit-annual-salary').val() == '' || $('#edit-item-number').val() == '' ||
       $('#edit-annual-salary').val() == '' || $('#edit-position').val() == '' || $('#edit-remarks').val() == ''){
       $("#alert_details_specialOrder_empty").addClass('alert alert-danger').text('Fields should not be empty!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
    }else if($('#edit-reg-effective-day').val() == 0 || $('#edit-reg-effective-month').val() == 0) {
       $("#alert_details_specialOrder_empty").addClass('alert alert-danger').text('Please pick a date!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
    }else {
      $.ajax({
        url: "/divoffadmin/admin/ajax/update_details.php",
        type: "post",
        data:$("#update_details_form").serialize(),
        success:function(data){
            $("#update_success_alert").addClass('alert alert-success').text('Details Updated!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
            $("#table_details_body").html(data);
            editDetails();
            viewDetails();
            getDeleteDetails();
            typeahead_edit_special_order_no();
            typeahead_edit_nature_of_ass();
            typeahead_edit_item_number();
            typeahead_edit_position();
            typeahead_edit_remarks();
        }
      });
    }
  });
}


/************************************************/
            /* Delete AJAX Calls */
/************************************************/


function getDeleteWorkExp() {
  $('.delete_workexp_btn').click(function() {
    var workexp_id = $(this).attr('id');
    $.ajax({
        url: "/divoffadmin/admin/ajax/get_delete_work_exp.php",
        type: "post",
        data: {id:workexp_id},
        success:function(d) {
            $('#myModal7').modal('show');
            $('#delete_work_exp_modal').html(d);
            deleteWorkExp();
        }
    });
  });  
}

getDeleteWorkExp();


function deleteWorkExp() {
  $('#delete_work_exp_btn').click(function() {
      $.ajax({
          url: "/divoffadmin/admin/ajax/delete_work_exp.php",
          type: "post",
          data: $('#delete_work_exp_form').serialize(),
          success:function(data) {
            $('#table_work_exp_body').html(data);
            $('#myModal7').modal('hide');   
            viewWorkExp();
            editWorkExp();
            getDeleteWorkExp();
                     
          }
      });
  });  
}



function getDeleteDetails() {
  $('.delete_details_btn').click(function() {
      var details_id = $(this).attr('id');
      $.ajax({
          url: "/divoffadmin/admin/ajax/get_delete_details.php",
          type: "post",
          data: {id:details_id},
          success:function(data) {
            $('#myModal9').modal('show');
            $('#delete_details_modal').html(data);
            deleteDetails();
          }
      });
  });
}

getDeleteDetails();


function deleteDetails() {
  $('#delete_details_form_btn').click(function() {
     $.ajax({
        url: "/divoffadmin/admin/ajax/delete_details.php",
        type: "post",
        data: $('#delete_details_form').serialize(),
        success:function(data) {
            $('#table_details_body').html(data);
            $('#myModal9').modal('hide');   
            editDetails();
            viewDetails();
            getDeleteDetails();
        }
     }); 
  });
}


function getDeleteCivilService() {
  $('.delete_civilserv_btn').click(function() {
      var civil_id = $(this).attr('id');
      $.ajax({
          url: "/divoffadmin/admin/ajax/get_delete_civil_service.php",
          type: "post",
          data: {id:civil_id},
          success:function(data) {
            $('#myModal8').modal('show');
            $('#delete_civil_service_modal').html(data);
            deleteCivilService();
          }
      });
  });
}

getDeleteCivilService();




function deleteCivilService() {
  $('#delete_civil_service_form_btn').click(function() {
     $.ajax({
        url: "/divoffadmin/admin/ajax/delete_civil_service.php",
        type: "post",
        data: $('#delete_civil_service_form').serialize(),
        success:function(data) {
            $('#table_civil_service_body').html(data);
            $('#myModal8').modal('hide');   
            editCivilService();
            viewCivil();
            getDeleteCivilService();
        }
     }); 
  });
}



/************************************************/
            /* Submit AJAX Calls */
/************************************************/


  $("#submit_work_exp").click(function() {
    if($('#insert-comp-name').val() == '' || $('#insert-status').val() == '' || $('#insert-designation').val() == '' || $('#insert-salary').val() == '' || $('#insert-branch').val() == '') {
       $("#work_exp_empty_warning").addClass('alert alert-danger').text('Lv. of abs. and Date of Lv. are the only fields that can be left empty!').fadeIn( 300 ).delay( 1200 ).fadeOut( 1000 );
    }else if($('#insert-from-date-month-work-exp').val() == 0 || $('#insert-from-date-day-work-exp').val() == 0 || $('#insert-to-date-month-work-exp').val() == 0 || $('#insert-to-date-day-work-exp').val() == 0 ){
      $("#work_exp_empty_warning").addClass('alert alert-danger').text('Lv. of abs. and Date of Lv. are the only fields that can be left empty!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
    }else {
      $.ajax({
        url: "/divoffadmin/admin/ajax/insert_work_exp.php",
        type: "post",
        data:$("#work_exp_form").serialize(),
        success:function(d){
          $("#insert_work_exp_success_alert").addClass('alert alert-success').text('Work Experience Added!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
            $("<tr></tr>").html(d).appendTo("#work_table");
            $("#work_exp_form")[0].reset();
            viewWorkExp();
            editWorkExp();
            getDeleteWorkExp();
        }
      });  
    }
  });



  // $("#submit_work_exp").click(function() {
  //   $.ajax({
  //     url: "/divoffadmin/admin/ajax/insert_work_exp.php",
  //     type: "post",
  //     data:$("#work_exp_form").serialize(),
  //     success:function(d){
  //       $("#insert_work_exp_success_alert").addClass('alert alert-success').text('Work Experience Added!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
  //         $("<tr></tr>").html(d).appendTo("#work_table");
  //         $("#work_exp_form")[0].reset();
  //         viewWorkExp();
  //         editWorkExp();
  //         getDeleteWorkExp();
  //     }
  //   });
  // });

  $("#submit_civil_service").click(function() {
      if($('#cs-exam').val() == '' || $('#cs-rating').val() == '') {
        $("#insert_alert_civilservice_station_empty").addClass('alert alert-danger').text('Any Field should not be left empty!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
      }else if($('#cs-month').val() == 0 || $('#cs-day').val() == 0) {
        $("#insert_alert_civilservice_station_empty").addClass('alert alert-danger').text('Please pick a date!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
      }else {      
        $.ajax({
          url: "/divoffadmin/admin/ajax/insert_civil_service.php",
          type: "post",
          data:$("#civil_service_form").serialize(),
          success:function(d){
            $("#insert_civil_service_success_alert").addClass('alert alert-success').text('Civil Service Added!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
              $("#civil_service_table").append(d);
              $("#civil_service_form")[0].reset();
              editCivilService();
              viewCivil();
              getDeleteCivilService();
          }
        });
      }  
  }); 

  $("#submit_details").click(function() {
    if($('#insert-special-order').val() == '' || $('#insert-annual-salary').val() == '' || $('#insert-nature-ass').val() == '' || $('#insert-item-number').val() == '' || 
       $('#insert-position').val() == '' || $('#insert-remarks').val() == ''){
      $("#alert_insert_details_specialOrder_empty").addClass('alert alert-danger').text('Fields should not be empty!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 ); 
    }else if($('#insert-reg-effective-day').val() == 0 || $('#insert-reg-effective-month').val() == 0) {
       $("#alert_insert_details_specialOrder_empty").addClass('alert alert-danger').text('Please pick a date!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 ); 
    }else {
      $.ajax({
        url: "/divoffadmin/admin/ajax/insert_details.php",
        type: "post",
        data:$("#details_form").serialize(),
        success:function(d){
          $("#insert_details_success_alert").addClass('alert alert-success').text('Details Added!').fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
            $("#details_table").append(d);
            $("#details_form")[0].reset();
            editDetails();
            viewDetails();
            getDeleteDetails();
        }
      });  
    }    

  });



/************************************************/
            /* View AJAX Calls */
/************************************************/

function viewWorkExp() {
   $('.view_workexp').click(function() {
    var work_exp_id = $(this).attr("id");
    $.ajax({
      url: "/divoffadmin/admin/ajax/fetch_work_exp.php",
      type: "post",
      data: {id : work_exp_id},
      success:function(d){
        $('#fetch_work_exp').html(d);
         $("#myModal1").modal("show");
      }
    });

  });
 
}

viewWorkExp();

function viewCivil() {

  $('.view_civil').click(function() {
    var civil_service_id = $(this).attr("id");
    $.ajax({
      url: "/divoffadmin/admin/ajax/fetch_civil_service.php",
      type: "post",
      data: {id : civil_service_id},
      success:function(d){
        $('#fetch_civil_service').html(d);
         $("#myModal2").modal("show");
      }
    });

  });

}

viewCivil();

function viewDetails() {
   $('.view_details').click(function() {
    var details_id = $(this).attr("id");
    $.ajax({
      url: "/divoffadmin/admin/ajax/fetch_details.php",
      type: "post",
      data: {id : details_id},
      success:function(d){
        $('#fetch_details').html(d);
         $("#myModal3").modal("show");
      }
    });

  });  
}

viewDetails();    


});


