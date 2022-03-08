<?php
// CLASSE PERMETTANT DE CHARGER UNE NOUVELLE IMAGE
        class uploadFile{

            function upload(array $infoFiles)
            {
                
                $infoFiles = current($infoFiles);
                //ICI ON INDIQUE A L'IMAGE CHARGé LE CHEMIN VERS SON DOSSIER
                    move_uploaded_file($infoFiles['tmp_name'], 'IMG/' . $infoFiles['name']);
                

            }

        }