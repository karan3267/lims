<?php

class DocumentApproval extends Model
{
    protected $fillable = [
        'document_id',
        'user_id',
        'approved', // boolean
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
