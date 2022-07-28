<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
  Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-header text-center">
              <h2>Login</h2>
            </div>
            <div class="card-body">
              <form action="<?= base_url() . route_to('login') ?>" name="login" id="log-form" method="post">
                         
                <div class="form-group mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?= old('username') ?>" aria-describedby="UsernameHelp" placeholder="Masukkan Username . . . ">
                </div>
                <div class="form-group mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control <?php echo (session()->has('error')) ? 'is-invalid' : ''  ?>" name="password" id="password" value="<?= old('password') ?>" aria-describedby="passwordHelp" placeholder="Masukkan password . . . ">
                  <?php 
                    if (session()->has('error')) {
                      ?>
                      <div class="row justify-content-end m-1">
                        <span class="text-danger" role="alert">
                            <small><?= session()->getFlashdata('error') ?></small>
                        </span>
                      </div>
                      <?php
                    }
                  ?>
                </div>
              </form>
            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary" id="send_form" form="log-form">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
  <script>
    $(document).ready(function() {
      $("#log-form").validate({
        rules: {
          username: {
            required: true,
            alphanumeric: true,
            minlength: 3,
            // unique: 
          },
          password: {
            required: true,
            alphanumeric: true,
            minlength: 4,
          },
        },
        messages: {
          username: {
            required: 'Username wajib diisi',
            alphanumeric: 'Username hanya boleh berisi huruf, angka, dan underscore saja',
            minlength: 'Username harus lebih dari sama dengan 3 karakter'
          },
          password: {
            required: 'Password wajib diisi',
            alphanumeric: 'Password hanya boleh berisi huruf, angka, dan underscore saja',
            minlength: 'Password harus lebih dari sama dengan 4 karakter'
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        },
      })
    })
  </script>
<?= $this->endSection() ?>