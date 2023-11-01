<div class="card-body px-4 py-0">
    <div class="my-3 d-flex justify-content-between">
        <h3>Danh sách lưu trữ</h3>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <input type="search" class="p-2 rounded border-0 w-100 mr-2 " placeholder="Tìm kiếm thuộc tính">
            <button class="text-nowrap bg-primary text-white p-2 rounded border-0 mr-2" id="category-product-btn">Loại: product</button>
            <button class="text-nowrap bg-primary text-white p-2 rounded border-0 mr-2" id="category-post-btn">Loại: post</button>
            <button class="text-nowrap bg-primary text-white p-2 rounded border-0 mr-2" id="select-all-btn">Chọn tất cả</button>
            <div id="delete-selected" style="display: none">
                <!-- Button trigger modal -->
                <button type="button" class="text-nowrap bg-danger text-white p-2 rounded border-0 mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa tất cả</button>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-dark text-center mb-4">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>#</th>
                    <th>Tên thuộc tính</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php if (isset($attributes)) : ?>
                    <?php foreach ($attributes as $item) : ?>
                        <tr>
                            <td><input type="checkbox" class="product-check"></td>
                            <td> <?= $i ?> </td>
                            <td class="text-secondary"> <?= $item['attribute_name'] ?? '' ?> </td>
                            <td>
                                <div class="badge <?= $item['status'] == 'Đang hoạt động' ? 'badge-outline-success' : ($item['status'] == 'Không hoạt động' ? 'badge-outline-danger' : 'badge-outline-warning') ?>">
                                    <?= $item['status'] ?? '' ?>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="d-flex align-items-center">
                                        <label class="mdi mdi-marker m-0"></label>
                                        <form action="/admin/attribute-restore/<?= $item['id'] ?? '' ?>" method="post" class="d-flex align-items-center">
                                            <button type="submit" class="bg-transparent border-0 text-danger">Khôi phục</button>
                                        </form>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label class="mdi mdi-delete m-0"></label>
                                        <button type="button" class="text-danger btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-footer flex-nowrap">
                                        <button type="button" class="btn btn-secondary w-50" data-bs-dismiss="modal">Hủy</button>
                                        <form action="/admin/attribute-destroy/<?= $item['id'] ?? '' ?>" method="post" class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-danger w-50">Xác nhận xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php
        $totalProducts = count($attributes);
        $productsPerPage = 5;
        $totalPages = ceil($totalProducts / $productsPerPage) + 1;
        function getId()
        {
            $pathInfo = $_SERVER['PATH_INFO'];
            $segments = explode('/', $pathInfo);

            // Lấy phần tử cuối cùng trong mảng
            $id = end($segments);

            // Xóa ký tự '/' nếu có
            $id = rtrim($id, '/');

            // Trả về giá trị id
            return $id;
        }

        $currentPage = getId();

        $offset = ($currentPage - 1) * $productsPerPage;
        $displayedProducts = array_slice($attributes, $offset, $productsPerPage);
        ?>

        <!-- Display the products and pagination -->

        <!-- Display the products here -->
        <?php foreach ($displayedProducts as $item) : ?>
            <!-- Display each product here -->
        <?php endforeach; ?>

        <!-- Display the pagination links -->
        <nav aria-label="Product Pagination">
            <ul class="pagination justify-content-end">

                <!-- Display previous page link -->
                <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= ($currentPage - 1) ?>" tabindex="-1" aria-disabled="true">Lùi</a>
                </li>

                <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                    <li class="page-item <?= ($currentPage == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="<?= $page ?>"><?= $page ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Display next page link -->
                <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= ($currentPage + 1) ?>">Tiến</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginate.js/0.5.7/paginate.min.js" integrity="sha512-lW+EAGiCH3STzOLsnFeZNGQCTpRdRgTApZY1bZLX7t4q0PhCGuCrwzgZkSEen63MF5ZgHvXMTRQwDi4U6QTV+w==" crossorigin="anonymous"></script>
<script>
    // Tạo sự kiện click cho nút "product-btn"
    document.getElementById('category-product-btn').addEventListener('click', function() {
        // Lấy tất cả các hàng trong bảng
        var rows = document.querySelectorAll('table tbody tr');

        // Lặp qua từng hàng
        rows.forEach(function(row) {
            // Lấy giá trị cột "Loại" trong hàng
            var type = row.querySelector('td:nth-child(4)').innerText;

            // Kiểm tra nếu loại là "product"
            if (type.trim() === 'product') {
                // Hiển thị hàng (mở khóa hiển thị)
                row.style.display = '';
            } else {
                // Ẩn hàng (không hiển thị)
                row.style.display = 'none';
            }
        });
    });

    // Tạo sự kiện click cho nút "post-btn"
    document.getElementById('category-post-btn').addEventListener('click', function() {
        // Lấy tất cả các hàng trong bảng
        var rows = document.querySelectorAll('table tbody tr');

        // Lặp qua từng hàng
        rows.forEach(function(row) {
            // Lấy giá trị cột "Loại" trong hàng
            var type = row.querySelector('td:nth-child(4)').innerText;

            // Kiểm tra nếu loại là "post"
            if (type.trim() === 'post') {
                // Hiển thị hàng (mở khóa hiển thị)
                row.style.display = '';
            } else {
                // Ẩn hàng (không hiển thị)
                row.style.display = 'none';
            }
        });
    });

    // Listen for the click event on the search button
    document.querySelector("button[type='submit']").addEventListener("click", function() {
        searchProducts();
    });

    // Listen for input event on the search input field
    document.querySelector("input[type='search']").addEventListener("input", function() {
        searchProducts();
    });

    function searchProducts() {
        var searchValue = document.querySelector("input[type='search']").value.toLowerCase(); // Get the search value

        var table = document.querySelector("table"); // Get the product table

        var rows = Array.from(table.querySelectorAll("tbody tr")); // Get all rows in the table

        rows.forEach(function(row) {
            var productName = row.querySelector("td:nth-child(3)").textContent.toLowerCase(); // Get the product name

            if (productName.includes(searchValue)) { // Check if the product name contains the search value
                row.style.display = "table-row"; // Display the product row
            } else {
                row.style.display = "none"; // Hide the product row
            }
        });
    }

    document.getElementById("select-all").addEventListener("change", function() {
        var checkboxes = document.getElementsByClassName("product-check");

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }

        showDeleteButton();
    });

    var checkboxes = document.getElementsByClassName("product-check");

    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener("change", function() {
            showDeleteButton();
        });
    }

    document.getElementById("select-all-btn").addEventListener("click", function() {
        var checkboxes = document.getElementsByClassName("product-check");

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }

        showDeleteButton();
    });

    function showDeleteButton() {
        var deleteSelected = document.getElementById("delete-selected");
        var checkboxes = document.getElementsByClassName("product-check");
        var checkedCount = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkedCount++;
            }
        }

        if (checkedCount > 0) {
            deleteSelected.style.display = "block";
        } else {
            deleteSelected.style.display = "none";
        }
    }
</script>