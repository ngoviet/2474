<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//print App::environment();
//print csrf_token();
/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('comment', 'Comment');
Route::model('post', 'Post');
Route::model('role', 'Role');
Route::model('city', 'City');
Route::model('customer', 'Customer');
Route::model('positions', 'Positions');
Route::model('agencies', 'Agencies');
Route::model('staffs', 'Staffs');
Route::model('contacts', 'Contacts');
Route::model('contracts', 'Contracts');
Route::model('contractTypes', 'ContractTypes');
Route::model('contractMaterials', 'ContractMaterials');
Route::model('contractServices', 'ContractServices');
Route::model('servicePackages', 'ServicePackages');
Route::model('generates', 'Generates');

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('comment', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');
Route::pattern('city', '[0-9]+');
Route::pattern('customer', '[0-9]+');
Route::pattern('position', '[0-9]+');
Route::pattern('agency', '[0-9]+');
Route::pattern('staff', '[0-9]+');
Route::pattern('contact', '[0-9]+');
Route::pattern('contract', '[0-9]+');
Route::pattern('contractType', '[0-9]+');
Route::pattern('contractMaterial', '[0-9]+');
Route::pattern('contractService', '[0-9]+');
Route::pattern('servicePackage', '[0-9]+');
Route::pattern('generate', '[0-9]+');





Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{


    # Comment Management
     Route::get('comments/{comment}/edit','AdminCommentsController@getEdit');
     Route::post('comments/{comment}/edit','AdminCommentsController@postEdit');
     Route::get('comments/{comment}/delete','AdminCommentsController@getDelete');
     Route::post('comments/{comment}/delete','AdminCommentsController@postDelete');
     Route::controller('comments','AdminCommentsController');

     # Blog Management
     Route::get('infos/{post}/show', 'AdminInfosController@getShow');
     Route::get('infos/{post}/edit', 'AdminInfosController@getEdit');
     Route::post('infos/{post}/edit', 'AdminInfosController@postEdit');
     Route::get('infos/{post}/delete', 'AdminInfosController@getDelete');
     Route::post('infos/{post}/delete', 'AdminInfosController@postDelete');
     Route::controller('infos', 'AdminInfosController');

    # User Management
     Route::get('users/{user}/show', 'AdminUsersController@getShow');
     Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
     Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
     Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
     Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
     Route::controller('users', 'AdminUsersController');

     # User Role Management
     Route::get('roles/{role}/show', 'AdminRolesController@getShow');
     Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
     Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
     Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
     Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
     Route::controller('roles', 'AdminRolesController');

    # City Manager
//	Route::post('cities/update-city', 'AdminCitiesController@postUpdateCity');
	Route::get('cities/{city}/index', 'AdminCitiesController@getIndex');
	Route::get('cities/{city}/index1', 'AdminCitiesController@getIndex1');
	Route::get('cities/{city}/index2', 'AdminCitiesController@getIndex2');
	Route::get('cities/{city}/show', 'AdminCitiesController@getShow');
	Route::post('cities/{city}/show', 'AdminCitiesController@postShow');
	Route::get('cities/{city}/edit', 'AdminCitiesController@getEdit');
	Route::post('cities/{city}/edit', 'AdminCitiesController@postEdit');
	Route::get('cities/{city}/create', 'AdminCitiesController@getCreate');
	Route::post('cities/{city}/create', 'AdminCitiesController@postCreate');
	Route::get('cities/{city}/delete', 'AdminCitiesController@getDelete');
	Route::post('cities/{city}/delete', 'AdminCitiesController@postDelete');
	Route::controller('cities', 'AdminCitiesController');

	# Customer Manager
    Route::get('customers/{customer}/index', 'AdminCustomersController@index');
	Route::get('customers/{customer}/show', 'AdminCustomersController@getShow');
    Route::get('customers/{customer}/edit', 'AdminCustomersController@getEdit');
    Route::post('customers/{customer}/edit', 'AdminCustomersController@postEdit');
    Route::get('customers/{customer}/delete', 'AdminCustomersController@getDelete');
    Route::post('customers/{customer}/delete', 'AdminCustomersController@postDelete');
    Route::controller('customers', 'AdminCustomersController');

	# Position Manager
	Route::get('positions/{position}/show', 'AdminPositionsController@getShow');
//	Route::get('positions/{position}/edit', 'AdminPositionsController@getEdit');
//	Route::post('positions/{position}/edit', 'AdminPositionsController@postEdit');
//	Route::get('positions/{position}/delete', 'AdminPositionsController@getDelete');
//	Route::post('positions/{position}/delete', 'AdminPositionsController@postDelete');
	Route::controller('positions', 'AdminPositionsController');

	# Agency Manager
	Route::get('agencies/{agency}/show', 'AdminAgenciesController@getShow');
	Route::get('agencies/{agency}/edit', 'AdminAgenciesController@getEdit');
	Route::post('agencies/{agency}/edit', 'AdminAgenciesController@postEdit');
	Route::get('agencies/{agency}/delete', 'AdminAgenciesController@getDelete');
	Route::post('agencies/{agency}/delete', 'AdminAgenciesController@postDelete');
	Route::controller('agencies', 'AdminAgenciesController');

	# Staff Manager
	Route::get('staffs/{staff}/show', 'AdminStaffsController@getShow');
	Route::get('staffs/{staff}/edit', 'AdminStaffsController@getEdit');
	Route::post('staffs/{staff}/edit', 'AdminStaffsController@postEdit');
	Route::get('staffs/{staff}/delete', 'AdminStaffsController@getDelete');
	Route::post('staffs/{staff}/delete', 'AdminStaffsController@postDelete');
	Route::controller('staffs', 'AdminStaffsController');

	# Contact Manager
	Route::get('contacts/{contact}/show', 'AdminContactsController@getShow');
	Route::get('contacts/{contact}/edit', 'AdminContactsController@getEdit');
	Route::post('contacts/{contact}/edit', 'AdminContactsController@postEdit');
	Route::get('contacts/{contact}/delete', 'AdminContactsController@getDelete');
	Route::post('contacts/{contact}/delete', 'AdminContactsController@postDelete');
	Route::controller('contacts', 'AdminContactsController');

	# Contract Manager
	Route::get('contracts/{contract}/show', 'AdminContractsController@getShow');
	Route::get('contracts/{contract}/edit', 'AdminContractsController@getEdit');
	Route::post('contracts/{contract}/edit', 'AdminContractsController@postEdit');
	Route::get('contracts/{contract}/delete', 'AdminContractsController@getDelete');
	Route::post('contracts/{contract}/delete', 'AdminContractsController@postDelete');
	Route::controller('contracts', 'AdminContractsController');

	# Contract Type Manager
	Route::get('contractTypes/{contractType}/show', 'AdminContractTypesController@getShow');
	Route::get('contractTypes/{contractType}/edit', 'AdminContractTypesController@getEdit');
	Route::post('contractTypes/{contractType}/edit', 'AdminContractTypesController@postEdit');
	Route::get('contractTypes/{contractType}/delete', 'AdminContractTypesController@getDelete');
	Route::post('contractTypes/{contractType}/delete', 'AdminContractTypesController@postDelete');
	Route::controller('contractTypes', 'AdminContractTypesController');

	# Contract Material Manager
	Route::get('contractMaterials/{contractMaterial}/show', 'AdminContractMaterialsController@getShow');
	Route::get('contractMaterials/{contractMaterial}/edit', 'AdminContractMaterialsController@getEdit');
	Route::post('contractMaterials/{contractMaterial}/edit', 'AdminContractMaterialsController@postEdit');
	Route::get('contractMaterials/{contractMaterial}/delete', 'AdminContractMaterialsController@getDelete');
	Route::post('contractMaterials/{contractMaterial}/delete', 'AdminContractMaterialsController@postDelete');
	Route::controller('contractMaterials', 'AdminContractMaterialsController');

	# Contract Service Manager
	Route::get('contractServices/{contractService}/show', 'AdminContractServicesController@getShow');
	Route::get('contractServices/{contractService}/edit', 'AdminContractServicesController@getEdit');
	Route::post('contractServices/{contractService}/edit', 'AdminContractServicesController@postEdit');
	Route::get('contractServices/{contractService}/delete', 'AdminContractServicesController@getDelete');
	Route::post('contractServices/{contractService}/delete', 'AdminContractServicesController@postDelete');
	Route::controller('contractServices', 'AdminContractServicesController');

	# Service Package Manager
	Route::get('servicePackages/{servicePackage}/show', 'AdminServicePackagesController@getShow');
	Route::get('servicePackages/{servicePackage}/edit', 'AdminServicePackagesController@getEdit');
	Route::post('servicePackages/{servicePackage}/edit', 'AdminServicePackagesController@postEdit');
	Route::get('servicePackages/{servicePackage}/delete', 'AdminServicePackagesController@getDelete');
	Route::post('servicePackages/{servicePackage}/delete', 'AdminServicePackagesController@postDelete');
	Route::controller('servicePackages', 'AdminServicePackagesController');

	# Generate Manager

	Route::get('generates/{generate}/index', 'AdminGeneratesController@index');
//	Route::get('generates/{generate}/edit', 'AdminGeneratesController@getEdit');
//	Route::post('generates/{generate}/edit', 'AdminGeneratesController@postEdit');
//	Route::get('generates/{generate}/delete', 'AdminGeneratesController@getDelete');
//	Route::post('generates/{generate}/delete', 'AdminGeneratesController@postDelete');
	Route::controller('generates', 'AdminGeneratesController');

    // # Admin Dashboard
     Route::controller('/', 'AdminDashboardController');
});

