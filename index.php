<html lang="ru">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
      <title> Создание заказа </title>
      <link rel="stylesheet" href="bootstrap/css/style.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
      <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Доставка воды</span>
          </a>
          <a href= Data_list.php class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-5"> Все заказы </span>
          </a>
        </header>
      </div>

      <div class="wrapper">
      <div class="container">
        <div class="col-lg-12">

          <form id="registraion_form" class="form-horizontal">

            <h2>Создание заказа</h2>

            <div class="form-group">
              <label>Физ. лицо</label>
              <div class="switch-btn"></div>
              <label>Юр. лицо</label>
            </div>
            <br>

            <div class="form-group">
            <label class="col-sm-3 control-label">Количество воды</label>
            <div class="col-sm-6">
            <input type="text" id="txt_amount_water" class="form-control"/>
            </div>
            </div>
            <br>

            <div class="form-group">
            <label class="col-sm-3 control-label">Количество сдаваемой тары</label>
            <div class="col-sm-6">
            <input type="text" id="txt_tare_quantity" class="form-control" placeholder="0"/>
            </div>
            </div>
            <br>

            <div class="form-group">
              <label class="col-sm-3 control-label" id = "txt_FIO">ФИО</label>
              <label class="col-sm-3 control-label" id = "txt_Name_org">Название организации</label>
              <div class="col-sm-6">
                <input type="text" id="txt_name" class="form-control"/>
              </div>
            </div>
            <br>

            <div class="form-group">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
            <input type="text" id="txt_email" class="form-control"/>
            </div>
            </div>
            <br>

            <div class="form-group">
            <label class="col-sm-3 control-label">Номер телефона</label>
            <div class="col-sm-6">
            <input type="text" id="txt_ph_number" class="form-control"/>
            </div>
            </div>
            <br>


            <div class="form-group" id = "field_agreement">
            <label class="col-sm-3 control-label">Номер договора</label>
            <div class="col-sm-6">
            <input type="text" id="txt_agreement" class="form-control"/>
            </div>
            <br>
            </div>


            <div class="form-group">
            <label class="col-sm-3 control-label">Адрес доставки</label>
            <div class="col-sm-6">
            <input type="text" id="txt_city" class="form-control" placeholder="Введите город"/>
            <br>
            <input type="text" id="txt_address" class="form-control" placeholder="Введите адрес"/>
            </div>
            <br>

            <div class="form-group" id = "field_agreement">
            <label class="control-label">Комментарий к заказу (не обязательно для заполнения)</label>
            <div class="col-sm-6">
            <input type="text" id="txt_comment" class="form-control"/>
            </div>
            <br>
            </div>

            <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6 m-t-15">
            <button type="submit" id="btn_create" class="btn btn-success">Создать заказ</button>
            </div>
            </div>
            <br>

            <div class="form-group">
              <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
            </div>
            <br>

          </form>

        </div>
      </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

      <script>
      $('#field_agreement').toggle();
      $('#txt_Name_org').toggle();
      </script>

      <script> //создание изменения положения переключателя
      $('.switch-btn').click(function(){
        $(this).toggleClass('switch-on');
        if ($(this).hasClass('switch-on')) {
          $(this).trigger('on.switch');
        } else {
            $(this).trigger('off.switch');
        }
      });
      </script>

      <script> //изменение формы в зависимости от положения переключателя
      $('.switch-btn').on('on.switch', function(){
        $('#field_agreement').toggle();
        $('#txt_FIO').toggle();
        $('#txt_Name_org').toggle();
      });
      $('.switch-btn').on('off.switch', function(){
        $('#field_agreement').toggle();
        $('#txt_FIO').toggle();
        $('#txt_Name_org').toggle();
      });
      </script>

      <script>

    		$(document).on('click','#btn_create',function(e){

    			e.preventDefault();

    			var name = $('#txt_name').val();
    			var email 	 = $('#txt_email').val();
    			var ph_number = $('#txt_ph_number').val();
          var agreement = $('#txt_agreement').val();
          var city = $('#txt_city').val();
          var address = $('#txt_address').val();
          var amount_water = $('#txt_amount_water').val();
          var tare_quantity = $('#txt_tare_quantity').val();
          var comment = $('#txt_comment').val();

    			var atpos  = email.indexOf('@');
    			var dotpos = email.lastIndexOf('.com') + email.lastIndexOf('.ru') + 1;

          //проверка корректности введённых данных
    			if(name == ''){
    				alert('Введите имя !!!');
    			}
    			else if(!/^[а-я А-Я]+$/.test(name) && !/^[a-z A-Z]+$/.test(name)){
    				alert('Введите корректное имя !!!');
    			}
          else if(amount_water == ''){
    				alert('Введите количество воды !!!');
    			}
          else if((amount_water == '0') || !/^[0-9]+$/.test(amount_water)){
    				alert('Введите корректное количество воды !!!');
          }
          else if((amount_water == '') && !/^[0-9]+$/.test(tare_quantity)){
    				alert('Введите корректное количество сдаваемой тары !!!');
          }
    			else if(email == ''){
    				alert('Введите email !!!');
    			}
    			else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
    				alert('Введите корректный email !!!');
    			}
    			else if(ph_number == ''){
    				alert('Введите номер телефона !!!');
    			}
          else if(city == ''){
    				alert('Введите город !!!');
    			}
          else if(address == ''){
    				alert('Введите адрес !!!');
    			}
    			else if(ph_number.length < 10 || !/^[\d\+][\d\(\)\ -]{4,14}\d$/.test(ph_number)){
    				alert('Введите корректный номер !!!');
    			}
          else if(!(agreement == '') && !/^[0-9]+$/.test(agreement)){
    				alert('Введите корректный номер договора !!!');
          }
    			else{
    				$.ajax({
    					url: 'process.php',
    					type: 'post',
    					data:
    						{newname:name,
    						 newemail:email,
    						 newph_number:ph_number,
                 newcity:city,
                 newaddress:address,
                 newagreement:agreement,
                 newamount_water:amount_water,
                 newtare_quantity:tare_quantity,
                 newcomment:comment,
    						},
    					success: function(response){
    						$('#message').html(response);
    					}
    				});

    				$('#registraion_form')[0].reset();
    			}
    		});

    	</script>

    </body>
</html>
