<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85 mt-5" action="/cart" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2"></th>
                                <th class="column-3">Giá</th>
                            </tr>
                            <?php if ($_SESSION['pay']) : ?>
                                <?php foreach ($_SESSION['pay'] as $value) : ?>
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="<?= $value['thumbnail'] ?? '' ?>" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2"><?= $value['product_name'] ?? '' ?></td>
                                        <td class="column-3"><?= number_format($value['sale_price'], 0, ',', '.') ?? '' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Tổng:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                <?php
                                $num = null;
                                if (isset($_SESSION['pay'])) {
                                    
                                    foreach ($_SESSION['pay'] as $value) {
                                        $num += $value['sale_price'];
                                    }
                                    echo number_format($num, 0, ',', '.') . 'đ';
                                }
                                
                                ?>
                            <input type="hidden" name="total" value="<?= $num ?? '' ?>">
                            </span>
                        </div>
                    </div>
                    <div class=" my-2">
                        <label for="">Tên</label>
                        <input type="text" name="cart_name" class="form-control">
                    </div>
                    <div class=" my-2">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="cart_address" class="form-control">
                    </div>
                    <div class=" my-2">
                        <label for="">Email</label>
                        <input type="text" name="cart_email" class="form-control">
                    </div>
                    <div class=" my-2">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="cart_phone" class="form-control">
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mt-5">
                        Tiến hành đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>