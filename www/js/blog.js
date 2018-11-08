$(function() {
  $('[name=category]').on('change', function(){
    var category = $(this).val();
    // console.log(category);

    $.ajax({
      //url: "./../blog/index.php",
      url: "index.php",
      type: "POST",
      dataType: "json",
      data: {
        categoryId: category
      }
    })
    .done(function(data){
      // later
      console.log(data);
    })
    .fail(function(){
      console.log("fail");
    });
  });
});