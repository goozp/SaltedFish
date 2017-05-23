<?php

$to = "411214120@qq.com";
        $subject = '您在 guoziBlog 的留言有了回应';
        $message = '123guoz郭总';
        header("content-type:text/html;charset=utf-8");
        ini_set("magic_quotes_runtime",0);
        require 'class.phpmailer.php';
        try {
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->CharSet='UTF-8';
            $mail->SMTPAuth = true;
          
            //$mail->Port = 25;
       
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->Host = 'smtp.mxhichina.com';//邮箱smtp地址
            $mail->Username = 'gzp@gzpblog.com';//你的邮箱账号
            $mail->Password = 'max12369874000..';//你的邮箱密码
            $mail->From = $mail->Username;//你的邮箱账号
            $mail->FromName = '锅子博客';
            $to = $to;
            $mail->AddAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->WordWrap = 80;
            //$mail->AddAttachment("f:/test.png"); //可以添加附件
            $mail->IsHTML(true);
            $mail->Send();
        } catch (phpmailerException $e) {
             echo "邮件发送失败：".$e->errorMessage(); //测试的时候可以去掉此行的注释
        }
