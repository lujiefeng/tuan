<?php

function mkpathA($mkpath, $mode = 0776) {
	$path_arr = explode ( '/', $mkpath );
	$path = "";
	foreach ( $path_arr as $value ) {
		if (! empty ( $value )) {
			if (empty ( $path )){
				if (strpos($value,':') >0){
					$path = $value;
				}else{
					$path = '/'.$value;
				}
			}	
			else
				$path .= '/' . $value;
			if (!file_exists ( $path ))
			{
			  @mkdir ( $path, $mode );
			} 
		}
	}
	if (file_exists ( $mkpath ))
		return true;
	return false;
}

function getFileSize($admin_name, $password, $filename) {
	if (!checkLogin($admin_name, $password))
	{
		return NULL; //login_faild
	}	
	$filename = base64_decode($filename);
	
	$size = - 1;
	$file = DIR_FS_CATALOG_IMAGES . $filename;
	$file = str_replace( "//", "/", $file );
	
	if (file_exists ( $file )) {
		$size = filesize ( $file );
		$size = $size ? $size : 0;
	}
	return $size;
}

function downloadFile($admin_name, $password, $filename) {
	if (!checkLogin($admin_name, $password))
	{
		return NULL; //login_faild
	}
	$filename = base64_decode($filename);
	
	@set_time_limit ( 0 );
	$file = DIR_FS_CATALOG_IMAGES . $filename;
	$file = str_replace( "//", "/", $file );
	if (file_exists ( $file )) {
		$handle = fopen ( $file, "rb" );
		$contents = fread ( $handle, filesize ( $file ) );
		fclose ( $handle );
		return base64_encode ( $contents );
	} else {
	}
}

function downloadFile2($admin_name, $password, $filename, $seq) {
	if (!checkLogin($admin_name, $password))
	{
		return NULL; //login_faild
	}
	$filename = base64_decode($filename);
	
	@set_time_limit ( 0 );
	$file = DIR_FS_CATALOG_IMAGES . $filename;
	$file = str_replace( "//", "/", $file );
	if (file_exists ( $file )) {
		$Block = 65536;
		$Position = $Block * ($seq - 1);
		$handle = fopen ( $file, "rb" );
		$ifilesize = filesize ( $file );
		if ($Position < $ifilesize) 
		{	
			fseek($handle, $Position);
			if ($Position + $Block > $ifilesize)
			{ 
			  $contents = fread ( $handle, $ifilesize - $Position );
			}
			else
			{
			  $contents = fread ( $handle, $Block );
			}
			return base64_encode ( $contents );
		}  
		fclose ( $handle );
		
	} else {
	}
}

function uploadFile($admin_name, $admin_pass, $filename, $data, $isFist = false) {
	if (!checkLogin($admin_name, $admin_pass))
	{
		return NULL; //login_faild
	}
	$filename = base64_decode($filename);
	@set_time_limit ( 0 );
	$file = DIR_FS_CATALOG_IMAGES . $filename;
	
	$file = str_replace( "\\", "/", $file );
	
	if (! is_dir ( $dir = dirname ( $file ) )) {
		if (mkpathA ( $dir ) == false){
			return false;
		}
	}
	
	if (($isFist) and (file_exists ( $file ))) {
		@unlink($file);
	}
	file_put_contents ( $file, $data, FILE_APPEND );
	@chmod ( $file, 420 );
	
	return true;
}

?>
