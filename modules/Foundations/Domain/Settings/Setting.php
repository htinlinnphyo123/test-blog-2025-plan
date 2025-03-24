<?php

namespace BasicDashboard\Foundations\Domain\Settings;
use App\Observers\AuditObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


/**
 *
 * A Setting is gives a basic way to do that using Eloquent ORM where each table incorporates to interact with it.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */
//if you want to audit this model uncomment below code and import
#[ObservedBy([AuditObserver::class])]
class Setting extends Model
{
    use HasFactory, SoftDeletes;
      //protected $table = 'table_name';
      protected $guarded = [];

}
