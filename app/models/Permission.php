<?php

use Zizaco\Entrust\EntrustPermission;

/**
 * Permission
 *
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\Permission whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Permission whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Permission whereDisplayName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Permission whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Permission whereUpdatedAt($value) 
 */
class Permission extends EntrustPermission
{
	public function preparePermissionsForDisplay($permissions)
    {
        // Get all the available permissions
        $availablePermissions = $this->all()->toArray();

        foreach($permissions as &$permission) {
            array_walk($availablePermissions, function(&$value) use(&$permission){
                if($permission->name == $value['name']) {
                    $value['checked'] = true;
                }
            });
        }
        return $availablePermissions;
    }

    /**
     * Convert from input array to savable array.
     * @param $permissions
     * @return array
     */
    public function preparePermissionsForSave( $permissions )
    {
        $availablePermissions = $this->all()->toArray();
        $preparedPermissions = array();
        foreach( $permissions as $permission => $value )
        {
            // If checkbox is selected
            if( $value == '1' )
            {
                // If permission exists
                array_walk($availablePermissions, function(&$value) use($permission, &$preparedPermissions){
                    if($permission == (int)$value['id']) {
                        $preparedPermissions[] = $permission;
                    }
                });
            }
        }
        return $preparedPermissions;
    }
}