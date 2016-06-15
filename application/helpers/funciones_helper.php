<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('format_date')) {
    function format_date() {
        $nameDay = array('Domingo', 'Lunes', 'Marte', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'S&aacute;bado');
        $nameMonth = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $day = $nameDay[date('w')];
        $month = $nameMonth[date('n') - 1];

        return $day . ', ' . date('d') . ' de ' . $month . ' del ' . date('Y');
    }
}

if (!function_exists('arrayRandomAssoc')) {
    /**
	  *	Método que permite obtener un elemento aleatorio de un array asociativo
	  */
	function arrayRandomAssoc($arr, $num = 1)
	{
		$keys = array_keys($arr);
        shuffle($keys);

        $r = array();
        for ($i = 0; $i < $num; $i++) {
            $r[$keys[$i]] = $arr[$keys[$i]];
        }
        return $r;
	}
}

if(!function_exists('send_email')) {
    function send_email($email, $subject, $message) {
        $CI =& get_instance();
        $CI->email->from('no-reply@ad-inspector.com', 'Agencia Watson');
        $CI->email->to($email);
        $CI->email->subject($subject);
        $CI->email->message($message);

        if ($CI->email->send()) {
            return TRUE;
        }

        return FALSE;
    }
}

if(!function_exists('body_email'))
{
    function body_email($name, $body)
    {
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'
            .'<html xmlns="http://www.w3.org/1999/xhtml">'
            .'<head>'
            .'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'
            .'<title>A Simple Responsive HTML Email</title>'
            .'<style type="text/css">'
            .'body {margin: 0 auto; padding: 0; min-width: 100%!important;}'
            .'img {height: auto; margin: 0 auto;}'
            .'.content {width: 100%; max-width: 600px;}'
            .'.header {padding: 40px 30px 20px 30px;}'
            .'.innerpadding {padding: 30px 30px 30px 30px;}'
            .'.innermargin {margin: 20px 0 0 0;}'
            .'.bg {background-color: #f7f7f7;}'
            .'.borderbottom {border-bottom: 1px solid #f2eeed;}'
            .'.subhead {font-size: 14px; color: #484848; font-family: Arial, sans-serif; text-align: left;}'
            .'.h1, .h2, .bodycopy {color: #484848; font-family: Arial, sans-serif;}'
            .'.h1 {font-size: 33px; line-height: 38px; font-weight: bold;}'
            .'.h2 {padding: 15px 10px 15px 10px; font-size: 18px; line-height: 20px;}'
            .'.hight {font-size: 18px}'
            .'.bodycopy {font-size: 14px; line-height: 22px; text-align: center; padding: 50px 50px 50px 50px;}'
            .'.button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}'
            .'.button a {color: #ffffff; text-decoration: none;}'
            .'.footer {padding: 20px 30px 15px 30px;}'
            .'.footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}'
            .'.footercopy a {color: #ffffff; text-decoration: underline;}'
            .'@media only screen and (max-width: 550px), screen and (max-device-width: 550px) {'
            .'body[yahoo] .hide {display: none!important;}'
            .'body[yahoo] .buttonwrapper {background-color: transparent!important;}'
            .'body[yahoo] .button {padding: 0px!important;}'
            .'body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}'
            .'body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}'
            .'body[yahoo] .bodycopy { padding: 20px 10px 20px 10px !important;}'
            .'}'
            .'@media only screen and (min-device-width: 601px) {'
            .'.content {width: 600px !important;}'
            .'.col330 {width: 330px !important;}'
            .'.col380 {width: 380px !important;}'
            .'}'
            .'</style>'
            .'</head>'
            .'<body yahoo bgcolor="#ebeef0" style="margin: 0 auto; padding: 0; min-width: 100% !important;">'
            .'<table width="100%" bgcolor="#ebeef0" border="0" cellpadding="0" cellspacing="0" align="center">'
            .'<tr>'
            .'<td>'
            .'<!--[if (gte mso 9)|(IE)]>'
            .'<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">'
            .'<tr>'
            .'<td>'
            .'<![endif]-->'
            .'<table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px;">'
            .'<tr>'
            .'<td>'
            .'<table width="100%" border="0" cellspacing="0" cellpadding="0">'
            .'<tr>'
            .'<td class="h2" style="color: #153643; font-family: sans-serif; padding: 15px 10px 15px 10px; font-size: 24px; line-height: 20px; text-align: center;" bgcolor="#ebeef0">'
            .'<img src="https://ad-inspector.com/proyectos/web/juego/assets/front/tpl_adinspector/images/logo.png" margin: 0 auto; />'
            .'</td>'
            .'</tr>'
            .'</table>'
            .'</td>'
            .'</tr>'
            .'<tr>'
            .'<td>'
            .'<table width="100%" border="0" cellspacing="0" cellpadding="0">'
            /*.'<tr>'
            .'<td class="h2 bg" style="color: #484848; font-family: Arial, sans-serif; padding: 15px 10px 15px 10px; font-size: 18px; line-height: 28px; background-color: #f7f7f7;" bgcolor="#f7f7f7">'
            .'hola, <span class="hight" style="font-size: 18px">' . $name . '</span>'
            .'</td>'
            .'</tr>'*/
            .$body
            .'</table>'
            .'</td>'
            .'</tr>'
            .'</table>'
            .'</td>'
            .'</tr>'
            .'</table>'
            .'<!--[if (gte mso 9)|(IE)]>'
            .'</td>'
            .'</tr>'
            .'</table>'
            .'<![endif]-->'
            .'</td>'
            .'</tr>'
            .'</table>'
            .'</body>'
            .'</html>';

        return $html;
    }
}