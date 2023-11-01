<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				GIỎ HÀNG
			</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>

		<div class="header-cart-content flex-w js-pscroll">
			<ul class="header-cart-wrapitem w-full">




				<?php
				if (isset($_SESSION['cart'])) {
					// Mảng để theo dõi các id đã xuất hiện
					$appearedIds = [];
					$_SESSION['pay'] = [];
					foreach ($_SESSION['cart'] as $key => $item) {

						foreach ($item as $key => $value) {

							if ($key == 'id') {
								$id = $value;

								// Kiểm tra xem id đã xuất hiện trước đó chưa
								if (!in_array($id, $appearedIds)) {
									// Hiển thị lần đầu tiên của id này
									echo '<li class="header-cart-item flex-w flex-t m-b-12">
										<div class="header-cart-item-img">
										<img src="../'.$item['thumbnail'].'" alt="IMG">
									</div>
										<div class=\"header-cart-item-txt p-t-8\">
												<a href="" class="header-cart-item-name m-b-18 hov-cl1 trans-04">';
									echo $item['product_name'];
									echo '</a>
												<span class="header-cart-item-info">
												1 x $19.00
												</span>
											</div>
											</li>';
									
									if(!in_array($item,$_SESSION['pay'])) {
										$_SESSION['pay'][] = $item;
									}

									$appearedIds[] = $id;
								}
							}
						}
					}
				}
				?>
			</ul>

			<div class="w-full">

				<div class="header-cart-buttons flex-w w-full">
					<a href="/cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						XEM GIỎ
					</a>

					<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
						THANH TOÁN
					</a>
				</div>
			</div>
		</div>
	</div>
</div>