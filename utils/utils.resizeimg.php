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
  // ������� ��������� ����������� ����� ���������� $big,
  // ������� ���������� � ���� $small
  // ����������� ����� ����� ������ � ������ ������
  // $width � $height ��������, ��������������. ��� ����������� 
  // ��������� ��������. ��� ����� ����������� ����� ��������� 
  // ��������� ��������������� �����������.
  function resizeimg($big, $small, $width, $height) 
  { 
 
    // ��������� ����������� ������ �����������, ������� ����� �������� 
    $ratio = $width / $height; 
    // ������� ������� ��������� ����������� 
    $size_img = getimagesize($big); 
    list($width_src, $height_src) = getimagesize($big); 
    // ���� ������� ������, �� ��������������� �� ����� 
    if (($width_src<$width) && ($height_src<$height))
    {
      copy($big, $small);
      return true; 
    }
    // ������� ����������� ������ ��������� ����������� 
    $src_ratio=$width_src/$height_src; 

    // ����� ��������� ������� ����������� �����, ����� ��� 
    // ��������������� ����������� ��������� ��������� ����������� 
    if ($ratio<$src_ratio) 
    { 
      $height = $width/$src_ratio; 
    } 
    else 
    { 
      $width = $height*$src_ratio; 
    } 
    // �������� ������ ����������� �� �������� �������� 
    $dest_img = imagecreatetruecolor($width, $height);   
    $white = imagecolorallocate($dest_img, 255, 255, 255);        
    if ($size_img[2]==2)  $src_img = imagecreatefromjpeg($big);                       
    else if ($size_img[2]==1) $src_img = imagecreatefromgif($big);                       
    else if ($size_img[2]==3) $src_img = imagecreatefrompng($big); 

    // ������������ �����������     �������� imagecopyresampled() 
    // $dest_img - ����������� ����� 
    // $src_img - �������� ����������� 
    // $width - ������ ����������� ����� 
    // $height - ������ ����������� �����         
    // $size_img[0] - ������ ��������� ����������� 
    // $size_img[1] - ������ ��������� ����������� 
    imagecopyresampled($dest_img, 
                       $src_img, 
                       0, 
                       0, 
                       0, 
                       0, 
                       $width, 
                       $height, 
                       $width_src, 
                       $height_src);
    // ��������� ����������� ����� � ���� 
    if ($size_img[2]==2)  imagejpeg($dest_img, $small);                       
    else if ($size_img[2]==1) imagegif($dest_img, $small);                       
    else if ($size_img[2]==3) imagepng($dest_img, $small); 
    // ������ ������ �� ��������� ����������� 
    imagedestroy($dest_img); 
    imagedestroy($src_img); 
    return true;          
  }   
?>