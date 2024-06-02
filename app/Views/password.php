<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../assets/login/css/style.css">

    <style>
        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        video{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
			z-index: -1;
        }

        .bg-custom{
            background-color : #fcbb9a;
			
        }

        .bg-text{
            color: white;
        }


        
    </style>
</head>
<body>

<section class="ftco-section">
		<div class="container">
			<video autoplay muted loop>
				<source src="<?= base_url('assets/wallpaper.mp4'); ?>" type="video/mp4">
			</video>
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section bg-text">Password</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">

		      	<?php echo form_open('Auth/insert_pass')?>
		      	<form action="" class="signin-form">
	            <div class="form-group">
                    <input type="hidden" name="email" value="<?= session()->get('email');?>">
                    <input type="hidden" name="username" value="<?= session()->get('username');?>">
                    <input type="hidden" name="picture" value="<?= session()->get('picture');?>">
	                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password">
	                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Submit</button>
	            </div>
				<?php 
				$errors = session()->getFlashdata('errors');
				if (!empty($errors)) { ?>
					<?php if (! empty($errors)): ?>
					<div class="alert alert-danger" role="alert">
						<ul>
						<?php foreach ($errors as $error): ?>
							<li><?= esc($error) ?></li>
						<?php endforeach ?>
						</ul>
					</div>
				<?php endif ?>
				<?php } ?>
				<?php if (session()->getFlashdata('pesan')) : ?>
					<div class="alert alert-success" id="sukses" role="alert">
						<button type="button" class="btn btn-ccess" onclick="document.getElementById('sukses').remove()">
						x
						</button>
						<?= session()->getFlashdata('pesan'); ?>
					</div>
				<?php endif; ?>
				<?php echo form_close(); ?>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../assets/login/js/jquery.min.js"></script>
	<script src="../assets/login/js/popper.js"></script>
	<script src="../assets/login/js/bootstrap.min.js"></script>
	<script src="../assets/login/js/main.js"></script>
	<script>
		function destory(){
			var div = document.getElementById("sukses");
			div.destory();
		}
	</script>
</body>
</html>