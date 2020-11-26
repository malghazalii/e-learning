	<!-- login -->
	<div class="login-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Login
			
			</h3>
			<!-- content -->
			<div class="sub-main-w3 pt-md-4">
				<form action="<?= base_url('Auth/login'); ?>" method="post">
			<?= $this->session->flashdata('message'); ?>
					<div class="form-style-agile form-group">
						<label>
							Username
							<i class="fas fa-user"></i>
						</label>
						<input placeholder="Username" class="form-control" id="name" name="name" type="text" value="<?= set_value('name'); ?>">
					</div>
					<div class="form-style-agile form-group">
						<label>
							Password
							<i class="fas fa-unlock-alt"></i>
						</label>
						<input placeholder="Password" class="form-control" id="password" name="password" type="password" value="<?= set_value('password'); ?>">
						
					</div>
					<!-- switch -->
				
					<!-- //switch -->
					<input type="submit" value="Log In">
					<p class="text-center dont-do mt-4 text-white">Some courses may allow guest access
					</p>
				</form>
			</div>
			<!-- //content -->
		</div>
	</div>
	<!-- //login -->