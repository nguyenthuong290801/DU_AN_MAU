<form class="forms-sample px-4" action="/admin/post-update/<?= $item['id'] ?? '' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <h4 class="card-title my-3 mb-0">Thêm sản phẩm</h4>
            <div class="form-group">
                <label for="post_name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="post_name" placeholder="..." name="post_name" value="<?= $item['post_name'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung sản phẩm</label>
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
                    <option value="6" <?= ($item['category_id'] ?? '') == 6 ? 'selected' : ''; ?>>Phong cách thời trang</option>
                    <option value="7" <?= ($item['category_id'] ?? '') == 7 ? 'selected' : ''; ?>>Mục đích sử dụng</option>
                    <option value="8" <?= ($item['category_id'] ?? '') == 8 ? 'selected' : ''; ?>>Thương hiệu</option>
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
        placeholder: '..........',
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