<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

//Kiểm tra user đã đăng nhập chưa
if(!function_exists('get_data_user')){
    function get_data_user($guest,$column='id'){
        return Auth::guard($guest)->user() ? Auth::guard($guest)->user()->$column : null;
    }
}






//Lấy link ảnh
if(!function_exists('pare_url_file')){
    function pare_url_file($image,$folder =''){
       if(!$image){
           return '/images/no-image.jpg';
       }
       $explode = explode('__',$image);

       if(isset($explode[0])){
        // $date = date_parse_from_format("Y.m.d", $explode[0]);
        // $time = mktime($date['year'], $date['month'], $date['day']);
           $time = str_replace('_','/',$explode[0]);
           return '/uploads'.$folder.'/'.date('Y/m',strtotime($time)).'/'.date('d',strtotime($time)).$image;
       }
    }
}

//Xử lí load ảnh
if(!function_exists('upload_image')){
    //$file [tên file trùng tên input]
    //array $extend [định dạng file có thể upload được]
    //return array|int [tham số trả về là 1 mảng-nếu lỗi trả về int]
        function upload_image($file,$folder='',array $extend=array()){
        $code = 1;
        //lấy đường dẫn ảnh
        $baseFilename=public_path().'/uploads/'.$_FILES[$file]['name'];
        //thông tin file
        $info=new SplFileInfo($baseFilename);
        //đuôi file
        $ext=strtolower($info->getExtension());
        //Kiểm tra định dạng file
        if(!$extend){
            $extend=['png','jpg','jpeg','webp','jfij'];

        }
        if(!in_array($ext,$extend)){
            return $data['code']=0;
        }
        //Tên file mới
        $nameFile=trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
        $filename=date('Y-m-d__').\Illuminate\Support\Str::slug($nameFile).'.'.$ext;
        //Thư mục gốc để upload
        $path=public_path().'/uploads/'.date('Y/m/d');
        if($folder){
            $path=public_path().'/uploads/'.$folder.'/'.date('Y/m/d');
        }
        if(!File::exists($path)){
            mkdir($path,0777,true);
        }
        //Di chuyển file vào thư cụm uploads
        move_uploaded_file($_FILES[$file]['tmp_name'],$path.$filename);
        $data=[
            'name'=>$filename,
            'code'=>$code,
            'path'=>$path,
            'path_img'=>'uploads/'.$filename,
        ];
        return $data;

    }
}