<?php

class AdminCustomersController extends AdminController {

	protected $customer;
	protected $city;
	protected $agency;

    public function __construct(Customer $customer, City $city, Agency  $agency)
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

        return View::make('admin.customers.index', compact('customers', 'title'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/admincustomers/create
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$title = Lang::get('admin/customers/title.customer_new');

        return View::make('customer.create_edit', compact('title'));
	}

    public function postCreate()
    {
        // Declare the rules for the form validation
        $rules = array(
            'id'      => 'required|between:1,64',
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new city
            $user = Auth::user();

            // Update the blog city data
            $this->city->title            = Input::get('title');
            $this->city->slug             = Str::slug(Input::get('title'));
            $this->city->content          = Input::get('content');
            $this->city->meta_title       = Input::get('meta-title');
            $this->city->meta_description = Input::get('meta-description');
            $this->city->meta_keywords    = Input::get('meta-keywords');
            $this->city->user_id          = $user->id;
            // Was the city created?
            if($this->city->save())
            {
                // Redirect to the new city page
                return Redirect::to('admin/cities/' . $this->city->id . '/edit')->with('success', Lang::get('admin/cities/messages.create.success'));
            }

            // Redirect to the city create page
            return Redirect::to('admin/cities/create')->with('error', Lang::get('admin/cities/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/cities/create')->withInput()->withErrors($validator);
    }

    public function getShow($customer)
    {
        if ($customer->id)
        {
            // Title
            $title = trans('admin/customers/title.customer_update');
            $cities = $this->city->all();
            $agencies = $this->agency->all();
            // Show the page
//            return array($customer,$title,$cities,$agencies);
            return View::make('admin.customers.modal',compact('customer', 'cities','agencies','title'));
        }
        else{
            return Redirect::to('admin/customers')->with('error', trans('admin/customers/messages.does_not_exist'));
        }
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param $customer
     * @return Response
     */
	public function getEdit($customer)
	{
        if( $customer->id){
            // Title
            $title = trans('admin/customers/title.customer_update');
            $cities = $this->city->all();
            $agencies = $this->agency->all();
            // Show the page
            return View::make('admin.customers.create_edit', compact('customer', 'cities', 'agencies', 'title'));
        }
        else {
            return Redirect::to('admin/customers')->with('error', trans('admin/customers/messages.does_not_exist'));
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/admincustomers/{id}
	 *
	 * @param  int  $customer
	 * @return Response
	 */
	public function postEdit($customer)
	{
            // Declare the rules for the form validation
            $rules = array(
                'id'     => 'required',
                'city_id'     => 'required',
                'agency_id'     => 'required',
                'account'   => 'required|min:3',
                'name'   => 'required',
                'address'   => 'required',
            );

            // Validate the inputs
            $validator = Validator::make(Input::all(), $rules);

            // Check if the form validates with success
            if ($validator->passes())
            {
                // Update the city data
                $customer->id           = Input::get('id');
                $customer->city_id      = Input::get('city_id');
                $customer->agency_id    = Input::get('agency_id');
                $customer->account      = Input::get('account');
                $customer->name         = Input::get('name');
                $customer->address      = Input::get('address');
                $customer->license_number      = Input::get('license_number');
                $customer->license_date_create      = Input::get('license_date_create');
                $customer->license_date_end      = Input::get('license_date_end');
                $customer->license_address_create      = Input::get('license_address_create');
                $customer->fax      = Input::get('fax');
                $customer->email      = Input::get('email');
                $customer->tax      = Input::get('tax');
                $customer->bank_number      = Input::get('bank_number');
                $customer->bank_name      = Input::get('bank_name');
                $customer->is_active      = Input::get('is_active');
                $customer->create_at      = Input::get('create_at');


                // Was the city updated?
                if($customer->save())
                {
                    // Redirect to the new city page
                    return Redirect::to('admin/customers/' . $customer->id . '/edit')->with('success', Lang::get('admin/customers/messages.update.success'));
                }

                // Redirect to the customers management page
                return Redirect::to('admin/customers/' . $customer->id . '/edit')->with('error', Lang::get('admin/customers/messages.update.error'));
            }

            // Form validation failed
            return Redirect::to('admin/customers/' . $customer->id . '/edit')->withInput()->withErrors($validator);
	}

    public function getDelete($customer)
    {
        // Title
        $title = Lang::get('admin/cities/title.city_delete');

        // Show the page
        return View::make('admin/cities/delete', compact('city', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $customer
     * @return Response
     */
    public function postDelete($customer)
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
            $id = $customer->id;
            $customer->delete();

            // Was the city deleted?
            $customer = Customer::find($id);
            if(empty($customer))
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
        $customers = Customer::select(array('customers.id', 'customers.account', 'customers.name', 'customers.address'));

        return Datatables::of($customers)

            ->add_column('actions', '<a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')

            ->make();
    }
}