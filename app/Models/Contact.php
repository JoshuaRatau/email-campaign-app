<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'contact_list_id',
        'name',
        'email',
    ];

    /* A contact belongs to one list */
    public function contactList(): BelongsTo
    {
        return $this->belongsTo(UsersContactList::class, 'contact_list_id');
    }
}