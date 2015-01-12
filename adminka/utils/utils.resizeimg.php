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
  function resizeimg($big, $small, $pos, $width, $height) 
  { 
    // ��� ����� � �������������� ������������ 
    $big = "../../photos/large/$big"; 
    // ��� ����� � ����������� ������. 
    $small = "../../photos/$pos/$small";     
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

		if($pos == 'right')
		{
		$dest = imagecreatefromjpeg($small); 
		$src = imagecreatefrompng("../../photos/right/transporent_right.png");
		imagecopyresampled ($dest,$src,0,0,0,0,$width, $height, $width, $height);
		imagejpeg($dest, $small,80);
		}	
		
		if($pos == 'left')
		{
		$dest = imagecreatefromjpeg($small); 
		$src = imagecreatefrompng("../../photos/left/transporent_left.png");
		imagecopyresampled ($dest,$src,0,0,0,0,$width, $height, $width, $height);
		imagejpeg($dest, $small,80);
		}	
    // ������ ������ �� ��������� ����������� 
    imagedestroy($dest_img); 
    imagedestroy($src_img); 
    return true;
  }   
?>