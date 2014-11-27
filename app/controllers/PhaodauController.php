<?php

class PhaodauController extends BaseController {

	public function __construct()
	    {
	        parent::__construct();
	    }
	/**
	 * Display a listing of the resource.
	 * GET /phaodau
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('site.phaodau.index');
	}

}