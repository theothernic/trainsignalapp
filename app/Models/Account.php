<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Account extends Model
    {
        use HasUuids, SoftDeletes;

        protected $fillable = [
            'owner_id',
            'name',
            'type',
            'token',
            'secret'
        ];

        protected $casts = [
            'token' => 'encrypted',
            'secret' => 'encrypted'
        ];

        public function owner()
        {
            return $this->belongsTo(User::class);
        }
    }
