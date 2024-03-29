<?php
/**
 * Mở composer.json
 * Thêm vào trong "autoload" chuỗi sau
 * "files" : [
 *  	"app/function/function.php"
 *	]
 * Chạy cmd composer dumpautoload
 */

function utf8convert($str) {
    if(!$str) return false;
    $utf8 = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ|Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
    return $str;
}
function utf8tourl($text){
    $text = strtolower(utf8convert($text));
    $text = str_replace( "ß", "ss", $text);
    $text = str_replace( "%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----","-",$text);
    $text = str_replace("---","-",$text);
    $text = str_replace("--","-",$text);
    return $text;
}
/*
KHOA PHAM
*/
function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
    $str=trim($str);
    if ($str=="") return "";
    $str =str_replace('"','',$str);
    $str =str_replace("'",'',$str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,$case,'utf-8');
    $str = preg_replace('/[\W|_]+/',$strSymbol,$str);
    return $str;
}
function stripUnicode($str){
    if(!$str) return '';
    //$str = str_replace($a, $b, $str);
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
        'ae'=>'ǽ',
        'AE'=>'Ǽ',
        'c'=>'ć|ç|ĉ|ċ|č',
        'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
        'd'=>'đ|ď',
        'D'=>'Đ|Ď',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
        'f'=>'ƒ',
        'F'=>'',
        'g'=>'ĝ|ğ|ġ|ģ',
        'G'=>'Ĝ|Ğ|Ġ|Ģ',
        'h'=>'ĥ|ħ',
        'H'=>'Ĥ|Ħ',
        'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
        'ij'=>'ĳ',
        'IJ'=>'Ĳ',
        'j'=>'ĵ',
        'J'=>'Ĵ',
        'k'=>'ķ',
        'K'=>'Ķ',
        'l'=>'ĺ|ļ|ľ|ŀ|ł',
        'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
        'Oe'=>'œ',
        'OE'=>'Œ',
        'n'=>'ñ|ń|ņ|ň|ŉ',
        'N'=>'Ñ|Ń|Ņ|Ň',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
        's'=>'ŕ|ŗ|ř',
        'R'=>'Ŕ|Ŗ|Ř',
        's'=>'ß|ſ|ś|ŝ|ş|š',
        'S'=>'Ś|Ŝ|Ş|Š',
        't'=>'ţ|ť|ŧ',
        'T'=>'Ţ|Ť|Ŧ',
        'w'=>'ŵ',
        'W'=>'Ŵ',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
        'z'=>'ź|ż|ž',
        'Z'=>'Ź|Ż|Ž'
    );
    foreach($unicode as $khongdau=>$codau) {
        $arr=explode("|",$codau);
        $str = str_replace($arr,$khongdau,$str);
    }
    return $str;
}
function dateTimeFormat($str)
{
    $arr = explode(" ", $str);
    $date_format = date('d/m/Y',strtotime($arr[0]));
    $time = 'Ngày '.$date_format.' vào lúc '.$arr[1];
    return $time;
}
function getWeekDay()
{
    $weekday = strtolower(date('l'));
    switch ($weekday) {
        case 'monday':
            return 'Thứ Hai';
            break;
        case 'tuesday':
            return 'Thứ Ba';
            break;
        case 'wednesday':
            return 'Thứ Tư';
            break;
        case 'thursday':
            return 'Thứ Năm';
            break;
        case 'friday':
            return 'Thứ Sáu';
            break;
        case 'saturday':
            return 'Thứ Bảy';
            break;
        default:
            return 'Chủ Nhật';
            break;
    }
}
function keywordHighlight($keyword,$str)
{
    return str_replace($keyword, '<mark style="background:#ff0;">'.$keyword.'</mark>', $str);
}
?>