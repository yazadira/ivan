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

  // ������������ ����������, ����������� ��� 
  // ��������� � ���� MySQL

  // �������� ��������� ��������
  require_once("../utils/top.php");

  echo "<p class=help>��������� �������������� 
        �������� (ExceptionMySQL) ��� ���������
        � ���� MySQL.</p>";
  echo "<p class=help>{$exc->getMySQLError()}<br>
       ".nl2br($exc->getSQLQuery())."</p>";
  echo "<p class=help>������ � ����� {$exc->getFile()}
        � ������ {$exc->getLine()}.</p>";

  // �������� ���������� ��������
  require_once("../utils/bottom.php");
  exit();
?>