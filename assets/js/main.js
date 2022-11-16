/*
    Авторизация
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('is-invalid');

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: '/vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
        	email: email,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '/vendor/film_list.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('is-invalid');
                    });
                }

                $('.message').removeClass('d0').text(data.message);
            }

        }
    });

});


/*
 * Регистрация
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('is-invalid');

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();

    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('email', email);


    $.ajax({
        url: '/vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/views/login.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('is-invalid');
                    });
                }

                $('.message').removeClass('d0').text(data.message);

            }

        }
    });

});
$('.add-btn').click(function (e) {
	
   e.preventDefault();

    $(`input`).removeClass('is-invalid');
    $(`select`).removeClass('is-invalid');

    let name = $('input[name="name"]').val(),
        year = $('input[name="year"]').val(),
        format = $("#format :selected").val();
    	actors = $('input[name="actors"]').val();

    let formData = new FormData();

    formData.append('name', name);
    formData.append('year', year);
    formData.append('format', format);
    formData.append('actors', actors);

    $.ajax({
        url: '/vendor/add_film.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
            	
            	  $('.message').removeClass('d0').text('You successful add film!');
            	  $('input[name="name"]').val('');
            	  $('input[name="year"]').val('');
            	  $("#format [value='']").prop('selected', true);
              	  $('input[name="actors"]').val('');

            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                    	 let name ="#"+field
                        $(name).addClass('is-invalid');
                    });
                }

                $('.message').removeClass('d0').text(data.message);

            }

        }
    });

});

$('.import-btn').click(function (e) {
	
   e.preventDefault();

   var $input = $("#file");
   var fd = new FormData;
   
   fd.append('file', $input.prop('files')[0]);

   $.ajax({
       url: '/vendor/import_film.php',
       data: fd,
       dataType: 'json',
       processData: false,
       contentType: false,
       type: 'POST',
       success (data) {

           if (data.status) {
        	   document.querySelector('input[type=file]').value = '';
        	  
           } else {

        	   
           }
           $('.message').removeClass('d0').text(data.message);

       }
       
   });



});