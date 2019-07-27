<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Book extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'books';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['title','author','author_id','author_bio', 'title_slug','isbn13',
    'isbn10','price','format','publisher','pubdate','edition','lexile','subjects','pages',
        'dimensions','overview','synopsis','excerpt','toc','editorial_reviews'];
    // protected $hidden = [];
     protected $dates = ['pubdate'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function author(){
        return $this->belongsTo('App\Models\Author');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category','book_category','book_id','category_id');
    }
    public function subcategories(){
        return $this->belongsToMany('App\Models\Subcategory','book_category','book_id','subcategory_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
