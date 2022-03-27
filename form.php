<head>
    <title>Форма</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div id="sect">
            <div id="h1">
                <h1>Отправьте форму!</h1>
            </div>
        </div>
    </header>
    <main>
    
        <div id="content3">
        <section id="form">
                <h2>Форма</h2>
                <form action=""  method="POST">

              <label>
                  Имя:<br />
                  <input name="name"
                         value="" />
              </label><br />
      
               <label>
                  email:<br />
                  <input name="email"
                         value=""
                         type="email" />
              </label><br />
      
              <!--<label>-->
                  Год рождения:<br />
                  <select name="year"></select>
                   <script>$(document).ready(function() {
                            $("#date").datepicker({
                                changeYear:true,
                                yearRange: "2005:2015"
                            });
                        });
                       </script>
              <!--</label>--><br />
      
              Пол:<br />
              <label>
                  <input type="radio" checked="checked"
                         name="radio-group-1" value="male" />
                  Муж
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-1" value="female" />
                  Жен
              </label><br />
      
              Количество конечностей:<br />
              <label>
                  <input type="radio" checked="checked"
                         name="radio-group-2" value="1" />
                  1
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" value="2" />
                  2
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" value="3" />
                  3
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" value="4" />
                  4
              </label><br />
      
              <label>
                  Сверхспособности:
                  <br />
                  <select name="super"
                      multiple="multiple">
                      <option value="Immortality">Бессмертие</option>
                      <option value="Passing through walls">Прохождение сквозь стены</option>
                      <option value="Levitation">Левитвция</option>
                  </select>
              </label><br />
      
              <label>
                  Биография:<br />
                  <textarea name="bio"></textarea>
              </label><br />
      
      
              Чекбокс:<br />
              <label>
                  <input type="checkbox"
                         name="check" value="Yes"/>
                  С контрактом ознакомлен
              </label><br />
      
              Отправить данные:
              <input type="submit" value="Отправить" />
          </form>
        </section>
        </div>
    </main>

</body>
