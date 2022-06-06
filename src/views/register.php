<ul class="nav nav-tabs">
	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	<li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>	
	<li class="nav-item"><a href="register.php" class="nav-link active">Register</a></li>
</ul>
<br/>

<form action="register.php" method="post">
	<div class="mb-3">
		<label for="name">Full Name</label>
		<input type="text" class="form-control" name="name" required>
	</div>

	<div class="mb-3">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" required>
	</div>

	<div class="mb-3">
		<label for="f_nac">Date of birth</label>
		<input type="date" class="form-control" name="f_nac" required>
	</div>

	<div class="mb-3">
		<label for="telephone">Telephone</label>
		<input type="tel" class="form-control" name="telephone" required>
	</div>

	<div class="mb-3">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" required>
	</div>

	<div class="mb-3">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" required>
	</div>

	<div class="mb-3">
		<input type="submit" value="Submit" class="form-control btn btn-primary">
	</div>
</form>

<?php if ($status == "error") : ?>
<div class="alert alert-danger" role="alert">
  <?php echo $message; ?>
</div>
<?php endif; ?>

<?php if ($status == "success") : ?>
<div class="alert alert-success" role="alert">
	<?php echo $message; ?>
</div>
<?php endif; ?>