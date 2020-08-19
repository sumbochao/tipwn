<?php 

namespace VanguardDK;



class StatGame extends \Illuminate\Database\Eloquent\Model {
    protected $table = "stat_game";
    protected $fillable = array( "date_time", "user_id", "balance", "bet", "win", "game" );
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo("VanguardDK\\User", "user_id");
    }
    public function game_item()
    {
        return $this->hasOne("VanguardDK\\Game", "name", "game");
    }
    public function name_ico()
    {
        return explode(" ", $this->game)[0];
    }
}


