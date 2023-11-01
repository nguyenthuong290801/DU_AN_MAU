<form class="forms-sample px-4" action="/admin/attribute-create" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <div class="d-flex flex-column justify-content-between align-align-items-center mb-5" id="form-attribute">
                <div onclick="addForm()" class="btn btn-primary rounded h-50 w-25 my-3">Thêm thuộc tính</div>
                <div class="row form-attribute">
                    <div class="d-flex ">
                        <div class="mx-1">
                            <label for="">Size</label>
                            <input type="text" class="form-control" name="size">
                        </div>
                        <div class="mx-1">
                            <label for="">Color</label>
                            <input type="text" class="form-control" name="color">
                        </div>
                        <div class="mx-1">
                            <label for="">Số lượng</label>
                            <input type="text" class="form-control" name="quantity">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div>
                <button type="submit" class="btn btn-primary my-3 mb-0">Thêm</button>
            </div>
            <label for="product_id">Chọn sản phẩm</label>
            <select name="product_id" id="product_id" class="form-control">
                <?php foreach ($products as $item) : ?>
                    <option value="<?= $item['id'] ?>"> <?= $item['product_name'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>

<script>
    function addForm() {
        var formContainer = document.getElementById("form-attribute");
        var originalForm = formContainer.querySelector(".form-attribute");
        var newForm = originalForm.cloneNode(true);
        formContainer.appendChild(newForm);
    }
</script>