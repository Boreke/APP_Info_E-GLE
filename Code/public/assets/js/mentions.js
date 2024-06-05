document.addEventListener('DOMContentLoaded', () => {
    const containerElement = document.querySelector(".container");
    const formElement = document.querySelector(".edit-form");
    const editBtn = document.querySelector(".edit-btn");
    /* autre solution à implementer avec l'ajout de catégories
    const loadInitialData = () => {

        $.ajax({
            url: root + "mentionslegales/getMentions",
            getMentions est une fonction recuperant les informations des mentions legales depuis mentions_legales_content.php
            type: "GET",
            success: function(data) {
                $('#name').val(data.name);
                $('#address').val(data.address);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#intellectual_property').val(data.intellectual_property);
                $('#data_protection').val(data.data_protection);
                $('#responsibility').val(data.responsibility);
                $('#applicable_law').val(data.applicable_law);


                $('#name-info').text(data.name);
                $('#address-info').text(data.address);
                $('#phone-info').text(data.phone);
                $('#email-info').text(data.email);
                $('#intellectual-property-info').text(data.intellectual_property);
                $('#data-protection-info').text(data.data_protection);
                $('#responsibility-info').text(data.responsibility);
                $('#applicable-law-info').text(data.applicable_law);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error fetching data:", errorThrown);
                alert("An error occurred while loading data. Please try again later.");
            }
        });
    };*/

    editBtn.addEventListener('click',function(){
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
            formElement.style.display="none";
            containerElement.style.display="block";
            //solution temporaire
            window.location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", errorThrown);
            alert("An error occurred during form submission. Please try again later.");
          }
        });
      });
      

});