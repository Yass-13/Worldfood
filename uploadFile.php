<?php
        class uploadFile{

            function upload(array $infoFiles)
            {
                $infoFiles = current($infoFiles);

                    move_uploaded_file($infoFiles['tmp_name'], 'IMG/' . $infoFiles['name']);
                

            }

        }