<?php 

namespace VanguardDK;



class JackpotStat extends \Illuminate\Database\Eloquent\Model {
    protected $table = "jackpots_stat";
    protected $fillable = array( "user_id", "system", "jackpot_id", "type", "summ" );
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo("VanguardDK\\User");
    }
}


