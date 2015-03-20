<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/uploads'; // Relative to the root
if($_GET['table']=='thumbs') $targetFolder='/images/thumbs';
if($_GET['table']=='partners') $targetFolder='/images/partners';
if($_GET['table']=='slider') $targetFolder='/images/slider';
if($_GET['table']=='slider_header') $targetFolder='/images/slider_header';
if($_GET['table']=='') $targetFolder='/images';
$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','doc','docx','pdf','psd','ai','txt','rtf','mov','mpeg4','mp3'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo $_FILES['Filedata']['name'];
		redirect();
	} else {
		echo 'Invalid file type.';
	}
}
?>