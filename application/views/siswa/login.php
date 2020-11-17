
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w" method="post" action="<?= base_url('Siswa/auth'); ?>">
                    <span class="login100-form-title p-b-25">
                        Login
                    </span>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="wrap-input100 validate-input m-b-7" data-validate="nip is required">
                        <input class="input100" type="text" id="nis" name="nis" placeholder="NIS" value="<?= set_value('nis'); ?>">
                        <span class="focus-input100"></span>
                    </div>
                    <?= form_error('nis', '<small style="color:red" class="text-danger pl-3">', '</small>'); ?>

                    <div class="wrap-input100 validate-input m-t-16 m-b-7" data-validate="Password is required">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>
                    <?= form_error('password', '<small style="color:red" class="text-danger pl-3">', '</small>'); ?>

                    <div class="container-login100-form-btn m-t-15">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>