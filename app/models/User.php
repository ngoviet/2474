<?php

use Zizaco\Confide\Confide;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;
use Zizaco\Confide\RepositoryInterface;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
/**
 * User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $confirmation_code
 * @property string $remember_token
 * @property boolean $confirmed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereConfirmationCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereRememberToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereConfirmed($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUpdatedAt($value) 
 */
class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser, HasRole;

   /**
     * Get user by username
     * @param $username
     * @return mixed
     */
    public function getUserByUsername( $username )
    {
        return $this->where('username', '=', $username)->first();
    }

    /**
     * Get the date the user was created.
     *
     * @return string
     */
    public function joined()
    {
        return String::date(Carbon::createFromFormat('Y-n-j G:i:s', $this->created_at));
    }

    /**
     * Save roles inputted from multiselect
     * @param $inputRoles
     */
    public function saveRoles($inputRoles)
    {
        if(! empty($inputRoles)) {
            $this->roles()->sync($inputRoles);
        } else {
            $this->roles()->detach();
        }
    }

    /**
     * Returns user's current role ids only.
     * @return array|bool
     */
    public function currentRoleIds()
    {
        $roles = $this->roles;
        $roleIds = false;
        if( !empty( $roles ) ) {
            $roleIds = array();
            foreach( $roles as &$role )
            {
                $roleIds[] = $role->id;
            }
        }
        return $roleIds;
    }

    /**
     * Redirect after auth.
     * If ifValid is set to true it will redirect a logged in user.
     * @param $redirect
     * @param bool $ifValid
     * @return mixed
     */
    public static function checkAuthAndRedirect($redirect, $ifValid=false)
    {
        // Get the user information
        $user = Auth::user();
        $redirectTo = false;

        if(empty($user->id) && ! $ifValid) // Not logged in redirect, set session.
        {
            Session::put('loginRedirect', $redirect);
            $redirectTo = Redirect::to('users/login')
                ->with( 'notice', Lang::get('user/user.login_first') );
        }
        elseif(!empty($user->id) && $ifValid) // Valid user, we want to redirect.
        {
            $redirectTo = Redirect::to($redirect);
        }

        return array($user, $redirectTo);
    }

    public function currentUser()
    {
        // return (new Confide(new EloquentRepository()))->user();
        // return (new Confide(new RepositoryInterface(),new PasswordServiceInterface(),new LoginThrottleServiceInterface()))->user();
        return Auth::user();
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    
}
