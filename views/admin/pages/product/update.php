<form class="forms-sample px-4" action="/admin/product-update/<?= $item['id'] ?? '' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <h4 class="card-title my-3 mb-0">Thêm sản phẩm</h4>
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product_name" placeholder="Áo thun..." name="product_name" value="<?= $item['product_name'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" class="form-control" id="price" placeholder="200000" name="price" value="<?= $item['price'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="text" class="form-control" id="sale_price" placeholder="170000" name="sale_price" value="<?= $item['sale_price'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="summernote_sub">Nội dung sản phẩm phụ</label>
                <textarea class="form-control" id="summernote_sub" name="description_sub"><?= $item['description_sub'] ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung sản phẩm chính</label>
                <textarea class="form-control" id="summernote" name="description"><?= $item['description'] ?? '' ?></textarea>
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary my-3 mb-0">Sửa</button>
            <div class="form-group">
                <label for="status">Trạng thái sản phẩm</label>
                <select name="status" id="status" class="form-control">
                    <option class="text-success" value="Đang hoạt động" <?= ($item['status'] ?? '') == 'Đang hoạt động' ? 'selected' : '' ?>>Đang hoạt động</option>
                    <option class="text-danger" value="Không hoạt động" <?= ($item['status'] ?? '') == 'Không hoạt động' ? 'selected' : '' ?>>Không hoạt động</option>
                    <option class="text-warning" value="Đang xử lý" <?= ($item['status'] ?? '') == 'Đang xử lý' ? 'selected' : '' ?>>Đang chờ xử lý</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục sản phẩm</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="1" <?= ($item['category_id'] ?? '') == 1 ? 'selected' : ''; ?>>Đồ nam</option>
                    <option value="2" <?= ($item['category_id'] ?? '') == 2 ? 'selected' : ''; ?>>Đồ nữ</option>
                    <option value="3" <?= ($item['category_id'] ?? '') == 3 ? 'selected' : ''; ?>>Túi</option>
                    <option value="4" <?= ($item['category_id'] ?? '') == 4 ? 'selected' : ''; ?>>Giày</option>
                    <option value="5" <?= ($item['category_id'] ?? '') == 5 ? 'selected' : ''; ?>>Đồng hồ</option>
                </select>

            </div>
            <div class="form-group">
                <label for="thumbnail">Hình ảnh chính</label>
                <div class="uploadOuter">
                    <label for="uploadFile" id="thumbnail" class="btn btn-primary">Upload Image</label>
                    <span class="dragBox">
                        Kéo và thả hình ảnh vào đây
                        <input type="file" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile" name="thumbnail" value="<?= $item['thumbnail'] ?? '' ?>">
                    </span>
                </div>
                <div id="preview">
                    <?php if ($item['thumbnail']) : ?>
                        <img src="../../.<?= $item['thumbnail'] ?>" alt="hinh anh">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('#summernote').summernote({
        placeholder: '...',
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    $('#summernote_sub').summernote({
        placeholder: '...',
        tabsize: 2,
        height: 100,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    "use strict";

    function dragNdrop(event) {
        var files = event.target.files;
        var preview = document.getElementById("preview");

        for (var i = 0; i < files.length; i++) {
            var fileName = URL.createObjectURL(files[i]);
            var previewImg = document.createElement("img");
            previewImg.setAttribute("src", fileName);
            previewImg.setAttribute("width", "200");
            preview.appendChild(previewImg);
        }
    }

    function drag() {
        document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
    }

    function drop() {
        document.getElementById('uploadFile').parentNode.className = 'dragBox';
    }
</script>