Route::group( array('before' => 'auth'), function()
{
	Route::group(array('prefix' => 'api'), function(){
		Route::resource('cities', 'CitiesController'
//			,
//			array('except' => array('create', 'edit'))
		);
	});

	Route::get('/', array('before' => 'detectLang','uses'=>'InfoController@getIndex'));



//	Route::get('test', 'TestController@index');
	Route::get('test', function(){
		return View::make('site.test.index');
	});



    Route::get('cities', function(){
        return View::make('site.cities.index');
    });

    Route::get('city', function(){
        return View::make('site.city.index');
    });

    Route::get('phaodau', function(){
        return View::make('site.phaodau.index');
    });

    Route::get('{postSlug}','InfoController@getView');
    Route::post('{postSlug}','InfoController@postView');
});


// Confide routes
Route::get('user/create', 'UserController@create');
Route::post('user', 'UserController@store');
Route::get('user/index', 'UserController@Index');
Route::post('user/{user}/edit','UserController@doEdit');
Route::get('user/login', 'UserController@login');
Route::post('user/login', 'UserController@doLogin');
Route::get('user/confirm/{code}', 'UserController@confirm');
Route::get('user/forgot_password', 'UserController@forgotPassword');
Route::post('user/forgot_password', 'UserController@doForgotPassword');
Route::get('user/reset_password/{token}', 'UserController@resetPassword');
Route::post('user/reset_password', 'UserController@doResetPassword');
Route::get('user/logout', 'UserController@logout');


