<?php

class Customer extends Eloquent {

	protected $table = "customers";
	public $timestamps = false;

	public function delete()
	{
		$this->customer->delete();
	}

	public function city()
	{
		return $this->belongsTo('City');
	}
}