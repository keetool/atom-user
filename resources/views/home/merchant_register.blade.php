@extends("home.layout")

@section("title", "Đăng kí dùng thử")

@section("content")
{{--<div class="container">--}}
    {{--<div class="section section-components section-light">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}
                {{--<h2 style="font-weight: bold">--}}
                    {{--ĐĂNG KÍ DÙNG THỬ <br/>--}}
                    {{--KEETOOL--}}
                {{--</h2>--}}
                {{--<br/>--}}
                {{--<p>--}}
                    {{--Hơn 300 doanh nghiệp đang sử dụng KEETOOL để quản lý doanh nghiệp đào tạo của mình.--}}
                {{--</p>--}}
                {{--<p>--}}
                    {{--Nhanh tay tạo tài khoản dùng thử KEETOOL nhé--}}
                {{--</p>--}}
                {{--<div>--}}
                    {{--<img style="width: 100%" src="https://d1j8r0kxyu9tj8.cloudfront.net/files/15241275411NMVtY6XIrQ1mv2.png" alt="">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6" style="padding-top: 100px">--}}
                {{--<p>--}}
                    {{--Nếu bạn đã có tài khoản <a style="color: #c50000" href="/check-merchant">Đăng nhập tại đây</a>--}}
                {{--</p>--}}
                {{--<br>--}}
                {{--<form id="store-free-trial" method="post">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<div class="form-group label-floating">--}}
                        {{--<label class="control-label">Họ và tên</label>--}}
                        {{--<input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Ví dụ: Nguyễn Lan Anh">--}}
                    {{--</div>--}}
                    {{--<div class="form-group label-floating">--}}
                        {{--<label class="control-label">Email</label>--}}
                        {{--<input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Ví dụ: demo@keetool.com">--}}
                    {{--</div>--}}

                    {{--<div class="form-group label-floating">--}}
                        {{--<label class="control-label">Số điện thoại</label>--}}
                        {{--<input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Ví dụ: 09 04 06 8888">--}}
                    {{--</div>--}}
                    {{--<div class="form-group label-floating">--}}
                        {{--<label class="control-label">Tên doanh nghiệp</label>--}}
                        {{--<input type="text" name="merchant_name" value="{{old('merchant_name')}}" class="form-control" placeholder="Tên doanh nghiệp">--}}
                    {{--</div>--}}
                    {{--<div class="form-group label-floating">--}}
                        {{--<label class="control-label">Tên miền</label>--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" placeholder="subdomain" name="sub_domain" aria-describedby="basic-addon2">--}}
                            {{--<span class="input-group-addon" id="basic-addon2">.{{ $_SERVER['HTTP_HOST'] }}</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group label-floating">--}}
                        {{--<label class="control-label">Mật khẩu</label>--}}
                        {{--<input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Mật khẩu chứa ít nhất 8 kí tự">--}}
                    {{--</div>--}}
                    {{--<div class="form-group label-floating">--}}
                        {{--<label class="control-label">Xác nhận mật khẩu</label>--}}
                        {{--<input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Nhập lại mật khẩu">--}}
                    {{--</div>--}}

                    {{--<div id="error"></div>--}}


                    {{--<button id="submit-button" type="submit" class="btn btn-primary pull-right">--}}
                        {{--Bắt đầu dùng thử--}}
                    {{--</button>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


<style>
    .stepwizard-step p {
        margin-top: 10px;
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;
        width: 50%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }
    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
        -webkit-appearance: none !important;
        -moz-appearance:    none !important;
        appearance:         none !important;
    }

    .btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad;
    }

    a[disabled] {
        pointer-events: none;
    }
    
    .btn-primary{
        color: #fff;
    }
</style>

<div class="container" style="margin-top: 40px;">

    <div class="stepwizard offset-md-3">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle btn-default" disabled="disabled">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle btn-default" disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>

    <form role="form" action="" id="store-free-trial" method="post">
        {{csrf_field()}}
        <div class="row setup-content" id="step-1">
            <div class="col-md-6 offset-md-3">
                <div class="col-md-12">
                    <h3> Step 1</h3>
                    <div class="form-group">
                        <label class="control-label">Họ và tên</label>
                        <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="Ví dụ: Nguyễn Lan Anh" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="Ví dụ: demo@keetool.com" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số điện thoại</label>
                        <input name="phone" value="{{old('phone')}}" type="text" class="form-control" placeholder="Ví dụ: 09 04 06 8888" required/>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-md-6 offset-md-3">
                <div class="col-md-12">
                    <h3> Step 2</h3>
                    <div class="form-group">
                        <label class="control-label">Tên doanh nghiệp</label>
                        <input type="text" name="merchant_name" value="{{old('merchant_name')}}" class="form-control" placeholder="Tên doanh nghiệp" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tên miền</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="subdomain" name="sub_domain" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">.{{ $_SERVER['HTTP_HOST'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mật khẩu</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Mật khẩu chứa ít nhất 8 kí tự">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Nhập lại mật khẩu">
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-md-6 offset-md-3">
                <div class="col-md-12">
                    <h3> Step 3</h3>
                    <div id="error"></div>
                    <button class="btn btn-success btn-lg pull-right" id="submit-button" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

</div>


@endsection

@section("script")
<script>

    $(document).ready(function () {
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.attr('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        $("input").keypress(function(){
            this.classList.add("is-valid");
        })

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='password'],input[type='email']"),
                isValid = true;
            // console.log(curInputs);
            console.log(curInputs[0].value);

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (curInputs[i].value.trim() === ""){
                    // console.log(1);
                    curInputs[i].classList.add("is-invalid");
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                    break;
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });


    const id = '#store-free-trial';
    $(id).submit(function(event){
        console.log(1);
        event.preventDefault();
        // clear html error
        $("#error").html("");

        // get data from form
        const data = $(id).serializeArray();
        console.log(data);

        // convert data to upload
        const postData = {};
        data.forEach((item) => {
            postData[item.name] = item.value;
        });

        axios.post("/api/v1/auth/signup/merchant", postData)
            .then((res) => {
                // redirect user to the manage page
                window.location.href = "{{ config("app.protocol") }}" + postData["sub_domain"] + "."
                    + window.location.hostname + "/manage/login";
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

                // set errors returned by server
                $("#error").html(
                    "<div class='alert alert-danger'>" +
                        errorStr +
                    "</div>"
                );
            });
    });
</script>
@endsection
