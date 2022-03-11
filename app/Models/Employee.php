<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  use HasFactory;
	protected $table = "employees";
	protected $fillable = ['fullname','picture','email','address','age','phone','position'];
}
