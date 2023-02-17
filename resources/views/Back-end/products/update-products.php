<?php include_once "../resources/views/Back-end/partials/header.php" ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Cập nhật sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cập nhật sản phẩm</h5>

              <!-- General Form Elements -->
              <form action="./update-products" method="POST" enctype="multipart/form-data">
                <input type="text" value="<?= $product->id ?>" hidden name="id">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="product_name" value="<?= $product->product_name ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="image">
                    <img src="assets/img/<?= $product->image ?>" alt="" style="width:20%">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Giá</label>
                  <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" required name="price" value="<?= $product->price?>" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Giảm giá</label>
                  <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" required name="sale" value="<?= $product->sale?>" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" min="0" class="col-sm-2 col-form-label">Số lượng</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required name="quantity" min="0" value="<?= $product->quantity?>" >
                  </div>
                </div>
 
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" required name="description"><?= $product->product_name ?></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Loại sản phẩm</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="cate_id">
                      <?php foreach($categories as $val): ?>
                      <option value="<?= $val->id ?>" <?= $val->id === $product->cate_id ? 'selected' : '' ?>>
                        <?= $val->name ?> 
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
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