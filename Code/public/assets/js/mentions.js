document.addEventListener('DOMContentLoaded', () => {
    const containerElement = document.querySelector(".container");
    const formElement = document.querySelector(".edit-form");
    const editBtn = document.querySelector(".edit-btn");
    if(containerElement&&formElement&&editBtn){
      editBtn.addEventListener('click',function(){
          formElement.style.display="block";
          containerElement.style.display="none";
      });

      formElement.addEventListener('submit',function(e){
          e.preventDefault();
          var formData = $('.edit-form').serialize();
          let url= root+"mentionslegales/updateMentions";

          $.ajax({
            url: url,
            type: "POST",
            data: formData,
            success: function(response) {
              formElement.style.display="none";
              containerElement.style.display="block";
              $('#mainText').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.error("Error:", errorThrown);
              alert("An error occurred during form submission. Please try again later.");
            }
          });
        });
    }
});