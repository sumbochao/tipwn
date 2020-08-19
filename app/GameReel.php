<?php 

namespace VanguardDK;



class GameReel extends \Illuminate\Database\Eloquent\Model {
    protected $table = "gamereel";
    protected $fillable = array( "game_id", "reelStrip1", "reelStrip2", "reelStrip3", "reelStrip4", "reelStrip5", "reelStrip6", "reelStripBonus1", "reelStripBonus2", "reelStripBonus3", "reelStripBonus4", "reelStripBonus5", "reelStripBonus6" );
    public $timestamps = false;
}


