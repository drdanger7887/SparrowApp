$(document).ready(function () {



    $("#subscribe").validate({
        errorElement: "span",
        //set the rules for the fild names
        rules: {
            email_id: {
                required: true,
                email: true

            },
        },
        //set messages to appear inline
        messages: {
            email_id: {
                required: "",
       },
        },
        submitHandler: function (form) {
            $('#send').html('<input type="submit" value="Please Wait..." class="cs-blue-bg colorwhite subs-brd">')


            $.ajax({
                type: "POST",
                url: baseurl + "pages/add_subscriber/true",
                dataType: "json",
                data: $('#subscribe').serialize(),
                success: function (json)
                {
                    if (json.result == 0) {

                        $('#send').html('<input type="submit" value="Subscribe" class="cs-blue-bg colorwhite subs-brd">')
                        alert(json.message);
                        return false;
                    } else if (json.result == 1) {
                        $('#email_id').val('')
                        $('#send').html('<input type="submit" value="Thank You" class="cs-blue-bg colorwhite subs-brd">')
                        setTimeout(function () {
                            $('#send').html('<input type="submit" value="Subscribe" class="cs-blue-bg colorwhite subs-brd">')
                        }, 3000);
                    }

                }
            });
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }

    });


});
