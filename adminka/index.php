<?php


session_start();

 require_once("../config/config.php");


// ���� ������������ �� �����������

if (!isset($_SESSION['user_id']))
{
	// �� ��������� ��� ����
	// ����� ��� ���� ����� � ������ � ������ �������

	if (isset($_COOKIE['login']) && isset($_COOKIE['password']))
	{
		// ���� �� ����� �������
		// �� ������� ������������ ������������ �� ���� ������ � ������
		$login = mysql_escape_string($_COOKIE['login']);
		$password = mysql_escape_string($_COOKIE['password']);

		// � �� �������� � ������������ ����� �����:

		// ������ ������ � ��
		// � ���� ����� � ����� ������� � �������

		$query = "SELECT `id_account`
					FROM `system_accounts`
					WHERE `name`='{$login}' AND `pass`='{$password}'
					LIMIT 1";
		$sql = mysql_query($query) or die(mysql_error());

		// ���� ����� ������������ �������
		if (mysql_num_rows($sql) == 1)
		{
			// �� �� ������ �� ���� ����� � ������ (�������� �� ����� ������� ID ������������)

			$row = mysql_fetch_assoc($sql);
			$_SESSION['user_id'] = $row['id_account'];

			// �� ��������, ��� ��� ������ � ����������� �������, � ��� � ������ ������� ������ �������������� session_start();
		}
	}
}



if (isset($_SESSION['user_id']))
{
	$query = "SELECT `name`
				FROM `system_accounts`
				WHERE `id_account`='{$_SESSION['user_id']}'
				LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	
	// ���� ���� ����� ������ � �������������
	// �� ����� ������� ��� ���� �� ����� �� �����.. =)
	// �� ���� ��� ����� ID, ������������� � ������, ����� �� ��� ������
	if (mysql_num_rows($sql) != 1)
	{
		header('Location: login.php?logout');
		exit;
	}
	
	header('Location: system_accounts/index.php');
	exit;
}
else
{
    header('Location: login.php');
	exit;
}


if (!isset($_SESSION['user_id']))

{
    print '��� ������� � ����� ����������������� ���������������';
	include_once('login.php');

}
else
{
	print '<a href="login.php?logout">�����</a><br />';
}

print '<p><small>* ��� ����������� ������������ �����: <b>md5</b> � ������: <b>password</b></small></p>';


?>