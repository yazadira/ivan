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

  function menu_navigation($id_catalog, $link, $catalog)
  {
    $id_catalog = intval($id_catalog);
    $query = "SELECT * FROM $catalog 
              WHERE id_catalog = $id_catalog";
    $cat = mysql_query($query);
    if(!$cat)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��������� � 
                               ������� �������� 
                               menu_navigation()");
    }
    if(mysql_num_rows($cat) > 0)
    {
      $catalog_result = mysql_fetch_array($cat);
      $link = "<a class=menu 
              href=index.php?id_parent=".$catalog_result['id_catalog'].">
              ".$catalog_result['name']."</a>-&gt;".$link;
      $link = menu_navigation($catalog_result['id_parent'], 
                              $link, 
                              $catalog);
    }
    return $link;
  }
?>