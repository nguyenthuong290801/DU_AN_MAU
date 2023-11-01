<form class="forms-sample px-4" action="/admin/category-update/<?= $item['id'] ?? '' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <h4 class="card-title my-3 mb-0">Thêm danh mục</h4>
            <div class="form-group">
                <label for="category_name">Tên danh mục</label>
                <input type="text" class="form-control" id="category_name" placeholder="..." name="category_name" value="<?= $item['category_name'] ?? '' ?>">
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
                <label for="type">Loại danh mục</label>
                <select name="type" id="type" class="form-control">
                    <option value="product" <?= ($item['type'] ?? '') == 'product' ? 'selected' : ''; ?>>product</option>
                    <option value="post" <?= ($item['type'] ?? '') == 'post' ? 'selected' : ''; ?>>post</option>
                </select>
            </div>
        </div>
    </div>
</form>