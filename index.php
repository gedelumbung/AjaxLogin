<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login via AJAX Dengan Menggunakan jQuery dan PHP</title>
<style>
body{
	font-family: Arial;
	font-size:12px;
	margin:40px auto;
} 
.input-teks{
	padding:5px;
	border:1px solid #666666;
}
.input-tombol{
	padding:5px;
	border:1px solid #666666;
	background-color:#FF9900;
	cursor:pointer;
}
#konten {
	background-image:url(spotlight-bg.png);
	color:#FFFFFF;
	width: 260px;
	margin: 0px auto;
	border: 1px solid #333333;
	padding: 10px;
}
.berhasil {
	color:#66CC00;
	margin:0px auto;
	padding:10px;
	background-color:#fff;
	font-weight:bold;
}
.gagal {
	color:#FF0000;
	margin:0px auto;
	padding:10px;
	background-color:#fff;
	font-weight:bold;
}

</style>
<script type="text/javascript" src="jquery-latest.js"></script>
<script>
$(document).ready(function() {
	$("#tombollogin").click(function() {
	
		var aksilogin = $("#frmlogin").attr('action');
		var datalogin = {
			username: $("#username").val(),
			password: $("#password").val()
		};
		
		$.ajax({
			type: "POST",
			url: aksilogin,
			data: datalogin,
			success: function(aksi)
			{
				if(aksi == '1')
					$("#frmlogin").slideUp('slow', function() {
						$("#hasil").html("<p class='berhasil' align='center'>Anda Berhasil Login<br>Halaman akan dialihkan dalam 5 detik...<meta http-equiv='refresh' content='5; url=http://gedelumbung.com'></p>");
					});
				else
					$("#frmlogin").slideUp('slow', function() {
						$("#hasil").html("<p class='gagal' align='center'>Username atau Password salah...!!! <br> <a onClick=buka(); style='cursor:pointer;'>Ulangi Lagi<a></p>");	
					});
				document.frmlogin.username.value = "";
				document.frmlogin.password.value = "";
			}
		});
		return false;
	});
	
});
function buka()
{
	$('#frmlogin').slideDown();
}
</script>
</head>

<body>
<div id="konten">
<div id="hasil"></div>
	<form id="frmlogin" name="frmlogin" action="login.php" method="post">
	<table>
	<tr><td>Username</td><td>: <input type="text" name="username" id="username" class="input-teks" /></td></tr>
	<tr><td>Password</td><td>: <input type="text" name="password" id="password" class="input-teks" /></td></tr>
	<tr><td></td><td><input type="submit" value="Masuk" id="tombollogin" class="input-tombol"/></td></tr>
	</table>
	</form>
</div>
</body>
</html>
