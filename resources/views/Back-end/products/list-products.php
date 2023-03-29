<?php include_once "../resources/views/Back-end/partials/header.php" ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh sách sản phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Danh sách sản phẩm</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php var_dump($products) ?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <?php if(empty($products)) { ?>
                <div>
                  <h5 style="display: flex;justify-content: center;align-items:center">Không có dữ liệu</h5>
                </div>
                <?php }else { ?>
                <h5 class="card-title">Danh sách sản phẩm</h5>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên sản phẩm</th>
                      <th style="width: 20%">Hình ảnh</th>
                      <th>Giá</th>
                      <th>Sale</th>
                      <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($products as $key => $value): ?>
                    <tr>
                      <th scope="row"><?= $key + 1 ?></th>
                      <td><?= $value->product_name ?></td>
                      <td>
                          <img src="./assets/img/<?= $value->image ?>" alt="" style="width:60%">
                      </td>
                      <td><?= number_format( $value->price, 0, '', ',') ?></td>
                      <td><?= number_format( $value->sale, 0, '', ',') ?></td>
                      <td style="text-align: center;">
                          <a href="./update-products?id=<?= $value->id ?>" class="btn btn-primary rounded-pill">Update</a>
                          <a 
                            href="./delete-products?id=<?= $value->id ?>" 
                            class="btn btn-warning rounded-pill"
                            onclick="return confirm('Bạn có chắc muốn xóa ?')"
                            >
                            Delete  
                          </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php } ?>
              <!-- Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>
    </section>

</main>
<?php include_once "../resources/views/Back-end/partials/footer.php" ?>
