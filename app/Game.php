<?php 

namespace VanguardDK;



class Game extends \Illuminate\Database\Eloquent\Model {
    protected $table = "games";
    protected $fillable = array( "name", "title", "gamebank", "percent", "garant_win", "garant_bonus", "rezerv", "winline", "winbonus", "device", "cask", "jp_1", "jp_2", "jp_3", "jp_4", "jp_5", "jp_6", "jp_7", "jp_8", "jp_9", "jp_10", "jp_1_percent", "jp_2_percent", "jp_3_percent", "jp_4_percent", "jp_5_percent", "jp_6_percent", "jp_7_percent", "jp_8_percent", "jp_9_percent", "jp_10_percent", "view", "gameline", "monitor", "bet", "scaleMode", "numFloat", "slotViewState" );
    public function game_win()
    {
        return $this->hasOne("VanguardDK\\GameWin", "game_id");
    }
    public function statistics()
    {
        return $this->hasMany("VanguardDK\\StatGame", "game", "name")->orderBy("date_time", "DESC");
    }
    public function gamereel()
    {
        return $this->hasOne("VanguardDK\\GameReel", "game_id");
    }
    public function categories()
    {
        return $this->hasMany("VanguardDK\\GameCategory", "game_id");
    }
    public function name_ico()
    {
        return explode(" ", $this->name)[0];
    }
}


