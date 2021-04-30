<?php
namespace App\Models\Painel;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'number', 'active', 'category', 'descrition'
    ];
    public $rules = [
        'name' => 'required|min:3|max:100',
        'number' => 'required|numeric',
        'category' => 'required',
        'descrition' => 'required|max:1000'
    ];
}
