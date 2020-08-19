<?php 

namespace VanguardDK;



class Transaction extends \Illuminate\Database\Eloquent\Model {
    protected $table = "transactions";
    protected $fillable = array( "user_id", "payeer_id", "system", "type", "summ", "status" );
    public function admin()
    {
        return $this->hasOne("VanguardDK\\User", "id", "payeer_id");
    }
    public function user()
    {
        return $this->hasOne("VanguardDK\\User", "id", "user_id");
    }
}


