$(function () {
  $('[name=category]').on('change', function () {
    var data = $(this).val();
    // console.log(data);
    $.ajax({
      //url: "./../blog/index.php",
      url: "ajax.php",
      type: "POST",
      // dataType: "json",
      data: {
        'category': data
      }

    })
    .done(function (data) {
       console.log("okay");
       //alert(data);
       $('#articles').html(data);
    })
    .fail(function () {
      console.log("fail");
    });
  });
});