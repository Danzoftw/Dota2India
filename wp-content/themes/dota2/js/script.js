jQuery( document ).ready(function($) {
  // alert();
  let endpoint = 'https://api.linkpreview.net'
  let apiKey = '5b578yg9yvi8sogirbvegoiufg9v9g579gviuiub8'

  // $( ".content a" ).each(function( index, element ) {

    $.ajax({
        url: endpoint + "?key=" + apiKey + " &q=twsdfsagwa" ,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            console.log(result);
        }
    })
  // });
});