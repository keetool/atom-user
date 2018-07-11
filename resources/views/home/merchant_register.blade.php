@extends("home.layout")

@section("title", "Đăng kí dùng thử")

@section("content")

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
                        <input v-model="name" name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="Full Name" required/>
                    </div>
                    <div class="form-group">
                        <input v-model="email" name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="Email Address" required/>
                    </div>
                    <div class="form-group">
                        <input v-model="phone" name="phone" value="{{old('phone')}}" type="text" class="form-control" placeholder="Phone Number" required/>
                    </div>
                    <div class="form-group">
                        <input v-model="password" type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input v-model="password_confirmation" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next Step</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-md-4 offset-md-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <input v-model="merchant_name" type="text" name="merchant_name" value="{{old('merchant_name')}}" class="form-control" placeholder="Page Name" />
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input v-model="sub_domain" type="text" class="form-control" placeholder="Subdomain" name="sub_domain" aria-describedby="basic-addon2">
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
                    <div id="codeatom">
                        <button onclick="copyToClipboard('atomuser-code')" class="btn btn-secondary" id="clipboard"><i class="fa fa-clipboard" aria-hidden="true"></i> COPY</button>
                        @include("home.includes.code_atomuser")
                    </div>
                    <div id="error"></div>
                    <button v-on:click="storeFreeTrial()" class="btn btn-success btn-lg pull-right" style="width: 100%" id="submit-button" type="submit">Go to dashboard</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- The Copy Code Modal -->
<div class="modal fade" id="modalCopy">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
                Copy code is successfully
            </div>
        
        </div>
    </div>
</div>


@endsection

@push("scripts")
<script>
    function copyToClipboard(containerid) {
        if (document.selection) { 
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("copy"); 

        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
            console.log("Copy is successfully");
            $('#modalCopy').modal('show'); 
        }
    }

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

    var app = new Vue({
        el: "#vue-app",
        data: {
            name: "",
            email: "",
            phone: "",
            password: "",
            password_confirmation: "",
            merchant_name: "",
            sub_domain: "",
        },
        methods: {
            storeFreeTrial: function () {
                var postData = {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    merchant_name: this.merchant_name,
                    sub_domain: this.sub_domain
                }
                axios.post("/api/v1/auth/signup/merchant", postData)
                    .then((res) => {
                        // redirect user to the manage page
                        console.log(res);
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
            }
        }
    });
</script>
@endpush
