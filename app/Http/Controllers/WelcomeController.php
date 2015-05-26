<?php namespace SNS\Http\Controllers;
use SNS\Models\FoundPets;
use SNS\Models\LostFoundPetImages;
use Illuminate\Http\Request;
use SNS\Libraries\Facades\StorageHelper;
use Carbon\Carbon;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{	
		return view('pages.landing');
	}

	public function signup()
	{
		return view('pages.mainpage');
	}

	public function layoutOne()
	{
		return view('pages.loland');
	}
	public function addmissingpet(Request $request){
		$input = array_except($request->all(), array('_token'));

		$fp = new FoundPets;
		if(Auth::check()){
			$fp->is_guest = 0;
			$fp->user_id = Auth::id();
		}else{
			$fp->is_guest = 1;
			$fp->user_id = 0;
		}
		$fp->rocky_tag_no = $input['rocky_tag_no'];
		$fp->found_in_remark = $input['found_in_remark'];
		$fp->finder_name = $input['finder_name'];
		$fp->rocky_tag_no = $input['rocky_tag_no'];
		$fp->finder_address1 = $input['finder_address1'];
		$fp->finder_tel_no = $input['finder_tel_no'];
		$fp->save();

		$file = $request->file('myfile');

		if(Auth::check()){
			foreach($file as $single) {
				$dir = StorageHelper::create(Auth::id());
				$filename = md5($single->getClientOriginalName() . Carbon::now());
				$image = new LostFoundPetImages([
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $single->getMimeType(),
						'image_ext' => $single->getClientOriginalExtension()
						]);
				$fp->image()->save($image);
				$single->move(storage_path('app') . '/' . $dir, $filename . '.' . $image->image_ext);
			}	
		}else{
			foreach($file as $single) {
				$dir = StorageHelper::create(0);
				$filename = md5($single->getClientOriginalName() . Carbon::now());
				$image = new LostFoundPetImages([
						'image_path' => $dir,
						'image_name' => $filename,
						'image_mime' => $single->getMimeType(),
						'image_ext' => $single->getClientOriginalExtension()
						]);
				$fp->image()->save($image);
				$single->move(storage_path('app') . '/' . $dir, $filename . '.' . $image->image_ext);
			}	
		}
		
		return redirect()->back()->withErrors(['message' => 'Thank you for reporting a missing pet']);
	}	
}
