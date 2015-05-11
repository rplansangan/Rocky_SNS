<?php namespace SNS\Libraries\Helpers;

use Illuminate\Support\Facades\Storage;

class StorageHelper {
	
	public function folder_exists($dir) {
		return Storage::exists($dir);
	}
	
	public function create($id, $folder = null) {
		if($folder == null) {
			$dir = $id . '/' . 1;
		} else {
			$dir = $id . '/' . $folder;
		}
		
		if(!$this->folder_exists($dir)) {
			Storage::makeDirectory($dir);
		}
		
		return $dir;
	}
	
	// file permission error. cause: ?
	public function store($dir, $filename, $contents) {
		return Storage::put($dir . '/' . $filename, $contents);
	}
}
