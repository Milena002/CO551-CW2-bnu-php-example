<!-- Background image -->
<div class="bg-image "
     style="background-image: url('https://www.bucks.ac.uk/sites/default/files/styles/1920_1080/public/2021-03/PG%20open%20days.webp?h=d1cb525d&itok=9k9qrCLw'); height: 100vh;">
     <br>
 <!-- Logo image -->
<img src="ImageFiles/logo1.webp" class="mx-auto d-block mt-5 mb-5" alt="logo" width='400' height='230'>
<h1 class="mt-2 mb-2 text-light text-center"  >Login</h1>
<?php 
if(!empty($message)){
   echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
}
 ?>

<!--<form >
   Student ID:
   <input name="txtid" type="text" />
   <br/>
   Password:
   <input name="txtpwd" type="password" />
   <br/>
   <input type="submit" value="Login" name="btnlogin" />
</form> -->



<form name="frmLogin" action="authenticate.php" method="post" class="mt-5">
  <div class="mb-3 col-md-6 mx-auto d-block">
    <label for="txtid" class="form-label text-white">Student ID</label>
    <input type="text" class="form-control" id="txtid" name="txtid">
  </div>
  <div class="mb-3 col-md-6 mx-auto d-block">
    <label for="txtpwd" class="form-label text-white">Password</label>
    <input type="password" class="form-control" id="txtpwd" name="txtpwd">
  </div>
  <input type="submit" name="btnlogin" class="btn btn-light  mx-auto d-block" value="Login"></button>
</form>
</div>