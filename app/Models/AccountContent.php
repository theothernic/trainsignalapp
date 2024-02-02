<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\Model;

    class AccountContent extends Model
    {
        use HasUuids;

        protected $table = 'accounts_content';

        protected $fillable = [
            'account_id',
            'content_id',
            'remote_id',
            'published_at'

        ];

        protected $casts = [
            'published_at' => 'datetime'
        ];


        public function account()
        {
            return $this->belongsTo(Account::class);
        }

        public function content()
        {
            return $this->belongsTo(Content::class);
        }
    }
