<?php

/**
 * Convert the language keyword to the corresponding text
 * @param key
 * @return text
 */
function lang_key_to_text($key)
{
    $dict = [
        "form.error.name.required" => "Bạn vui lòng nhập họ và tên",
        "form.error.phone.required" => "Bạn vui lòng nhập số điện thoại",
        "form.error.email.required" => "Bạn vui lòng nhập email",
        "form.error.password.required" => "Bạn vui lòng nhập mật khẩu",
        "form.error.password.confirmed" => "Mật khẩu không khớp",
        "form.error.merchant_name.required" => "Bạn vui lòng nhập tên công ty",
        "form.error.sub_domain.required" => "Bạn vui lòng nhập sub domain",
        "form.error.password_confirmation.required" => "Bạn vui lòng xác nhận mật khẩu",
        "form.error.password.min" => "Mật khẩu phải có ít nhất 8 kí tự",
        "form.error.password.regex" => "Mật khẩu phải có ít nhất 1 số, 1 chữ viết thường, 1 chữ viết hoa",

    ];
    if (array_key_exists($key, $dict))
        return $dict[$key];
    return "undefined";
}
