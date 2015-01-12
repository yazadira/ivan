<?php
  ////////////////////////////////////////////////////////////
  // 2005-2008 (C) Кузнецов М.В., Симдянов И.В.
  // PHP. Практика создания Web-сайтов
  // IT-студия SoftTime 
  // http://www.softtime.ru   - портал по Web-программированию
  // http://www.softtime.biz  - коммерческие услуги
  // http://www.softtime.mobi - мобильные проекты
  // http://www.softtime.org  - некоммерческие проекты
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);

  ////////////////////////////////////////////////////////////
  // Текстовое поле для e-mail
  ////////////////////////////////////////////////////////////

  class field_text_email extends field_text
  {
    // Метод, проверяющий корректность переданных данных
    function check()
    {
      if($this->is_required || !empty($this->value))
      {
        $pattern = "#^[-0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$#i";
        if (!preg_match($pattern, $this->value))
        {
          return "Введите e-mail в виде <i>something@server.com</i>";
        }
      }

      return "";
    }
  }
?>