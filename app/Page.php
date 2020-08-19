<?php 

namespace VanguardDK;



class Page extends \Illuminate\Database\Eloquent\Model {
    protected $table = "pages";
    protected $fillable = array( "title", "sub_title", "keywords", "description", "body", "path", "type", "view" );
    public $timestamps = false;
}


