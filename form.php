<form action="" method="POST">
  <input name="fio" />
  <input type="submit" value="ok" />
</form>

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
      
              <label>
                  Год рождения:<br />
                  <select id="year">
                    <option value="Значение1">1900</option>
                    <option value="Значение2">1901</option>
                    <option value="Значение3">1902</option>
                    <option value="Значение4">1903</option>
                    <option value="Значение5">1904</option>
                    <option value="Значение6">1905</option>
                    <option value="Значение7">1906</option>
                    <option value="Значение8">1907</option>
                    <option value="Значение9">1908</option>
                    <option value="Значение10">1909</option><option value="Значение1">1900</option>
                    <option value="Значение11">1910</option>
                    <option value="Значение12">1911</option>
                    <option value="Значение13">1912</option>
                    <option value="Значение14">1913</option>
                  </select>
              </label><br />
      
              Пол:<br />
              <label>
                  <input type="radio" checked="checked"
                         name="radio-group-1" value="Значение1" />
                  Муж
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-1" value="Значение2" />
                  Жен
              </label><br />
      
              Количество конечностей:<br />
              <label>
                  <input type="radio" checked="checked"
                         name="radio-group-2" value="Значение1" />
                  1
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" value="Значение2" />
                  2
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" value="Значение2" />
                  3
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" value="Значение2" />
                  4
              </label><br />
      
              <label>
                  Сверхспособности:
                  <br />
                  <select name="field-name-4[]"
                          multiple="multiple">
                      <option value="Значение1">Бессмертие</option>
                      <option value="Значение2" selected="selected">Прохождение сквозь стены</option>
                      <option value="Значение3" selected="selected">Левитвция</option>
                  </select>
              </label><br />
      
              <label>
                  Биография:<br />
                  <textarea name="bio"></textarea>
              </label><br />
      
      
              Чекбокс:<br />
              <label>
                  <input type="checkbox" checked="checked"
                         name="check" />
                  С контрактом ознакомлен
              </label><br />
      
              Отправить данные:
              <input type="submit" value="Отправить" />
          </form>
        </section>
        </div>
    </main>

</body>