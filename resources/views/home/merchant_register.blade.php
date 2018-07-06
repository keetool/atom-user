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
        width: 100%;
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
        background-color: #4F79F8;
        z-order: 0;
    }
    .stepwizard-step {
        width: 33.33%;
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
        color: #4F79F8;
        background-color: #fff;
        border-color: #4F79F8;
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

    .nextBtn{
        width: 100%;
    }

    #atomuser-code{
        background: #f3f3f2;
        color: #828282;
        height: 250px;
        padding: 20px;
        white-space:pre-wrap;
    }
    #atomuser-code::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #atomuser-code::-webkit-scrollbar
    {
        width: 8px;
        background-color: #F5F5F5;
    }

    #atomuser-code::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }

    .banner {
        background-color: #4F79F8;
        display: flex;
        padding: 20px 0;
    }

    .text-banner {
        margin: auto;
    }
</style>

<div class="wrapper">
    <div class="banner">
        <div class="text-banner text-center" style="color: #fff">
            <h1>Set up</h1>
            <p>Get atomuser plugin for your website within 3 steps</p>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 40px;">

    <div class="row" style="position: relative">
        <div class="stepwizard-row"></div>
        <div class="col-md-4 offset-md-4">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                        <p>Create Account</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-circle btn-default" disabled="disabled">2</a>
                        <p>Page Info</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-circle btn-default" disabled="disabled">3</a>
                        <p>Get Code</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="vue-app">
        <form role="form" action="" id="store-free-trial" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div id="error-validate">

                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-1">
                <div class="col-md-4 offset-md-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="Full Name" required/>
                        </div>
                        <div class="form-group">
                            <input name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="Email Address" required/>
                        </div>
                        <div class="form-group">
                            <input name="phone" value="{{old('phone')}}" type="text" class="form-control" placeholder="Phone Number" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Re-type Password" required>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next Step</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-md-4 offset-md-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="merchant_name" value="{{old('merchant_name')}}" class="form-control" placeholder="Page Name" />
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input v-model="subdomain" type="text" class="form-control" placeholder="Subdomain" name="sub_domain" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">.{{ $_SERVER['HTTP_HOST'] }}</span>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next Step</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-md-4 offset-md-4">
                    <div class="col-md-12">
                        <p>Copy and paste the source code bellow to your own website. We highly recommend you to put it right after body tag.</p>
                        
<pre id="atomuser-code">
&lt;div class=&quot;atomuser hide&quot; id=&quot;atomuser&quot;&gt;
    &lt;div class=&quot;atomuser-iframe&quot;&gt;
    &lt;iframe id=&quot;atomuser-iframe&quot; src=&quot;https://@{{subdomain}}.atomuser.com&quot; frameBorder=&quot;0&quot;&gt;
        &lt;/iframe&gt;
    &lt;/div&gt;
    &lt;div class=&quot;atomuser-fab&quot; id=&quot;atomuser-btn-fab&quot;&gt;
        &lt;div class=&quot;atomuser-icon&quot;&gt;
            &lt;div class=&quot;atomuser-icon-dot&quot;&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</pre>
                        <div id="error"></div>
                        <button class="btn btn-success btn-lg pull-right" style="width: 100%" id="submit-button" type="submit">Got it!</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>


@endsection

@push("scripts")
<script>
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function validateSubdomain(subdomain) {
        var re = /^[a-zA-Z0-9]{3,20}$/;
        return re.test(subdomain);
    }

    function validatePhone(phone) {
        var re = /^[0-9]+$/;
        return re.test(phone);
    }

    function validatePassword(password) {
        var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
        return re.test(password);
    }

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
                // $target.find('input:eq(0)').focus();
            }
        });

        $("input").keypress(function(){
            this.classList.remove("is-invalid");
            this.classList.add("is-valid");
            
        })

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='password'],input[type='email']"),
                isValid = true;
            // console.log(curInputs);
            // console.log(curInputs[0].value);

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                // console.log(curInputs[i].getAttribute("email"));
                if(curInputs[i].getAttribute("name") == "email"){
                    var email = curInputs[i].value.trim();
                    if(!validateEmail(email)){
                        curInputs[i].classList.add("is-invalid");
                        isValid = false;
                        $("#error-validate").html("<div class='alert alert-danger'>Email không hợp lệ</div>");
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        break;
                    }
                }
                if(curInputs[i].getAttribute("name") == "sub_domain"){
                    var subdomain = curInputs[i].value.trim();
                    if(!validateSubdomain(subdomain)){
                        curInputs[i].classList.add("is-invalid");
                        isValid = false;
                        $("#error-validate").html("<div class='alert alert-danger'>Subdomain phải từ 3-20 kí tự và không có kí tự đặc biệt</div>");
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        break;
                    }
                }
                if(curInputs[i].getAttribute("name") == "phone"){
                    var phone = curInputs[i].value.trim();
                    if(!validatePhone(phone)){
                        curInputs[i].classList.add("is-invalid");
                        isValid = false;
                        $("#error-validate").html("<div class='alert alert-danger'>Số điện thoại không hợp lệ</div>");
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        break;
                    }
                }
                if(curInputs[i].getAttribute("name") == "password_confirmation"){
                    var password = curInputs[i].value.trim();
                    var retype = curInputs[i-1].value.trim();                    
                    if(password !== retype){
                        curInputs[i].classList.add("is-invalid");
                        isValid = false;
                        $("#error-validate").html("<div class='alert alert-danger'>Mật khẩu không trùng</div>");
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        break;
                    }
                    if(!validatePassword(password)){
                        curInputs[i].classList.add("is-invalid");
                        isValid = false;
                        $("#error-validate").html("<div class='alert alert-danger'>Mật khẩu ít nhất 8 kí tự, có ít nhất 1 kí tự viết hoa và có ít nhất 1 chữ số.</div>");
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        break;
                    }
                }
                if (curInputs[i].value.trim() === ""){
                    // console.log(1);
                    
                    curInputs[i].classList.add("is-invalid");
                    isValid = false;
                    $("#error-validate").html("<div class='alert alert-danger'>Chưa nhập </div>");
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                    break;
                }
            }

            if (isValid){
                nextStepWizard.removeAttr('disabled').trigger('click');
                $("#error-validate").html("");
            }
                
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });


    const id = '#store-free-trial';
    $(id).submit(function(event){
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
                    + window.location.hostname + "/manage/signin";
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

    var app = new Vue({
        el: "#vue-app",
        data: {
            subdomain: ""
        }
    });
</script>
@endpush
