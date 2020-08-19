<?php 

namespace VanguardDK;



class Category extends \Illuminate\Database\Eloquent\Model {
    protected $table = "categories";
    protected $fillable = array( "title", "parent", "position", "href" );
    public $timestamps = false;
    public function inner()
    {
        return $this->hasMany("VanguardDK\\Category", "parent")->orderBy("position", "ASC");
    }
    public function parentOne()
    {
        return $this->hasOne("VanguardDK\\Category", "id", "parent");
    }
}


