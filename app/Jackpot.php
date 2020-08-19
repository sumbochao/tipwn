<?php 

namespace VanguardDK;



class Jackpot extends \Illuminate\Database\Eloquent\Model {
    protected $table = "jackpots";
    protected $fillable = array( "date_time", "name", "balance", "pay_sum", "start_balance", "percent" );
    public $timestamps = false;
    public function statistics()
    {
        return $this->hasMany("VanguardDK\\JackpotStat")->orderBy("created_at", "DESC");
    }
}


