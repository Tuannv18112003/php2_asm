<?php include_once "../resources/views/Front-end/partials/header.php" ?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="#"><?= $category->name ?> </a>
                        <span><?= $productDetail->product_name ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="assets/img/<?= $productDetail->image ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3><?= $productDetail->product_name ?> </h3>
                        <!-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div> -->
                        <div class="product__details__price">
                            <?=  number_format( $productDetail->price - $productDetail->sale , 0, '', ',') ?> VND
                            <span><?= $productDetail->sale > 0 ? number_format( $productDetail->price, 0, '', ',') : '' ?> VND</span></div>
                        <p><?= $productDetail->description ?> </p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        <label for="red">
                                            <input type="radio" name="color__radio" id="red" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="black">
                                            <input type="radio" name="color__radio" id="black">
                                            <span class="checkmark black-bg"></span>
                                        </label>
                                        <label for="grey">
                                            <input type="radio" name="color__radio" id="grey">
                                            <span class="checkmark grey-bg"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            <input type="radio" id="xs-btn">
                                            xs
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Bình luận (<?php print_r($countComment[0]->count); ?>)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Mô tả</h6>
                                <p><?= $productDetail->description ?> .</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <?php if(isset($_SESSION['id'])) { ?>
                                    <form action="./comment" class="form-comment" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="hidden" name="id_product" value="<?= $_GET['id'] ?>">
                                        </div>
                                        <div class="form-group__comment">
                                            <input type="text" name="comment" placeholder="Thêm bình luận.........." class="input-comment">
                                            <button  type="submit"  style="border: none;background: none;padding-top: 22px;">Bình luận</button>
                                        </div>
                                    </form>      
                                <?php } else {?> 
                                    <h5 style="text-align:center;">Bạn cần <a href="./login">Đăng nhập</a> để bình luận</h5>
                                <?php } ?>
                                <?php foreach($comments as $comment) : ?>
                                <div class="section-comments__main" style="display: flex;align-items: center;padding: 0 auto;margin: 32px 64px;">
                                    <div class="info-user">
                                        <span><?= $comment->username ?></span>
                                        <p><?= $comment->date ?></p>
                                    </div>
                                    <div class="text-comment" style="padding: 0 37px;font-size: 16px;">
                                    <?= $comment->comment ?>
                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 1 || isset( $_SESSION['id']) && $comment->userID === $_SESSION['id']) : ?>
                                    <a href="./delete-comment?id=<?= $comment->commentID ?>&idpro=<?= $_GET['id'] ?>" onclick=" return confirm('Bạn có chắc muốn xóa ?')" style="font-size: 16px; display:inline-block; padding-left:6px;">Xóa</a>
                                    <?php else: ?>
                                    <?= ""  ?>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <?php endforeach;?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <?php foreach($relatedProducts as $relatedProduct): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="assets/img/<?= $relatedProduct->image ?>">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="assets/img/<?= $relatedProduct->image ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="./product-details?id=<?= $relatedProduct->proID ?>"><?= $relatedProduct->product_name ?></a></h6>
                            <div class="product__price">
                                <?=  number_format( $relatedProduct->price - $relatedProduct->sale , 0, '', ',') ?>
                                <span><?= $relatedProduct->sale > 0 ? number_format( $relatedProduct->price, 0, '', ',') : '' ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="assets/img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="assets/img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="assets/img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="assets/img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="assets/img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="assets/img/instagram/insta-6.jpg">
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