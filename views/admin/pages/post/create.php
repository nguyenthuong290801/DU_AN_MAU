<form class="forms-sample px-4" action="/admin/post-create" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <h4 class="card-title my-3 mb-0">Thêm bài viết</h4>
            <div class="form-group">
                <label for="post_name">Tên bài viết</label>
                <input type="text" class="form-control" id="post_name" placeholder="..." name="post_name">
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung bài viết</label>
                <textarea class="form-control" id="summernote" name="description"></textarea>
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
                <label for="category_id">Danh mục bài viết</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="6">Phong cách thời trang</option>
                    <option value="7">Mục đích sử dụng</option>
                    <option value="8">Thương hiệu</option>
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