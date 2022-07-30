<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table ='categories';
    protected $fillable=['name','parent_category_id','image','description','status'];

    public $timestamps=false;
	
	
	public static function categorytree(){
		
		$allcategories = category::get();
		
		$rootcat = $allcategories->whereNull('parent_category_id');
			
		self::formatTree($rootcat, $allcategories);
		 
		return $rootcat;
	}
	
	
	public static function formatTree($categories, $allcategories){
		
		
		foreach($categories as $category):
			  
			$category->children = $allcategories->where('parent_category_id',$category->id)->values();
						
			    if($category->children->isNotEmpty()){
				
				   self::formatTree($category->children, $allcategories);
			    }
			
		endforeach; 
		
	}
	

}
