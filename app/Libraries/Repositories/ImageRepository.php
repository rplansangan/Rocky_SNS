<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use SNS\Libraries\Facades\StorageHelper;

class ImageRepository {
	
	protected $image;
	
	public function __construct() {
		$this->image = new Images();
	}
	
	public function create($data) {	
		$filename = md5($data->getClientOriginalName() . Auth::user()->email_address . Carbon::now());
		$dir = StorageHelper::create(Auth::id());
		
		$img = $this->image->create([
				'user_id' => Auth::id(),
				'image_path' => $dir,
				'image_name' => $filename . $data->getClientOriginalExtension(),
				'image_mime' => $data->getMimeType(),
				'image_ext' => $data->getClientOriginalExtension()
		]);	
		$data->move(storage_path('app') . '/' . $dir, $filename . '.' . $img->image_ext);	
		
		return $img;
	}
}