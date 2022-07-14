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

 function get_all_emails(){
   $.ajax({
     url: 'rest/email',
     type: 'GET',
     dataType: "json",
     success: function(data) {
      $("#email_form").html("");
      $("#reservation_form").html("");
      var html = "";
      for(let i = 0; i < data.length; i++){
        html += `
        <div class="col-lg-6 col-sm-12 col-xs-6">
        <div class="row">
            <div class="col-sm-7" style="float:right;">
                <div class="ze"><h3>Name: `+data[i].name+`</h3>
                <h4>Email: `+data[i].email+`</h4>
                <p>Text: `+data[i].text+`</p>
                </div>
            </div>
            </div><br/>
        </div>
        `;
      }
      //console.log(html);
      $("#email_form").html(html);
    }
    });
  }
