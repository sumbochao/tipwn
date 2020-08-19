<?php 
namespace VanguardDK;



class Point extends \Illuminate\Database\Eloquent\Model {
    protected $table = "points";
    protected $fillable = array( "rating", "name", "sum", "bonus", "img", "pay", "exchange", "title", "description" );
    public function exchange_rate($real = false)
    {
        $obfus_1 = explode("|", $this->exchange);
        if( $real ) 
        {
            return $obfus_1[0] / 100;
        }
        return "100:" . $obfus_1[0];
    }
    public function exchange_wager()
    {
        $obfus_1 = explode("|", $this->exchange);
        return intval($obfus_1[1]);
    }
}


