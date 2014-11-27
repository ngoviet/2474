<?php

class AdminCitiesController extends AdminController {

    protected $city;

    public function __construct(City $city)
    {
        parent::__construct();
        $this->city = $city;
    }

	/**
	 * Display a listing of the resource.
	 * GET /admin/admincities
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $title = trans('admin/cities/title.city_management');

        $cities = $this->city;

        return View::make('admin.cities.index',compact('cities', 'title'));
	}

    /**
     * Display a listing of the resource.
     * GET /admin/admincities
     *
     * @return Response
     */
    public function getIndex1()
    {
        $title = trans('admin/cities/title.city_management');

        $cities = $this->city;

        return View::make('admin.cities.index1',compact('cities', 'title'));
    }

    /**
     * Display a listing of the resource.
     * GET /admin/admincities
     *
     * @return Response
     */
    public function getIndex2()
    {
        $title = trans('admin/cities/title.city_management');

        $cities = $this->city;

        return View::make('admin.cities.index2',compact('cities', 'title'));
    }

    public function getCreate()
    {
        // Title
        $title = Lang::get('admin/cities/title.city_create');

        // Show the page
        return View::make('admin/cities/create_edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        // Declare the rules for the form validation
	    $rules = array(
//		    'id'     => 'required|integer|unique:cities',
		    'name'   => 'required|unique:cities|min:3',
		    'code'   => 'required|alpha|unique:cities|size:3'
	    );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {

            // Update the blog city data
//            $this->city->id               = Input::get('id');
            $this->city->name             = Input::get('name');
            $this->city->code             = Input::get('code');

            // Was the city created?
            if($this->city->save())
            {
                // Redirect to the new city page
                return Redirect::to('admin/cities/' . $this->city->id . '/edit')->with('success', Lang::get('admin/cities/messages.create.success'));
            }

            // Redirect to the city create page
            return Redirect::to('admin/cities/create')->with('error', trans('admin/cities/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/cities/create')->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param $city
     * @return Response
     */
    public function getShow($city)
    {
        // Title
        $title = trans('admin/cities/title.city_update');

        // Show the page
//        return compact('city', 'title');
        return View::make('admin.cities.modal', compact('city','title'));
//        return array($city,$title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $city
     * @return Response
     */
    public function getEdit($city)
    {
        // Title
        $title = trans('admin/cities/title.city_update');

        // Show the page
        return View::make('admin/cities/create_edit', compact('city', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $city
     * @return Response
     */
    public function postEdit($city)
    {

        // Declare the rules for the form validation
        $rules = array(
	        'id'     => 'required|integer',
	        'name'   => 'required|min:3',
	        'code'   => 'required|alpha|size:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the city data
            $city->id           = Input::get('id');
            $city->name         = Input::get('name');
            $city->code         = Input::get('code');


            // Was the city updated?
            if($city->save())
            {
                // Redirect to the new city page
                return Redirect::to('admin/cities/' . $city->id . '/edit')->with('success', trans('admin/cities/messages.update.success'));
            }

            // Redirect to the cities management page
            return Redirect::to('admin/cities/' . $city->id . '/edit')->with('error', trans('admin/cities/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/cities/' . $city->id . '/edit')->withInput()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $city
     * @return Response
     */
    public function getDelete($city)
    {
        // Title
        $title = Lang::get('admin/cities/title.city_delete');

        // Show the page
        return View::make('admin/cities/delete', compact('city', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $city
     * @return Response
     */
    public function postDelete($city)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $city->id;
            $city->delete();

            // Was the city deleted?
            $city = City::find($id);
            if(empty($city))
            {
                // Redirect to the cities management page
                return Redirect::to('admin/cities')->with('success', Lang::get('admin/cities/messages.delete.success'));
            }
        }
        // There was a problem deleting the city
        return Redirect::to('admin/cities')->with('error', Lang::get('admin/cities/messages.delete.error'));
    }

    public function getData()
    {
        $cities = City::select(array('cities.id', 'cities.name', 'cities.code'));

        return Datatables::of($cities)

//            ->add_column('actions', '<a href="{{{ URL::to(\'admin/cities/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
//                <a href="{{{ URL::to(\'admin/cities/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
//            ')
//            ->add_column('actions', '<a href="{{{ URL::to(\'admin/cities/\' . $id . \'/show\' ) }}}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#cityModal">Modal</a>')

            ->add_column('actions', '<a class="btn btn-primary btn-xs md-trigger" data-modal="cityModal" data-id="{{{$id}}}">Chi tiết</a>')
//                ->add_column('actions', '<a class="btn btn-default btn-xs md-trigger" data-modal="cityModal">Modal</a>')
            ->make();
    }

    public function getData1()
    {
        $cities = DB::table('cities')->select('id','name','code')->get();
        return $cities;
    }

    public function getDatajson($id){
        $cities = DB::table('cities')->where('id','=',$id)->get();
        return $cities;
    }

    public function getDataById($id){
        return City::find($id);
    }

    public function postUpdatecity()
    {
        $id = Input::get('id');
        $name = Input::get('name');
        $code = Input::get('code');

        City::where('id','=',$id)->update(
            array('name' => $name, 'code' => $code));
    }

    public function getCities($city){
//        $cities = $this->city;
        return compact('city');
    }
}