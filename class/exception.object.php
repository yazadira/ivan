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
  // ��������� � �������, ��������� �� field-������������
  ////////////////////////////////////////////////////////////

  class ExceptionObject extends Exception
  {
    // ��� �������
    protected $key;

    public function __construct($key, $message)
    {
      $this->key = $key;

      // �������� ����������� �������� ������
      parent::__construct($message);
    }

    public function getKey()
    {
      return $this->key;
    }
  }
?>