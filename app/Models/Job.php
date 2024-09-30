<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    public function employer():BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag(String $name):void
    {
        $tag = Tag::firstorCreate(['name'=>$name]);
        $this->tags()->attach($tag); //attach() is used to insert new records into a pivot table
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
        /**
         * create pivot table (create_job_tag_table: i.e 1 job can have many tags/(tag_ids))
         * php artisan make:migration create_job_tag_table
         */
    }
}
