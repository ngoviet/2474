<?php
//use src/Ubench;

class TestController extends BaseController {

	protected $bench;

	public function __construct()
	{
		$this->bench = new Ubench;
	}

	/**
	 * Display a listing of the resource.
	 * GET /test
	 *
	 * @return Response
	 */
	public function index()
	{


		$this->bench->start();

		// Execute some code

		$this->bench->end();

		// Get elapsed time and memory
//		echo $bench->getTime(); // 156ms or 1.123s
//		echo $bench->getTime(true); // elapsed microtime in float
//		echo $bench->getTime(false, '%d%s'); // 156ms or 1s
//
//		echo $bench->getMemoryPeak(); // 152B or 90.00Kb or 15.23Mb
//		echo $bench->getMemoryPeak(true); // memory peak in bytes
//		echo $bench->getMemoryPeak(false, '%.3f%s'); // 152B or 90.152Kb or 15.234Mb
//
//		// Returns the memory usage at the end mark
//		echo $bench->getMemoryUsage(); // 152B or 90.00Kb or 15.23Mb
		return View::make('test/index',compact('bench'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /test/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /test
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /test/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /test/{id}/edit
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
	 * PUT /test/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /test/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}