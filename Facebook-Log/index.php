<?php require'./fb-init.php'; ?>
<?php if(isset($_SESSION['access_token'])):?>
<a href="logout.php">Logout</a>	
<?php else: ?>	
<?php endif: ?>
<a href="<?php echo $login_url; ?>">Login With Facebook</a>