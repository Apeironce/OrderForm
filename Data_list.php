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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
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
          <div id="table"></div>

          <script>

          var step = 3; //количество записей на странице
          var total_pages_bd; //количество страниц
          var current_page = 0; //текущая страница

          //запрос на получение количества страниц
          $.ajax({
            url: 'processDB.php',
            type: 'post',
            data:	{ counter: "1",
                    newstep:step},
            success: function(response){
              total_pages_bd = response;
              $('#btn_back').toggle(); //скрытие кнопок
              if (total_pages_bd < 2){
                $('#btn_next').toggle();
              }
            }
          });

            $.ajax({ //запрос на отрисовку таблицы при её первой загрузке
    					url: 'processDB.php',
    					type: 'post',
    					data:	{ print: "1",
                      newcurrent_page:current_page,
                      newstep:step},
    					success: function(response){
    						$('#table').html(response);
    					}
    				});


            $(document).on('click','#btn_next',function(e){ //нажатие кнопки далее
            $('#table').empty(); //очищение таблицы
            current_page += 1;
            //условия для отображения и скрытия кнопок
            if (current_page == 1){
              $('#btn_back').toggle();
            }
            if (current_page == total_pages_bd - 1) {
              $('#btn_next').toggle();
            }
            $.ajax({ //запрос на отрисвку таблицы
    					url: 'processDB.php',
    					type: 'post',
    					data:	{ print: "1",
                      newcurrent_page:current_page,
                      newstep:step},
    					success: function(response){
    						$('#table').html(response);
    					}
    				});
            });


            $(document).on('click','#btn_back',function(e){ //нажати кнопки назад
            $('#table').empty();
            current_page -= 1;
            if (current_page == 0){
              $('#btn_back').toggle();
            }
            if (current_page == total_pages_bd - 2) {
              $('#btn_next').toggle();
            }
            $.ajax({
    					url: 'processDB.php',
    					type: 'post',
    					data:	{ print: "1",
                      newcurrent_page:current_page,
                      newstep:step},
    					success: function(response){
    						$('#table').html(response);
    					}
    				});
            });

          </script>

          </div>
          <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6 m-t-15">
          <button type="submit" id="btn_back" class="btn btn-success">Назад</button>
          <button type="submit" id="btn_next" class="btn btn-success">Вперёд</button>
          </div>
          </div>
        </div>
      </div>
    </body>
</html>
