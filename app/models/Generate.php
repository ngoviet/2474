<?php

class Generate extends Eloquent {
	public function delete()
	{
		$this->customer()->delete();
	}
}