<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div id="warp">
Monotone Admin Login CSS
  <form  action="process.php" method="POST" id="formu">
    	<div class="admin">
			      <div class="rota">
				        <h1>ADMIN</h1>
        				<input id="username" type="text" name="username" value="" placeholder="Kullanıcı Adı"/><br />
				        <input id="password" type="password" name="password" value="" placeholder="Şifre"/>
                        
      			</div>
    		</div>
    		<div class="cms">
      			<div class="roti">
			        	<h1>CMS</h1>
				        <button id="valid" type="submit" name="adminLogin">Giriş Yap</button><br />
                    
      </div>
    		</div>
  	</form>
</div>
<script>
    $("#valid").click(function() {
  $(".admin").addClass("up").delay( 100 ).fadeOut( 100 );
  $(".cms").addClass("down").delay( 150 ).fadeOut( 100 );
});
</script>
</body>
</html>