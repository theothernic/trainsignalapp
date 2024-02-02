<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Concerns\HasUlids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Content extends Model
    {
        use HasUlids, SoftDeletes;

        protected $table = 'content';

        protected $fillable = [
            'author_id',
            'title',
            'body'
        ];

        public function author()
        {
            return $this->belongsTo(User::class);
        }
    }
