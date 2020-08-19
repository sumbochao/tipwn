<?php 

namespace VanguardDK;



class GameWin extends \Illuminate\Database\Eloquent\Model {
    protected $table = "game_win";
    protected $fillable = array( "game_id", "winline", "winbonus" );
    public $timestamps = false;
}


