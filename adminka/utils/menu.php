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

  // ����������� ���������� �������� �������
  // ����������������� ��� ������������ ����

  // ��������� ������� /dmn
  $dir = opendir("..");
  // � ����� ���������� �� ���� ������ �
  // ������������
  while (($file = readdir($dir)) !== false)
  {
    // ������������ ������ �����������, 
    // ��������� �����
    if(is_dir("../$file"))
    {
      // ��������� ������� ".", ������������ ".."
      // ��������, � ����� ������� utils
      if($file != "." && $file != ".." && $file != "utils")
      {
        // ���� � �������� ���� � ���������
        // ����� .htdir
        if(file_exists("../$file/.htdir"))
        {
          // ���� .htdir ���������� - 
          // ������ �������� ����� � ���
          // ��������
          list($block_name, 
               $block_description) = file("../$file/.htdir");
        }
        else
        {
          // ���� .htdir �� ���������� -
          // � �������� ��� �������� 
          // ��������� ��� �����������
          $block_name        = "$file";
          $block_description = "";
        }

        // �������� ������� ����� ������ ������
        if(strpos($_SERVER['PHP_SELF'], $file) !== false) 
        {
          $style = 'class=active';
        }
        else $style = '';

        // ��������� ����� ����
        echo "<div $style>
                <a class=menu 
                   href='../$file' 
                   title='$block_description'>
                   $block_name
                </a>
              </div>";
      }
    }
  }
  // ��������� �������
  closedir($dir);
?>