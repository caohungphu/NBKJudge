<?php //Code by Hung Phu - Update 03/04/2020

function create_contest($backup_dir, $name_contest, $root_dir){
	$hp_file_default = $backup_dir."Default.zip";
	$hp_dir_contest = $root_dir.$name_contest;
	$zip = new ZipArchive;
	$zip -> open($hp_file_default);
	$zip->extractTo($hp_dir_contest);
	$zip->close();
}

function delete_all_in_folder($hp_path){
	$dir = $hp_path;
	$dir = new RecursiveDirectoryIterator( 
    $dir, FilesystemIterator::SKIP_DOTS); 
	$dir = new RecursiveIteratorIterator( 
    $dir,RecursiveIteratorIterator::CHILD_FIRST); 
	foreach ( $dir as $file ) {  
		$file->isDir() ?  rmdir($file) : unlink($file); 
	} 
}	

function backup_contest($contest_dir, $name_contest, $backup_dir){
	$hp_zip_name = date("[d_m_Y][h_i_s]")."[".$name_contest."].zip";
	$hp_zip_dir = $backup_dir.$hp_zip_name;
	$rootPath = realpath($contest_dir);
	$zip = new ZipArchive();
	$zip->open($hp_zip_dir, ZipArchive::CREATE | ZipArchive::OVERWRITE);
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);
	foreach ($files as $name => $file)
	{
		if (!$file->isDir())
		{
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);
			$zip->addFile($filePath, $relativePath);
		}
	}
	$zip->close();
}	

function renew_contest($backup_dir, $name_contest, $root_dir){
	$dir_contest = $root_dir.$name_contest;
	delete_all_in_folder($dir_contest);
	rmdir($dir_contest);
	$hp_file_default = $backup_dir."Default.zip";
	$hp_dir_contest = $root_dir.$name_contest;
	$zip = new ZipArchive;
	$zip -> open($hp_file_default);
	$zip->extractTo($hp_dir_contest);
	$zip->close();
}					
			
function download_file($hp_path){
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="[NBKJudge]'.basename($hp_path).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($hp_path));
    flush();
    readfile($hp_path);
    exit;
}

function download_history_file($hp_path){
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="[NBKJudge]'.basename($hp_path).'.txt"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($hp_path));
    flush();
    readfile($hp_path);
    exit;
}

function download_test_file($hp_path){
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($hp_path).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($hp_path));
    flush();
    readfile($hp_path);
    exit;
}

function zip_and_download_doc_file($hp_folder, $hp_path){
	$hp_name = basename($hp_path).".zip";
	$hp_zipped_file_path = $hp_folder.$hp_name;
	$zip = new ZipArchive();
	$zip -> open($hp_zipped_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $zip -> addFile($hp_path, basename($hp_path));
	$zip -> close();
	download_file($hp_zipped_file_path);
}

?>