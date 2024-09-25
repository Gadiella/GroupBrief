<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitedMembers extends Model
{
  protected $table = 'invited_members';

  protected $fillable = ['email' , 'groupe_id'];

  public function group()
  {
    return $this->belongsTo(Groupe::class, 'groupe_id');
  }
}
