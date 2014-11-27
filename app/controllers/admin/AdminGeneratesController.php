<?php

class AdminGeneratesController extends AdminController {

	protected $customer;
    protected $city;
    protected $agency;

    public function __construct(Customer $customer, City $city, Agency $agency)
    {
        parent::__construct();
        $this->customer = $customer;
        $this->city = $city;
        $this->agency = $agency;
    }


	public function getIndex()
	{
        $title = "Danh sách khách hàng";

        $customers = $this->customer;
        $cities = $this->city->all();
        $agencies = $this->agency->all();

        return View::make('admin.generates.index', compact('customers', 'cities', 'agencies', 'title'));
	}

	public function getData()
    {
        $customers = Customer::select(array('customers.id', 'customers.account', 'customers.name', 'customers.address'));

        return Datatables::of($customers)

//            ->add_column('actions', '<a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
//                <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
//            ')
//            ->add_column('actions', '<a href="{{{ URL::to(\'admin/customers/\' .$id . \'/edit\') }}}" class="btn btn-primary btn-xs iframe">{{{ trans(\'button.detail\') }}}</a>')
            ->add_column('actions', '<a class="btn btn-default" data-toggle="modal" data-target="#modal" href="{{{ URL::to(\'admin/customers/\' .$id. \'/show\') }}}">Modal</a>')
            ->make();
    }

	public function getDatajson($id)
	{
//		$customers = Customer::select(array('customers.id', 'customers.account', 'customers.name', 'customers.address'));
		$customers = DB::table('customers as cu')
            ->join('cities as ci', 'cu.city_id', '=', 'ci.id')
            ->join('agencies as ag', 'cu.agency_id', '=', 'ag.id')
            ->select('ci.*', 'cu.id', 'ag.id as agency_id', 'ci.id as city_id', 'cu.account','cu.name','cu.address', 'cu.license_number', 'cu.license_date_create', 'cu.license_date_end', 'cu.license_address_create', 'cu.phone', 'cu.fax', 'cu.email', 'cu.tax', 'cu.bank_number', 'cu.bank_name', 'cu.is_active', 'cu.create_at')
            ->where('cu.id', '=', $id)
            ->get();
		return $customers;

	}

	public function getDatabyid($id){
		$data = Customer::find($id);
		return $data;
	}
}