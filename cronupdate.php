<?php
	// Thx, https://stackoverflow.com/questions/9835492/move-all-files-and-folders-in-a-folder-to-another
	function rcopy($src, $dst) {
		if (is_dir ( $src )) {
			mkdir ( $dst );
			$files = scandir ( $src );
			foreach ( $files as $file )
				if ($file != "." && $file != "..")
					rcopy ( "$src/$file", "$dst/$file" );
		} else if (file_exists ( $src ))
			copy ( $src, $dst );
	}

	if(file_get_contents("https://raw.githubusercontent.com/prochazkaml/CoachiumCached/master/timestamp") != file_get_contents("timestamp")) {
		$f = file_put_contents(__DIR__ . "/latest.zip", file_get_contents("https://github.com/prochazkaml/CoachiumCached/archive/refs/heads/master.zip"), LOCK_EX);

		if(!$f)
    		die("Download or write permission error.");
			
		$zip = new ZipArchive;
		$res = $zip->open(__DIR__ . "/latest.zip");
		
		if($res) {
			$zip->extractTo(__DIR__ . "/");
			$zip->close();
		} else {
			die("Extract error.");
		}

		rcopy(__DIR__ . "/CoachiumCached-master", __DIR__ . "/");

		echo("Updated.");
	}
?>
