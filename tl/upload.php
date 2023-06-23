<?php
//create the directory if doesn't exists (should have write permissons)
//if(!is_dir("./concursos")) mkdir("./concursos", 0755); 
//move the uploaded file
move_uploaded_file($_FILES['Filedata']['tmp_name'], "concursos/".$_FILES['Filedata']['name']);
chmod("concursos/".$_FILES['Filedata']['name'], 0777);
?>