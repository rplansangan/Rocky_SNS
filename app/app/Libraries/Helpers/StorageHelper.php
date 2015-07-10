<?php namespace SNS\Libraries\Helpers;

use Illuminate\Support\Facades\Storage;

/**
 * 
 * @author Rap
 *
 */
class StorageHelper {
    
    private $directories;
    
    public function getSubDir() {
        switch(config('filesystems.default')) {
            case 'local':
                $full = config('local_disk_path') . '/';
                break;
                 
            default:
                break;
        }
        
        return $full;
    }
    
	public function folder_exists($dir) {	    
		return Storage::exists($dir);
	}
	
	public function create($id, $folder = null) {
	    $this->directories['root'] = $this->getSubDir();
	    
	    $this->directories['front'] = $id . '/';
	    
		if($folder == null) {
			$this->directories['front'] .= 1;
		} else {
			$this->directories['front'] .= $folder;
		}
		
		$this->directories['root'] .= $this->directories['front'];
		
		if(!$this->folder_exists($this->directories['root'])) {
			Storage::makeDirectory($this->directories['root']);
		}
		
		return $this->directories;
	}
	
	// file permission error. cause: ?
	public function store($dir, $filename, $contents) {
		return Storage::put($dir . '/' . $filename, $contents);
	}
}
