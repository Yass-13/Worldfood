<?php
        class uploadFile{

            function upload($tmp_name,$name)
            {
                move_uploaded_file($tmp_name, 'IMGuploaded/'.date("m.d.y"). $name);
            }
        }