Route::get('cpu/show', function(){
	$free = shell_exec('free');
	$free = (string)trim($free);
	$free_arr = explode("\n", $free);
	$mem = explode(" ", $free_arr[1]);
	$mem = array_filter($mem);
	$mem = array_merge($mem);
	$memory_usage = $mem[2]/$mem[1]*100;

	return $memory_usage;
});



Route::get('cpu/ram1', function($decimals = 2){
	$result = 0;
	if (function_exists('memory_get_usage'))
	{
		$result = memory_get_usage() / 1024;
	}
	else
	{
		if (function_exists('exec'))
		{
			$output = array();
			if (substr(strtoupper(PHP_OS), 0, 3) == 'WIN')
			{
				exec('tasklist /FI "PID eq ' . getmypid() . '" /FO LIST', $output);
				$result = preg_replace('/[\D]/', '', $output[5]);
			}
			else
			{
				exec('ps -eo%mem,rss,pid | grep ' . getmypid(), $output);
				$output = explode('  ', $output[0]);
				$result = $output[1];
			}
		}
	}
	return number_format(intval($result) / 1024, $decimals, '.', '');
});

Route::get('cpu/ram', function($decimals = 1){
	$result = 0;

	if (function_exists('memory_get_usage'))
	{
		$result = memory_get_usage() / 1024;
	}

	else
	{
		if (function_exists('exec'))
		{
			$output = array();

			if (substr(strtoupper(PHP_OS), 0, 3) == 'WIN')
			{
				exec('tasklist /FI "PID eq ' . getmypid() . '" /FO LIST', $output);

				$result = preg_replace('/[\D]/', '', $output[5]);
			}

			else
			{
				exec('ps -eo%mem,rss,pid | grep ' . getmypid(), $output);

				$output = explode('  ', $output[0]);

				$result = $output[1];
			}
		}
	}

	return number_format(intval($result) / 1024, $decimals, '.', '');
});
//Route::post('abc/language', array(
//    'before'    => 'csrf',
//    'as' => 'language-chooser',
//    'uses' => 'LanguageController@chooser'
//));

Route::get('abc/test', function(){
    return View::make('abc.test');
});

Route::get('abc/ajax', function(){
	return View::make('abc.ajax');
});

//Route::get('/', array('as'=>'home', function(){
//    return 'Xin chào';
//}));

//Route::get('/', function(){
//    return 'Xin chào';
//});