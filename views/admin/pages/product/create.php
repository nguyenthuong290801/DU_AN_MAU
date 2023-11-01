<form class="forms-sample px-4" action="/admin/product-create" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <h4 class="card-title my-3 mb-0">Thêm sản phẩm</h4>
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control <?= $model->hasError('product_name') ? 'is-invalid' : ''; ?>" id="product_name" placeholder="Áo thun..." name="product_name">
                <input type="hidden" name="slug">  
                <div class="invalid-feedback"><?= $model->getFirstError('product_name') ?></div>
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" class="form-control <?= $model->hasError('price') ? 'is-invalid' : ''; ?>" id="price" placeholder="200000" name="price">
                <div class="invalid-feedback"><?= $model->getFirstError('price') ?></div>
            </div>
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="text" class="form-control <?= $model->hasError('sale_price') ? 'is-invalid' : ''; ?>" id="sale_price" placeholder="170000" name="sale_price">
                <div class="invalid-feedback"><?= $model->getFirstError('sale_price') ?></div>
            </div>
            <div class="form-group">
                <label for="summernote_sub">Nội dung sản phẩm phụ</label>
                <textarea class="form-control <?= $model->hasError('description_sub') ? 'is-invalid' : ''; ?>" id="summernote_sub" name="description_sub"></textarea>
                <div class="invalid-feedback"><?= $model->getFirstError('description_sub') ?></div>
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung sản phẩm chính</label>
                <textarea class="form-control <?= $model->hasError('description') ? 'is-invalid' : ''; ?>" id="summernote" name="description"></textarea>
                <div class="invalid-feedback"><?= $model->getFirstError('description') ?></div>
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary my-3 mb-0">Thêm</button>
            <div class="form-group">
                <label for="status">Trạng thái sản phẩm</label>
                <select name="status" id="status" class="form-control">
                    <option class="text-success" value="Đang hoạt động">Đang hoạt động</option>
                    <option class="text-danger" value="Không hoạt động">Không hoạt động</option>
                    <option class="text-warning" value="Đang xử lý">Đang chờ xử lý</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục sản phẩm</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="1">Đồ nam</option>
                    <option value="2">Đồ nữ</option>
                    <option value="3">Túi</option>
                    <option value="4">Giày</option>
                    <option value="5">Đồng hồ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="thumbnail">Hình ảnh chính</label>
                <div class="uploadOuter">
                    <label for="uploadFile" id="thumbnail" class="btn btn-primary">Tải hình ảnh</label>
                    <span class="dragBox">
                        Kéo và thả hình ảnh vào đây
                        <input type="file" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile" name="thumbnail">
                    </span>
                </div>
                <div id="preview"></div>
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