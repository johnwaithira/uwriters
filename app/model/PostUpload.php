<?php

namespace User\Uwriters\app\model;

use User\Uwriters\app\Http\Format\Generator\Rand;

class PostUpload
{

        public string $filename ;

        public function __construct()
        {
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
                "webp"
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
                $fileName = "uwriters-" . Rand::make(12). "-post.".$imageExtension;
                $fileTemp = $_FILES[$this->filename]['tmp_name'];

                if(file_exists(dirname(__DIR__)."/../public/posts/".$fileName))
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

                if(move_uploaded_file($fileTemp, dirname(__DIR__)."/../public/posts/".$fileName))
                {
                    return  $fileName;

                }
                else
                {
                    return "error.png";
                }
            }
            else{
                return "error.png";
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


}