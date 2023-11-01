<section class="bg0 p-t-104 p-b-116">
    <div class="container" style="width:500px">
        <form action="/login" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="my-1 form-control <?= $model->hasError('email') ? 'is-invalid' : ''; ?>">
                <div class="invalid-feedback"><?= $model->getFirstError('email') ?></div>
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" class="my-1 form-control <?= $model->hasError('password') ? 'is-invalid' : ''; ?>">
                <div class="invalid-feedback"><?= $model->getFirstError('password') ?></div>
            </div>
            <button class="flex-c-m stext-101 cl0 size-103 w-100 mt-5 bg1 bor1 hov-btn1 p-lr-15 trans-04" type="submit">Đăng nhập</button>
        </form>
    </div>
</section>