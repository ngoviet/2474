<?php

class City extends Eloquent {

	protected $table = "cities";
    public $timestamps = false;
    protected $fillable = array('name','code');

    public function delete()
    {
        $this->city()->delete();

        return parent::delete();
    }

    public function customers()
    {
        return $this->hasMany('Customer');
    }
}