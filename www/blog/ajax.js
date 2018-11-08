$(function() {
  $('[name=category]').on('change', function(){
    var data = $(this).val();
    console.log(data);
    $.ajax({
      //url: "./../blog/index.php",
      url: "index.php",
      type: "GET",
      // dataType: "json",
      data: {
        //category : $(this).val()
        data : data
      }
      
    })
    .done(function(data){
      console.log("okay");
    })
    .fail(function(){
      console.log("fail");
    });
  });
});