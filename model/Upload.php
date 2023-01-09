<?php
class upload
{
    public static function image()
    {
        $taget_dir = __DIR__ . '/../images/';
        $target_file = $taget_dir . basename($_FILES["gambar"]["name"]);
        $filename = $_FILES["gambar"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $hashName = md5(date('Y-m-d H:i:s') . $filename) . '.' . $imageFileType;
        $target_file = $taget_dir . $hashName;
        //check if image is a actual image or fake image
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not  an image.";
            $uploadOk = 0;
        }
        //check if file is already exists
        if (file_exists($target_file)) {
            echo "Sorry, file is already exists";
            $uploadOk = 0;
        }
        //check fiel size
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Sorry, your file is too large";
            $uploadOk = 0;
        }
        //Allow certain file formats
        if (
            $imageFileType != "jgp" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG , & GIF files are allowed.";
            $uploadOk = 0;
        }
        //check if $upoladOk is set to 0 by an error
        if($uploadOk == 0){
            return false;
            // if evrything is ok, try to upload file
        }else{
            if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)){
                return $hashName;
            }else{
                return false;
            }
        }
    }
}
