<?php 

namespace VanguardDK;



class Permission extends \Illuminate\Database\Eloquent\Model {
    protected $table = "permissions";
    protected $fillable = array( "name", "display_name", "description" );
    protected $casts = array( "removable" => "boolean" );
}


