var ReservationsService = {
  init: function(){
       $('#reservation_form').validate({
         submitHandler: function(form) {
           var entity = Object.fromEntries((new FormData(form)).entries());
             ReservationsService.add(entity);
         }
       });
     },
     add: function(todo){
       $.ajax({
         url: 'rest/reservations',
         type: 'POST',
         data: JSON.stringify(todo),
         contentType: "application/json",
         dataType: "json",
         success: function(result) {

         }
       });
  },
}
