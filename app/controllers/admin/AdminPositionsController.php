<?php

class AdminPositionsController extends AdminController {

    protected $position;

    public function __construct(Position $position) {
        parent::__construct();
        $this->position = $position;
    }

    public function getIndex(){
        $title = "Chức danh";
        $positions = $this->position;
        return View::make('admin.positions.index', compact('positions', 'title'));
    }

    public function getShow($position) {
        $title = "Chi tiết";

        return View::make('admin.positions.show', compact('title'));
    }

    public function getData()
    {
        $positions = Position::select(array('positions.id', 'positions.name'));

        return Datatables::of($positions)

            ->add_column('actions', '<a href="{{{ URL::to(\'admin/positions/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/positions/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')

            ->make();
    }

}