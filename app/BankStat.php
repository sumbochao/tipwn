<?php 

namespace VanguardDK;



class BankStat extends \Illuminate\Database\Eloquent\Model {
    protected $table = "bank_stat";
    protected $fillable = array( "name", "user_id", "type", "sum", "old", "new", "room_id" );
    public function user()
    {
        return $this->belongsTo("VanguardDK\\User", "user_id");
    }
}


