$(document).ready(function() {
   var $calendar = $('#calendar');
   var id = 10;

   $calendar.weekCalendar({
      displayOddEven:false,
      timeslotsPerHour : 4,
      allowCalEventOverlap : false,
      overlapEventsSeparate: false,
      firstDayOfWeek : 1,
      businessHours :{start: 9, end: 17, limitDisplay: true },
      daysToShow : 5,
      switchDisplay: {'1 day': 1, '3 next days': 3, 'work week': 5},
      title: function(daysToShow) {
			return daysToShow == 1 ? '%date%' : '%start% - %end%';
      },
      height : function($calendar) {
      	      return $(document).height();
      },
      eventRender : function(calEvent, $event) {
         if (calEvent.end.getTime() < new Date().getTime()) {
            $event.css("backgroundColor", "#aaa");
            $event.find(".wc-time").css({
               "backgroundColor" : "#999",
               "border" : "1px solid #888"
            });
         }
      },
      defaultEventLength:4,
      draggable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      resizable : function(calEvent, $event) {
         return false;
      },
      eventNew : function(calEvent, $event) {
         
         var $dialogContent = $("#event_add_container");
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("textarea[name='title']");
         var applicantField=$dialogContent.find("select[name='applicant']");
         var employeeField=$dialogContent.find("input[name='data[Employee][id]']");

          var statusField=$dialogContent.find("select[name='status']")
        var applicantFieldTest=$dialogContent.find("input[name='applicant']").val(calEvent.applicant_id);

         $dialogContent.dialog({
            modal: true,
            title: "New Appointment",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
               $calendar.weekCalendar('refresh');
            },
            buttons: {
               save : function() {
               	  var appStartTime = startField.val();
                  var appEndTime = endField.val();
                  var appTitle = titleField.val();
                  var appApplicant=applicantField.val();
                  var appEmployee=employeeField.val();
                  var appStatus=statusField.val();
                
                  if(appTitle===null || appTitle==='' || appApplicant===null || appApplicant==='')
                  {
                  	  alert('Please fill in Title or Applicant.');return false;
                  }
                   //alert(date('Y-m-d H:i:s' , strtotime(appStartTime)));
                  $.ajax({
                      type:"POST",
                      url: "add",
                     /* dataType: "json",*/
				   data:{title : appTitle,start : appStartTime, end : appEndTime, applicant_id :appApplicant, employee_id : appEmployee,  status:appStatus},

                      success: function (data){

                          $dialogContent.dialog("close");
                          $calendar.weekCalendar('refresh');
                          resetForm($dialogContent);
				   },
                                         error: function (xhr, ajaxOptions, thrownError) {
                                                                 $dialogContent.dialog("close");   
                                                            
        alert(xhr.status);
        alert(thrownError);
      }
				  }); 		  

               },
               cancel : function() {
                  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               }
            }
         }).show();
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
      },

      eventDrop : function(calEvent, $event) {
        var apptId=calEvent.id.toString();
      	      var startTime=calEvent.start.toString();
      	      var endTime=calEvent.end.toString();
      	      $.post("/team66/Final/appointments/dropResizeSaving", { id: apptId, start: startTime, end: endTime},function(data) {


                  $calendar.weekCalendar('refresh');
              } );

      },

      eventResize : function(calEvent, $event) {
      	      var apptId=calEvent.id.toString();
      	      var startTime=calEvent.start.toString();
      	      var endTime=calEvent.end.toString();
      	      $.post("/team66/Final/appointments/dropResizeSaving", { id: apptId, start: startTime, end: endTime},null)
        /*  $calendar.weekCalendar('refresh'));*/

      },
      eventClick : function(calEvent, $event) {

         if (calEvent.readOnly) {
            return;
         }
         
         var $dialogContent = $("#event_edit_container");
         //resetForm($dialogContent);
         var idField=$dialogContent.find("input[name='id']").val(calEvent.id);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("textarea[name='title']").val(calEvent.title);
         var applicantField=$dialogContent.find("select[name='applicant']").val(calEvent.applicant_id);
         var employeeField=$dialogContent.find("input[name='data[Employee][id]']").val(calEvent.employee_id);
          var applicantName=$('#applicant').find(":selected").text();
          var employeeName=$('#employee').find(":selected").text();
          var statusField=$dialogContent.find("select[name='status']").val(calEvent.status);

          var applicantFieldTest=$dialogContent.find("input[name='applicant']").val(applicantName);


         $dialogContent.dialog({
            modal: true,
            title: "Edit - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
               $calendar.weekCalendar('refresh');
            },
            buttons: {
               save : function() {
                  var appId=idField.val();
                   var appStartTime = startField.val();
                   var appEndTime = endField.val();
                   var appTitle = titleField.val();
                   var appApplicant=applicantField.val();
                   var appEmployee=employeeField.val();
                   var appStatus=statusField.val();
                   
                  $.ajax({
				   type: "POST",
				   url: "/team66/Final/appointments/edit",
				   data:{id : appId, title : appTitle, start : appStartTime, end : appEndTime, applicant_id : appApplicant, employee_id : appEmployee, status:appStatus},
				   success: function (data){
                       $calendar.weekCalendar('refresh');
				   }
				  }); 
		  $dialogContent.dialog("close");

               },
               "delete" : function() {
               	       var appId=idField.val();
               	       $.ajax({
				   type: "POST",
				   url: "/team66/Final/appointments/delete",
				   data:{id : appId},
				   success: function (data){
				   	  var records = eval(data);
				   	  if(records==0)
				   	  {
				   	     alert('Can not delete this appointment.');
				   	  }
				   }
				   
				  }); 
                  $dialogContent.dialog("close");
                  $calendar.weekCalendar('refresh');
               },
               cancel : function() {
                  $dialogContent.dialog("close");
               }
            }
         }).show();

         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
         $(window).resize().resize(); //fixes a bug in modal overlay size ??

      },
      eventMouseover : function(calEvent, $event) {
          return false;
      },
      eventMouseout : function(calEvent, $event) {
          return false;
      },
      noEvents : function() {

      },
      data :  function(start, end, callback) {
      	      $.getJSON("/team66/Final/Appointments/feed", {
              start: start.getTime(),
              end: end.getTime()
              /*clinic: $("#selectClinic").val()*/
          },  function(result) {
           callback(result);
             // leave margin for each event
             $('div.wc-cal-event').each(function() {
               		    var width= $(this).width();
               		     width=width-10;
               		     $(this).width(width);
               		    
                });
         });
      }
      
   });

   function resetForm($dialogContent) {
      $dialogContent.find("input").val("");
      $dialogContent.find("textarea").val("");
   }
   /*
    * Sets up the start and end time fields in the calendar event
    * form for editing based on the calendar event being edited
    */
   function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {

      $startTimeField.empty();
      $endTimeField.empty();

      for (var i = 0; i < timeslotTimes.length; i++) {
         var startTime = timeslotTimes[i].start;
         var endTime = timeslotTimes[i].end;
         var startSelected = "";
         if (startTime.getTime() === calEvent.start.getTime()) {
            startSelected = "selected=\"selected\"";
         }
         var endSelected = "";
         if (endTime.getTime() === calEvent.end.getTime()) {
            endSelected = "selected=\"selected\"";
         }
         $startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
         $endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");

         $timestampsOfOptions.start[timeslotTimes[i].startFormatted] = startTime.getTime();
         $timestampsOfOptions.end[timeslotTimes[i].endFormatted] = endTime.getTime();

      }
      $endTimeOptions = $endTimeField.find("option");
      $startTimeField.trigger("change");
   }

   var $endTimeField = $("select[name='end']");
   var $endTimeOptions = $endTimeField.find("option");
   var $timestampsOfOptions = {start:[],end:[]};

   //reduces the end time options to be only after the start time options.
   $("select[name='start']").change(function() {
      var startTime = $timestampsOfOptions.start[$(this).find(":selected").text()];
      var currentEndTime = $endTimeField.find("option:selected").val();
      $endTimeField.html(
            $endTimeOptions.filter(function() {
               return startTime < $timestampsOfOptions.end[$(this).text()];
            })
            );

      var endTimeSelected = false;
      $endTimeField.find("option").each(function() {
         if ($(this).val() === currentEndTime) {
            $(this).attr("selected", "selected");
            endTimeSelected = true;
            return false;
         }
      });

      if (!endTimeSelected) {
         //automatically select an end date 2 slots away.
         $endTimeField.find("option:eq(1)").attr("selected", "selected");
      }
      
      

      
   });

   $("select[name='end']").change(function() {
      var startTime = $("select[name='start']").find("option:selected").val();
      var endTime = $("select[name='end']").find("option:selected").val();

   });
   
   
   
   var $about = $("#about");

   $("#about_button").click(function() {
      $about.dialog({
         title: "About this calendar demo",
         width: 600,
         close: function() {
            $about.dialog("destroy");
            $about.hide();
         },
         buttons: {
            close : function() {
               $about.dialog("close");
            }
         }
      }).show();
   });
   
   $("#btnSaveSettings").click(function() {
   		   $calendar.weekCalendar('refresh');
   		   var mydate= $('#datepicker').val();
   		   if(isNaN(mydate))
   		   {
                      var date = new Date(mydate);
                      $('#calendar').weekCalendar('gotoWeek', date);
               	   }
   		   });
   
   $("#checkValue").change(function() {
      var startTime = $("select[name='start']").find("option:selected").val();
      var endTime = $("select[name='end']").find("option:selected").val();

  });


});
