<?php 
namespace VanguardDK;



class Role extends \Illuminate\Database\Eloquent\Model {
    use Support\Authorization\AuthorizationRoleTrait;
    protected $table = "roles";
    protected $casts = array( "removable" => "boolean" );
    protected $fillable = array( "name", "display_name", "description" );
    public function users()
    {
        return $this->hasMany("VanguardDK\\User", "role_id");
    }
}


