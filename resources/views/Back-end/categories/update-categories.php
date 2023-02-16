<?php include_once "../resources/views/Back-end/partials/header.php" ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Cập nhật danh mục</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Cập nhật danh mục</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cập nhật danh mục</h5>

              <!-- General Form Elements -->
              <form action="./update-categories" method="POST" enctype="multipart/form-data">
                <input type="text" hidden value="<?= $categories->id ?> " name="id">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên danh mục</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" required value="<?= $categories->name  ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
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