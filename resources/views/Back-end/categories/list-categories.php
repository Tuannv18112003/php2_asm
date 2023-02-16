<?php include_once "../resources/views/Back-end/partials/header.php" ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh sách danh mục</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Danh sách danh mục</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <?php if(empty($categories)) { ?>
                <div>
                  <h5 style="display: flex;justify-content: center;align-items:center">Không có dữ liệu</h5>
                </div>
                <?php }else { ?>
                  <h5 class="card-title">Danh sách danh mục</h5>
    
                  <!-- Table with stripped rows -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col" style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $key => $value): ?>
                      <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value->name ?></td>
                        <td style="text-align: center;">
                          <a href="./update-categories?id=<?= $value->id ?>" class="btn btn-primary rounded-pill">Update</a>
                          <a 
                            href="./delete-categories?id=<?= $value->id ?>" 
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

            </div>
          </div>
        </div>
      </div>
    </section>

</main><!-- End #main -->
<?php include_once "../resources/views/Back-end/partials/footer.php" ?>
