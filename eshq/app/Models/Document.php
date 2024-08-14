<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Document extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'version',
        'status', // draft, approved, rejected
        'created_by',
        'approved_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approvals()
    {
        return $this->hasMany(DocumentApproval::class);
    }
}