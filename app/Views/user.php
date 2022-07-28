<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
  Users
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card text-center">
            <div class="card-header">
              <h2>Data User</h2>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <thead class="thead-inverse">
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach ($users as $user) {
                        ?>
                          <tr>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->role ?></td>
                          </tr>
                        <?php
                      }
                    ?>
                  </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?= $this->endSection() ?>