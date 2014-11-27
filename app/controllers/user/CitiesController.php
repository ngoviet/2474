<?php

class CitiesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Lấy danh sách thành phố
		return Response::json(City::get());
//        return View::make('site.cities.index');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		City::create(array(
			'name' => Input::get('name'),
			'code' => Input::get('code')
		));

		return Response::json(array('success' => true));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'id' => 'required',
			'name' => 'required|min:5',
			'code' => 'required|alpha|size:3',
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			$city = City::find($id);
			$city->id	= Input::get('id');
			$city->name	= Input::get('name');
			$city->code	= Input::get('code');
			$city->save();
			Session::flash('', 'Cập nhật thành công');
			return Response::json(array('success' => true));
		} else {
			Session::flash('Lỗi', 'Kiểm tra dữ liệu');
		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
