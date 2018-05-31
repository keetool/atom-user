@extends("home.layout")

@section("title", "Đăng kí dùng thử")

@section("content")
<div class="container">
    <div class="section section-components section-light">
        <div class="row">
            <div class="col-md-6">
                <h2 style="font-weight: bold">
                    ĐĂNG KÍ DÙNG THỬ <br/>
                    KEETOOL
                </h2>
                <br/>
                <p>
                    Hơn 300 doanh nghiệp đang sử dụng KEETOOL để quản lý doanh nghiệp đào tạo của mình.
                </p>
                <p>
                    Nhanh tay tạo tài khoản dùng thử KEETOOL nhé
                </p>
                <div>
                    <img style="width: 100%" src="http://d1j8r0kxyu9tj8.cloudfront.net/files/15241275411NMVtY6XIrQ1mv2.png" alt="">
                </div>
            </div>
            <div class="col-md-6" style="padding-top: 100px">
                <p>
                    Nếu bạn đã có tài khoản <a style="color: #c50000" href="http://manage.keetool.xyz">Đăng nhập tại đây</a>
                </p>
                <br>

                <form id="store-free-trial" method="post">
                    {{csrf_field()}}
                    <div class="form-group label-floating">
                        <label class="control-label">Họ và tên</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Ví dụ: Nguyễn Lan Anh">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Ví dụ: demo@keetool.com">
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Số điện thoại</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Ví dụ: 09 04 06 8888">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Tên doanh nghiệp</label>
                        <input type="text" name="company" value="{{old('company')}}" class="form-control" placeholder="Ví dụ: keetool">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Tên miền</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">.keetool.com</span>
                        </div>
                    </div>

                    <div id="error"></div>


                    <button id="submit-button" type="submit" class="btn btn-primary pull-right">
                        Bắt đầu dùng thử
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section("script")
<script>
    const id = '#store-free-trial';
    $(id).submit(function(event){
        event.preventDefault();
        const data = $(id).serializeArray();

        const postData = {};
        data.forEach((item) => {
            postData[item.name] = item.value;
        });
        axios.post("/api/v1/auth/signup/merchant", postData)
            .then((res) => {
                console.log(res.data);
            })
            .catch((error) => {
                let errorStr = "";
                error.response.data.forEach((s, i) => {
                    if (i == 0) {
                        errorStr = s;
                    } else {
                        errorStr += "<br/>" + s;
                    }
                });
                $("#error").html(
                    "<div class='alert alert-danger'>" +
                        errorStr +
                    "</div>"
                );
            });
    });
</script>
@endsection
