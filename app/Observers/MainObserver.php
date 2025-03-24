<?php

namespace App\Observers;

use BasicDashboard\Foundations\Domain\Audits\Repositories\Eloquent\AuditRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MainObserver
{
    public function __construct(private AuditRepository $auditRepository)
    {

    }

    public function prepareDataAndSave($oldData, $newData, $event, $model)
    {
        $data = [
            'model' => $model,
            'event' => $event,
            'old_data' => $oldData ? json_encode($oldData) : null,
            'new_data' => $newData ? json_encode($newData) : null,
            'created_by' => Auth::user()->id ?? null,
            'created_at' => Carbon::now(),
        ];
        $this->auditRepository->connection(true)->create($data);
    }

}
