<?php

session_start();

include ('../config/config.php');

if (isset($_GET['logout']))
{
	if (isset($_SESSION['user_id']))
		unset($_SESSION['user_id']);
		
	setcookie('login', '', 0, "/");
	setcookie('password', '', 0, "/");
	// � ��������� ��� �� �������
	header('Location: index.php');
	exit;
}

if (isset($_SESSION['user_id']))
{
	// ���� ��� ���������, ������������ ��� ������ �� �������� ��������
	
	header('Location: system_accounts/index.php');
	exit;

}



if (!empty($_POST))
{
	$login = (isset($_POST['login'])) ? mysql_real_escape_string($_POST['login']) : '';
	
    $password = md5($_POST['password']);

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
			
			
			// ���� ������������ ����� "��������� ����"
			// �� ������ ��� � ���� ����� � ����� ������
			
			$time = 86400; // ������ ���� �� 24 ����
			
			if (isset($_POST['remember']))
			{
				setcookie('login', $login, time()+$time, "/");
				setcookie('password', $password, time()+$time, "/");
			}
			
			// � ������������ ��� �� �������� ��������
			header('Location: system_accounts/index.php');
			exit;

			// �� ��������, ��� ��� ������ � ����������� �������, � ��� � ������ ������� ������ �������������� session_start();
		}
		else
		{
			die('����� ����� � ������� �� ������� � ���� ������. � <a href="login.php">��������������</a>');
		}
	
}

print '
<form action="#" method="post">
	<table>
		<tr>
			<td>�����:</td>
			<td><input type="text" name="login" /></td>
		</tr>
		<tr>
			<td>������:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>���������:</td>
			<td><input type="checkbox" name="remember" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="��������������" /></td>
		</tr>
	</table>
</form>
';

?>