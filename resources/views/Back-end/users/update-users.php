<?php include_once "../resources/views/Back-end/partials/header.php" ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sửa thành viên</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Sửa thành viên</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sửa thành viên</h5>
              <!-- General Form Elements -->
              <form action="./update-users" method="POST" enctype="multipart/form-data">
                <input type="text" hidden required name="id" value="<?= $users->id ?>">
                <div class="row mb-3">
                  <label for="inputEmail" min="0" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" required name="email" value="<?= $users->email ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên thành viên</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="username" value="<?= $users->username ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="password" value="<?= $users->password ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Vai trò</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="role">
                    <option >Vai trò</option>
                    <option value="0" <?= $users->role === 0 ? 'selected' : '' ?>>Khách hàng</option>  
                    <option value="1" <?= $users->role === 1 ? 'selected' : '' ?>>Admin</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  <?php include_once "../resources/views/Back-end/partials/footer.php" ?>