<?php 

namespace VanguardDK;



class GameLog extends \Illuminate\Database\Eloquent\Model {
    protected $table = "game_log";
    protected $fillable = array( "time", "game_id", "user_id", "ip", "str" );
    public $timestamps = false;
}


