<?php
  ////////////////////////////////////////////////////////////
  // 2005-2008 (C) �������� �.�., �������� �.�.
  // PHP. �������� �������� Web-������
  // IT-������ SoftTime 
  // http://www.softtime.ru   - ������ �� Web-����������������
  // http://www.softtime.biz  - ������������ ������
  // http://www.softtime.mobi - ��������� �������
  // http://www.softtime.org  - �������������� �������
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);

  ////////////////////////////////////////////////////////////
  // ������� ���� hidden
  ////////////////////////////////////////////////////////////

  class field_hidden extends field
  {
    // ����������� ������
    function __construct($name, 
                   $id_required = false, 
                   $value = "")
    {
      // �������� ����������� �������� ������ field ��� 
      // ������������� ��� ������
      parent::__construct($name, 
                   "hidden", 
                   "-", 
                   $id_required, 
                   $value,
                   $parameters, 
                   "",
                   "");
    }
    
    // �����, ��� �������� ����� �������� ����
    // � ������ ���� �������� ����������
    function get_html()
    {
      $tag = "<input type=\"".$this->type."\" 
                     name=\"".$this->name."\" 
                     value=\"".htmlspecialchars($this->value, ENT_QUOTES)."\">\n";
      return array("", $tag);
    }
    // �����, ����������� ������������ ���������� ������
    function check()
    {
      // ����������� ����� ����� ��������� � ���� ������
      if (!get_magic_quotes_gpc())
      {
        $this->value = mysql_escape_string($this->value);
      }
      if($this->is_required)
      {
        if(empty($this->value)) return "������� ���� �� ���������";
      }

      return "";
    }
  }
?>