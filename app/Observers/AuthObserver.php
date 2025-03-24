<?php

namespace App\Observers;

use BasicDashboard\Foundations\Domain\Audits\Repositories\Eloquent\AuditRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthObserver
{
    public function __construct(private AuditRepository $auditRepository)
    {

    }

    public function AuthDetection($event)
    {
        $data = [
            'model' => null,
            'event' => $event,
            'old_data' => null,
            'new_data' => null,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ];
        $this->auditRepository->connection(true)->create($data);
    }

}
