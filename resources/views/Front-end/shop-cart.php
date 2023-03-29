<?php include_once "../resources/views/Front-end/partials/header.php" ?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($carts) && !empty($carts)) {
                                $totalCart = 0;
                                $index = 0;
                            ?>
                                <?php foreach ($carts as $key => $cart) :
                                    $totalCart += $cart['total'];
                                ?>
                                    <tr>
                                        <td><?= ++$index ?></td>
                                        <td>
                                            <span class="fw-bold"><?= $cart['product_name'] ?></span>
                                        </td>
                                        <td>
                                            <img src="assets/img/<?= $cart['image'] ?>" width="100" alt="">
                                        </td>
                                        <td class="cart__price"><?= number_format($cart['price'] - $cart['sale'], 0, '', ',') ?> VNĐ</td>
                                        <td class="cart__quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="<?= isset($cart['quantity']) ? $cart['quantity'] : '1' ?>" name="quantity">
                                            </div>
                                        </td>
                                        <td class="cart__total"><?= number_format($cart['total'], 0, '', ',') ?> VNĐ</td>
                                        <td class="cart__close">
                                            <a href="./remove-cart?id=<?= $key ?>" class="d-block">
                                                <span class="icon_close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-center">Không có sản phẩm trong giỏ hàng</h5>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="./">Tiếp tục mua sắm</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="#"><span class="icon_loading"></span>Cập nhật giỏ hàng</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Nhập mã giảm giá</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Tổng tiền giỏ hàng</h6>
                    <ul>
                        <li>Tổng thanh toán <span><?= number_format($totalCart, 0, '', ',') ?> VNĐ</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->
<?php include_once "../resources/views/Front-end/partials/footer.php" ?>