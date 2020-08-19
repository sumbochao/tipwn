<?php 
namespace VanguardDK;



class Payment extends \Illuminate\Database\Eloquent\Model {
    protected $table = "payments";
    protected $fillable = array( "user_id", "summ", "status", "system" );
    public $timestamps = false;
}


