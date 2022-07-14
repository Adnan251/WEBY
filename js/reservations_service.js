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
            console.log(result);
         }
       });
  },

  get_all: function(){
    $.ajax({
       url: "rest/notes",
       type: "GET",
       dataType: "json",
        function(data) {
        $("#menus").html("");
        var html = "";
        for(let i = 0; i < data.length; i++){
          html += `
          <div class="col-lg-6 col-sm-12 col-xs-6">
          <div class="row">
              <div class="col-sm-7" style="float:right;">
                  <div><h3>Name: `+data[value].name+`</h3>
                  <h4>Date: `+data[value].date+`</h4>
                  <h4>Time: `+data[value].time+`</h4>
                  <h4>Email: `+data[value].email+`</h4>
                  <h4>Phone: `+data[value].phone+`</h4>
                  <h4>People: `+data[value].number_of_people+`</h4>
                  </div>
              </div>
              </div><br/>
          </div>
          `;
        }
        //console.log(html);
        $("#menus").html(html);
        }
      });
    }
}
