<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersContactList extends Model
{
    use HasFactory;

    /** Tell Eloquent to use the original table */
    protected $table = 'contact_lists';

    protected $fillable = ['name'];

    /* One list has many contacts */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'contact_list_id');
    }

    /* One list has many campaigns */
    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaign::class, 'contact_list_id');
    }
}