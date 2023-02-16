<?php include_once "../resources/views/Back-end/partials/header.php" ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Thêm thành viên</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Thêm thành viên</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm thành viên</h5>

              <!-- General Form Elements -->
              <form action="./add-users" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputEmail" min="0" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" required min="0" name="email">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên thành viên</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="username">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="password">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Vai trò</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="role">
                    <option >Vai trò</option>
                    <option value="0">Khách hàng</option>  
                    <option value="1">Admin</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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