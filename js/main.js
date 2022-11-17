$("#formAdd").submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenuto");
    const $form =$(this);
    const $inputs=$form.find('input', 'textarea', 'radio');
    const $serijazacija=$form.serialize();
console.log($serijazacija);
    request=$.ajax({
        url: "handler/add.php",
        type: "post",
        data: $serijazacija
    });
    request.done(function(response, textStatus, jqXHR){
        console.log(response);
        if(response==="Success"){
            alert("Task je dodat");
            location.reload(true);
        }else{
            alert("Task nije dodat!");
        }
    })
    request.fail(function(JQXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila:"+textStatus,errorThrown);
    })
})
$("#btnObrisi").click(function () {
    const checkedRadio = $("input[name=radioSelect]:checked");

    request = $.ajax({
      url: "handler/delete.php",
      type: "post",
      data: { taskID:checkedRadio.val() },
    });
    request.done(function (response, textStatus, jqXHR) {
        console.log(response);
      if (response === "Success") {
        checkedRadio.closest("li").remove();
        alert("Zadatak je obrisan"); 
      } else {
        alert("Tim nije obrisan");
      }
    });
  });
  $("#formUpdate").submit(function () {
    event.preventDefault();
    console.log("Izmena");
    const $form = $(this);
    const $inputs = $form.find("input, select, radio, checkbox");
    const serializedData = $form.serialize();
    console.log(serializedData);
    
    $inputs.prop("disabled", true);
  
    request = $.ajax({
      url: "handler/update.php",
      type: "post",
      data: serializedData,
    });
  
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        console.log("Tim je izmenjen");
        location.reload(true);
      } else console.log("Tim nije izmenjen " + response);
      console.log(response);
    });
  
    request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error("The following error occurred: " + textStatus, errorThrown);
    });
  });