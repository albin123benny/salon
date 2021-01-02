<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign In Page</title>
<!--css-file------------------>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<!--using-FontAwesome--------->
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
<script src="js/validation.js"></script>

<script>
	function errval(){
		document.getElementById("err").style.cssText="visibility: hidden;" ;
	}

</script>

</head>

<body>
<section class="sign-in">
<!--main-sign-in-page---------->
<div class="main-page">
<!--phone-top-bar-screen--------->
<div class="top-bar"></div>	
<!--name------------->
<div class="name">
<h1 style="font-size:60px;">HAIR STUDIO Barber</h1>
<p></p>
</div>
<!--btns---------------------->
<div class="form-btns">
<button class="s-btn">Sign In</button>
<button class="new-btn">New Account ?</button>
<center style="margin-top:10px"><a href="signin.php" >Sign or register as a customer</a></center>

</div>
<!--cancel-btn------------>
<div class="cancel">
	<a href="#"><i class="fas fa-times"></i></a>
</div>
</div>
<!--sign-in-page--------------->
<div class="sign-in-page">
<form action="login.php" method='POST' id='login'>
	<?php 
		if(isset($_GET['errormessage'])){
			if($_GET['errormessage'] =='WRONGPASSWORD'){ ?>
			<center><p id="err" style="color:red;font-size:12px">Invalid username or password !</p></center>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
           $(function(){
              $(".s-btn").trigger("click"); //tried .click();
           });
        </script>
			<?php
		}
		}
	?>
	
<!--email------->
<input type="email" placeholder="Email" id="email" name="email"  onclick="errval()" required oninput="valEmail();"/>
<!--password------->
<input type="password" placeholder="Password" id ="password" onclick="errval()" name ="password" required oninput="valPassword();"/>
<!--btn------->
<button onclick='submit()'>Sign In</button>
</form>	
	
</div>
<!--sign-up-page--------------->
<div class="sign-up-page">
<form id='reg' method='POST' action="reg.php?type=barber">
	<!--email------->
	<br>
	<br>
	<input type="Name" placeholder="name" id="uname" name="uname" required onblur="full_name(this.id)"/>
	<input type="email" placeholder="Email"  id="email1" name="email1" required onblur="email_id(this.id)">
	<!--password------->
	<input type="password" placeholder="Password" id="password1" name="password1" required onblur="pass(this.id)" />
	<!--password------->
	<input type="password" placeholder="Repeat Password" id="rept-password" name="rept-password" required onblur="con_pass(this.id)" />
	<input type="phone" placeholder="mobile no" id="mobno" name="mobno" required onblur="phone_no(this.id)">
	<!--btn------->
	<button onclick="val('reg')">Sign Up</button>
</form>	

	
</div>
</section>
<!--background-circule-------------------->
<div class="bg-circule"></div>
	
<!--Jquery------------>
<script type="text/javascript" src="js/JQuery3.3.1.js"></script>
<script type="text/javascript" >
	/*For Sign In*/
$(document).on('click','.s-btn',function(){
	$('.sign-in').addClass('active-sign-in').siblings('.sign-in').removeClass('active-sign-up')
});		
	/*For Sign up*/
$(document).on('click','.new-btn',function(){
	$('.sign-in').addClass('active-sign-up').siblings('.sign-in').removeClass('active-sign-in')
});	
	/*For Go Back To Main Page*/
  $(document).ready(function(){
	 $('.cancel a').click(function(){
		 $('.sign-in').removeClass('active-sign-in , active-sign-up')
	 })
 });
</script>
</body>
</html>
