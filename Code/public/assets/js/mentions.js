document.addEventListener('DOMContentLoaded', () => {
    var containerElement=document.getElementsByClassName("container");
    var formElement=document.getElementsByClassName("edit-form");
    var editBtn=document.getElementsByClassName("edit-btn");
    
    editBtn.addEventListener('click',()=>{
        formElement.style.display="block";
        containerElement.style.display="none";
    });

    formElement.addEventListener('submit',function(e){
        e.preventDefault();
        var formData = $('.edit-form').serialize();
        let url= root+"mentionslegales/updateMentions";
        
        console.log(formData);
        $.ajax({
          url: url,
          type: "POST",
          data: formData,
          success: function(response) {
            console.log(response);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", errorThrown);
            alert("An error occurred during form submission. Please try again later.");
          }
        });
      });
      

});