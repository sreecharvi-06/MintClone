<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable=['name','email','password'];

    public function accounts(){ return $this->hasMany(Account::class); }
    public function transactions()
{
    return $this->hasMany(Transaction::class);
}

    public function budgets(){ return $this->hasMany(Budget::class); }
    public function bills(){ return $this->hasMany(Bill::class); }
    public function goals(){ return $this->hasMany(Goal::class); }
}
