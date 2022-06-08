var EmailsService = {
  init: function(){
       $('#email_form').validate({
         submitHandler: function(form) {
           var entity = Object.fromEntries((new FormData(form)).entries());
             EmailsService.add(entity);
         }
       });
     },
     add: function(todo){
       $.ajax({
         url: 'rest/email',
         type: 'POST',
         data: JSON.stringify(todo),
         contentType: "application/json",
         dataType: "json",
         success: function(result) {
         }
       });
  },
}
