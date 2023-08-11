<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [ 'user', 'name', 'job', 'company', 'date_start', 
                            'date_end', 'salary_min', 'salary_max', 'number', 'sex', 
                            'position', 'location', 'exp', 'requirements', 'des', 
                            'benefit', 'access', 'public' ];
    public $timestamps = false;
    protected function fullTextWildcards($term)
    {
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);
        
        $words = explode(' ', $term);
        
        foreach ($words as $key => $word) {

            if (strlen($word) >= 1) {
                $words[$key] = '+' . $word  . '*';
            }
        }
        
        $searchTerm = implode(' ', $words);
        
        return $searchTerm;
    }
    
    public function scopeFullTextSearch($query, $columns, $term)
    {
        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));
        
        return $query;
    }
}
