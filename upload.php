<?php

$folderloc = $_GET['l'];;

//create the directory if doesn't exists (should have write permissons)
if(!is_dir("./$folderloc")) mkdir("./$folderloc", 0755); 
//move the uploaded file
move_uploaded_file($_FILES['Filedata']['tmp_name'], "./$folderloc/".$_FILES['Filedata']['name']);
chmod("./$folderlocs/".$_FILES['Filedata']['name'], 0777);
?>