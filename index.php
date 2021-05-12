<form action="index.php" method="POST">
 <label for="username"><b>Username</b></label>
 <br>
 <input type="text" placeholder="Username" name="username" required>
 <br>
 <br>
 <label for="password"><b>Password</b></label>
 <br>
 <input type="password" placeholder="Password" name="password" required>
 <br>
 <br>
 <button type="submit">Login</button>
</form>
<?php 
include 'functions.php';
$oKorisnik=CheckUser(isset($_POST['username']),isset($_POST['password']));
SetSessions($oKorisnik);
?>