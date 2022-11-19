$( document ).ready(function() {

$("#formAdd").submit(function () {
  event.preventDefault();
  const $form = $(this);
  const $inputs = $form.find('input', 'textarea', 'radio');
  const $serializedData= $form.serialize();
  
  request = $.ajax({
    url: "handler/add.php",
    type: "post",
    data: $serializedData
  });
  request.done(function (response, textStatus, jqXHR) {
    console.log(response);
    if (response === "Success") {
      alert("Zadatak je dodat");
      location.reload(true);
    } else {
      alert("Zadatak nije dodat!");
    }
  })
  request.fail(function (JQXHR, textStatus, errorThrown) {
    console.error("Desila se greska:" + textStatus, errorThrown);
  })
})
$("#btnObrisi").click(function () {
  const checkedRadio = $("input[name=radioSelect]:checked");

  request = $.ajax({
    url: "handler/delete.php",
    type: "post",
    data: { taskID: checkedRadio.val() },
  });
  request.done(function (response, textStatus, jqXHR) {
    console.log(response);
    if (response === "Success") {
      checkedRadio.closest("li").remove();
      alert("Zadatak je obrisan");
    } else {
      alert("Zadatak nije obrisan. Prvo selektuj zadatak koji zelis da obrišeš!");
    }
  });
});
$("#formUpdate").submit(function () {
  event.preventDefault();
  const $form = $(this);
  const $inputs = $form.find("input, radio, checkbox");
  const serializedData = $form.serialize();

  request = $.ajax({
    url: "handler/update.php",
    type: "post",
    data: serializedData,
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response === "Success") {
      alert("Zadatak je izmenjen");
      location.reload(true);
    } else console.log("Zadatak nije izmenjen " + response);
    console.log(response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Desila se greska: " + textStatus, errorThrown);
  });
});


$("#searchBox").keyup(function () {

  $.ajax({
    type: "post",
    url: "handler/suggest.php",
    data: 'keyword=' + $(this).val(),
    beforeSend: function () {
      $("#searchBox").css("background", "#008a59");
    },
    success: function (data) {
      $("#suggesstionBox").show();
      $("#suggesstionBox").html(data);
      $("#searchBox").css("background", "#FFF");
      $('#taskList').css("background", '#008a59');
      $('#taskList').css("list-style", 'none');
      $('#taskList').css("width", '180px');
      $('#taskList').css("color","#FFF");
      
    }
  });
});




$("#selectCategory").change(function(){
  var vrednost = $("#selectCategory").val();
  
  $.get("handler/priority.php", { categoryID: vrednost },
     function(data){
       $("#popuni").html(data);
     });
  });
  

});
function selectTask(val) {
  $("#searchBox").val(val);
  $("#suggesstionBox").hide();
}


