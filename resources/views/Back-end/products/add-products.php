<?php include_once "../resources/views/Back-end/partials/header.php" ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Thêm sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Thêm sản phẩm</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm sản phẩm</h5>

              <!-- General Form Elements -->
              <form action="./create-products" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="product_name">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" required name="image">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" min="0" class="col-sm-2 col-form-label">Giá</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required min="0" name="price">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" min="0" class="col-sm-2 col-form-label">Giảm giá</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required min="0" name="sale">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" min="0" class="col-sm-2 col-form-label">Số lượng</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required min="0" name="quantity">
                  </div>
                </div>
 
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" required name="description"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Loại sản phẩm</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="cate_id">
                      <option >Chọn danh mục sản phẩm</option>
                      <?php foreach($categories as $val): ?>
                      <option value="<?= $val->id ?>"><?= $val->name ?></option>
                      <?php endforeach; ?>
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