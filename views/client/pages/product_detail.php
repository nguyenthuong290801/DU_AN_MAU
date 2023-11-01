<section class="sec-product-detail bg0 p-t-65 p-b-60" style="margin-top:50px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="../.<?= $item['thumbnail'] ?? '' ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../.<?= $item['thumbnail'] ?? '' ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="item-slick3" data-thumb="../.<?= $item['thumbnail'] ?? '' ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../.<?= $item['thumbnail'] ?? '' ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="item-slick3" data-thumb="../.<?= $item['thumbnail'] ?? '' ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../.<?= $item['thumbnail'] ?? '' ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?= $item['product_name'] ?? '' ?>
                    </h4>

                    <span class="mtext-106 cl2">
                        <?= number_format($item['sale_price'], 0, ',', '.') ?? '' ?>
                    </span>

                    <!--  -->
                    <div class="p-t-33">
                        <!-- <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="time">
                                        <option>Choose an option</option>
                                        <option>Size S</option>
                                        <option>Size M</option>
                                        <option>Size L</option>
                                        <option>Size XL</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Color
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="time">
                                        <option>Choose an option</option>
                                        <option>Red</option>
                                        <option>Blue</option>
                                        <option>White</option>
                                        <option>Grey</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div> -->

                        <div class="flex-w p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <!-- <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div> -->

                                <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" data-product-id="<?= $item['id'] ?>">
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Bình luận</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                <?= htmlspecialchars_decode($item['description']) ?? '' ?>
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68">
                                        <?php foreach ($cmt as $itemCmt) : ?>
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        <?= $itemCmt['comment_name'] ?? 'Người bí ẩn' ?>
                                                    </span>

                                                    <span class="fs-18 cl11">
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star-half"></i>
                                                    </span>
                                                </div>

                                                <p class="stext-102 cl6 ">
                                                    <hr>
                                                    <?= $itemCmt['review'] ?>
                                                    <hr>
                                                </p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Add review -->
                                    <form class="w-full" method="post" actionn="">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Thêm một bài đánh giá
                                        </h5>

                                        <p class="stext-102 cl6">
                                            Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *
                                        </p>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Đánh giá của bạn</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="name">Tên</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="comment_name">
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="email">Email</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Gửi
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        // Xử lý sự kiện click của nút "Thêm vào giỏ hàng"
        $('.js-addcart-detail').click(function(e) {
            e.preventDefault();

            // Lấy ID sản phẩm từ thuộc tính data
            var productId = $(this).data('product-id');

            // Gửi yêu cầu AJAX
            $.ajax({
                url: '/cart/' + productId, // Đường dẫn tới trang xử lý đơn hàng
                method: 'POST', // Phương thức gửi dữ liệu
                data: productId,
                success: function(data) {

                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi
                    console.error('Đã xảy ra lỗi: ' + error);
                }
            });
        });
    });
</script>