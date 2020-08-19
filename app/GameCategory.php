<?php 

namespace VanguardDK;



class GameCategory extends \Illuminate\Database\Eloquent\Model {
    protected $table = "game_categories";
    protected $fillable = array( "game_id", "category_id" );
    public $timestamps = false;
}


