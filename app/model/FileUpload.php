<?php

namespace User\Uwriters\app\model;

use User\Uwriters\app\Http\Format\Generator\Rand;
use User\Uwriters\app\Http\Format\Input;
use User\Uwriters\database\Database;
use User\Uwriters\app\Http\Format\Time;
class FileUpload
{
    /**
     * @var string
     */
    public string $filename ;
    public string $path;
    public Database $database ;

    /**
     * @param Database $database
     */
    public function __construct()
    {
        $this->path = "public/";
        $this->filename = "profile";

    }

    /**
     * @return string[]
     */
    public function checkExtension()
    {
        return [
            "jpg",
            "jpeg",
            "png",
            "webp",
            "avif"
        ];
    }

    /**
     * @throws \Exception
     */
    public function make($params = [])
    {

        $imageExtension = pathinfo(
            $_FILES[
            $this->filename
            ]
            ['name'],
            PATHINFO_EXTENSION
        );


        if(in_array($imageExtension, $this->checkExtension()))
        {
            $fileName = "uwriters-" . Rand::make(5). "-post.".$imageExtension;
            $fileTemp = $_FILES[$this->filename]['tmp_name'];

            if(file_exists(dirname(__DIR__)."/../".$this->path."/".$fileName))
            {
                $fileName = str_replace(
                    '.',
                    '-',
                    basename(
                        $fileName,
                        $imageExtension
                    )
                );
                $fileName = $fileName . Rand::make(6) . $imageExtension;
            }
            if(move_uploaded_file($fileTemp, dirname(__DIR__)."/../".$this->path."/".$fileName))
            {
                return $fileName;
            }
            else
            {
                return false;
            }
        }
        else{
            echo "Accepted image format : ".Input::ImplodeComma($this->checkExtension()). " only";
        }
    }

    /**
     * @param $name
     * @return $this
     */
    public function filename($name)
    {
        $this->filename =$name;
        return $this;

    }
    public function path($name)
    {
        $this->path =$name;
        return $this;

    }

}