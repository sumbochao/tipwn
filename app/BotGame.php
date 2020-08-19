<?php 

namespace VanguardDK;



class BotGame extends \Illuminate\Database\Eloquent\Model {
    protected $table = "bots_games";
    protected $fillable = array( "game_id", "login", "bet", "win", "date_time" );
    public $timestamps = false;
    public function game()
    {
        return $this->hasOne("VanguardDK\\Game", "id", "game_id");
    }
}


