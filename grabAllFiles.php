<?php

$folderLocation = $_POST['fileLoc'];

function get_files ($folder, $include_subs = FALSE) {
	// Remove any trailing slash
	if(substr($folder, -1) == '/') {
		$folder = substr($folder, 0, -1);
	}
	
	// Make sure a valid folder was passed
	if(!file_exists($folder) || !is_dir($folder) || !is_readable($folder)) {
		return FALSE;
		exit();
	}

	// Grab a file handle
	$all_files = FALSE;
	if($handle = opendir($folder))	{
		$all_files = array();
		// Start looping through a folder contents
		while ($file = @readdir ($handle)) { 
			// Set the full path
			$path = $folder.'/'.$file;
			
			// Filter out this and parent folder
			if($file != '.' && $file != '..') {
				// Test for a file or a folder
				if(is_file($path)) {
					$all_files[] = $path;
				} elseif (is_dir($path) && $include_subs) {
					// Get the subfolder files
					$subfolder_files = get_files ($path, TRUE);
					
					// Anything returned
					if ($subfolder_files) {
						$all_files = array_merge($all_files, $subfolder_files);
					}
				}
			}
		}
		// Cleanup
		closedir($handle);
	}
	// Return the file array
	@sort($all_files);
	return $all_files;
}

$allFiles = get_files($folderLocation, FALSE);
$numFiles = sizeof($allFiles);
print "numFiles=$numFiles";
for($n=0;$n<$numFiles;$n++){
print "&file$n=$allFiles[$n]";
}
?>