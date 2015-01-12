<?php
function enter($name, $password){ 
	global $tbl_users;
	$query="SELECT * FROM $tbl_users WHERE login='$name' AND password='$password' AND blockunblock='unblock'";
	$us=mysql_query($query);
		if(!$us){exit($query);
		}
		if(mysql_num_rows($us)){
			$user=mysql_fetch_array($us);
			$_SESSION['id_user_position']=$user['id'];
			$query="update $tbl_users SET lastvisit=NOW() WHERE id=".$user['id'];
			$cut=mysql_query($query);
			if(!$cut){
				exit($query);
			}
		return true;
		}
		else{return false;
		}


	
}
		