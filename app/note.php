<?php

function note($len)
{
    $info = '';
    $number = '1234567890';
    for($i = 0; $i< $len;$i++){
        $info .= $number{mt_rand(0 ,9)};
    }

    return $info;

}

function Captcha_code($code)
{
    $rules = [
        'code' => 'required|captcha',
    ];

    $msg = [
        'code.required' => '验证码不能为空',
        'code.captcha' => '验证码输入错误'
    ];
    $validator = Validator::make($code, $rules, $msg);
//        $validator = Validator::make($request->all(), [

    if($validator->fails()){
        return redirect('home/index')
            ->withErrors($validator)
            ->withInput();
    }
}



