<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaign extends Model
{
    use HasFactory;

    protected $table = 'campaigns';

    protected $fillable = [
        'title',
        'body',
        'contact_list_id',
    ];

    /* A campaign belongs to one list */
    public function contactList(): BelongsTo
    {
        return $this->belongsTo(UsersContactList::class, 'contact_list_id');
    }
}
