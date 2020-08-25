<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.css">
	<style>
		.contorno{
			border-radius: 10px;
		}
		.jumbotron{
			box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
		}
		body{

      }
	</style>
</head>
<body>
	<section class="container">
		<div class="row justify-content-center h-100 mt-4 contorno">
			<form class="jumbotron col-md-6" action="validar.php" method="POST">
			  <div class="form-group">
			    <label for="">Empresa</label>
			    <input type="text" name="empresa" class="form-control" placeholder="Ingresa Empresa" required="">
			  </div>
			  <div class="form-group">
			    <label for="">Email</label>
			    <input type="email" name="email" class="form-control" placeholder="Ingresa Email" required="">
			  </div>
			  <div class="form-group">
			    <label for="">Password</label>
			    <input type="password" name="contraseña" class="form-control"  placeholder="Password" required="">
			  </div>
			  <input type="submit" value="Submit" class="btn btn-primary">
			</form>			
		</div>

	</section>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
</html>