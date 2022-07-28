<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
  Register
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-header text-center">
              <h2>Register</h2>
            </div>
            <div class="card-body">
              <form action="" name="register" id="reg-form" method="post">
    
                <div class="alert alert-success d-none" id="res_message"></div>
                         
                <div class="form-group mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" placeholder="Masukkan Nama Lengkap . . . ">
                </div>
                <div class="form-group mb-3">
                  <label for="usia" class="form-label">Usia</label>
                  <input type="number" class="form-control" name="usia" id="usia" aria-describedby="usiaHelp" placeholder="Masukkan Usia Asli . . . ">
                </div>
                <div class="form-group mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" aria-describedby="UsernameHelp" placeholder="Masukkan Username . . . ">
                  <div class="row justify-content-end m-1">
                    <span class="text-danger" role="alert">
                        <small id="usernameError"></small>
                    </span>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" placeholder="Masukkan password . . . ">
                </div>
              </form>
            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary" id="send_form" form="reg-form">Submit</button>
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
      $("#reg-form").validate({
        rules: {
          nama: {
            required: true,
          },
          usia: {
            required: true,
          },
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
          nama: {
            required: 'Nama wajib diisi',
          },
          usia: {
            required: 'Kolom Usia wajib diisi',
          },
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
        submitHandler: function(form) {
          $('#send_form').html('Sending...');
          $.ajax({
            type: "POST",
            url: "<?= base_url() ?>/register",
            data: $('#reg-form').serialize(),
            dataType: "json",
            success: function (response) {
              console.log(response);
              var success = response.success;
              var error = response.error;
              if (success) {
                $('#send_form').html('Submit');
                $('#res_message').html(response.msg);
                // $('#res_message').show();
                $('#res_message').toggleClass('d-none');
                document.getElementById("reg-form").reset(); 
                setTimeout(function() {
                $('#res_message').toggleClass('d-none');
                $('#res_message').html('');
                location.href = '<?= base_url() .route_to('employee') ?>';
                }, 2500);
              } else if (error) {
                $('#send_form').html('Submit');
                $('#usernameError').text(response.msg)
              }
            },
          });
        }
      })
    })
  </script>
<?= $this->endSection() ?>