$(document).ready(function(){
    $('#nmessage').hide();
    $('#successmessage').hide();
    $('.modal').show();
    $('#myModal').hide();
    var form = '#add-user-form';

    $(form).on('submit', function(event){
        event.preventDefault();
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                $('#nmessage').hide();
                $(form).trigger("reset");
                $('#successmessage').show();
                $("#successmessage").text('User registered Successfully.').slideUp(5000);
                $('#myModal').show();

                $('.regid').text("Registration ID: "+response.test.registrationid);
                $('.usename').text("User Name: "+response.test.firstname+" "+response.test.lastname);
                $('.useemail').text("User Email: "+response.test.email);
                $('#my_image').attr('src','/images/'+response.test.imgfile);
                console.log(response.test.imgfile);
            }}).fail(function(xhr) {
                $('#successmessage').hide();
                $('#myModal').hide();
                $('#nmessage').show();
                let data = xhr.responseJSON;
                if (data.errors) {
                    // error happen
                    $("#nmessage").text(data.message).slideDown();
                    let errorInfo = "";
                    for(let inputName in data.errors) {
                        errorInfo += inputName +":"+ data.errors[inputName].message.join(", ") + "<br>";
                    }
                    $("#nmessage").text(errorInfo).slideDown();
                }
            });

            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                  modal.style.display = "none";
                }
              }
    });
var modal = document.getElementById("myModal");
});