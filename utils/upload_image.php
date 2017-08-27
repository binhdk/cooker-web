<?php
function upload($field, $config=array()){ 
    //cấu hình upload
    $options = array(
        'name' => '',
        'upload_path'  => './',
        'allowed_exts' => '*',
        'overwrite'    => TRUE,
        'max_size'     => 0
    );
    $options = array_merge($options, $config); 
    
    //nếu chưa upload? kết thúc
    if( !isset($_FILES[$field])) return FALSE;
    
    //file upload
    $file = $_FILES[$field];
    
    //lỗi upload? kết thúc
    if ($file['error'] != 0) return FALSE;
    
    //phần mở rộng của file
    $temp = explode(".", $file["name"]);
    $ext = end($temp);
    
    //phần mở rộng không phù hợp? kết thúc
    if ($options['allowed_exts']!='*') {
        $allowedExts = explode('|', $options['allowed_exts']);
        if ( !in_array($ext, $allowedExts)) return FALSE;
    }
    
    //kích thước quá lớn? kết thúc
    $size = $file['size'] / 1024 / 1024;
    if(($options['max_size']>0) && ($size > $options['max_size'])) return FALSE;    
    
    $name = empty($options['name']) ? $file["name"] : $options['name'].'.'.$ext;
    $file_path = $options['upload_path'].$name;

    //nếu cho phép ghi đè
    if ($options['overwrite'] && file_exists($file_path)) {
        unlink($file_path);
    }
    
    //upload file và trả về tên file
    move_uploaded_file($file["tmp_name"], $file_path);
    return $name;
}

function strU($str){
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/[^A-Za-z0-9 ]/", '', $str);
    $str = preg_replace("/\s+/", ' ', $str);
    $str = trim($str);
    return $str;
}
function alias($str){
    $str = strU($str);
    $str = strtolower($str);    
    $str = str_replace(' ', '-', $str);
    return $str;
}

 ?>