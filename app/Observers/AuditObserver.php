<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class AuditObserver extends MainObserver
{
    const CREATE = "Create Event";
    const UPDATE = "Update Event";
    const DELETE = "Delete Event";

    public function created(Model $model): void
    {
        $oldData = null;
        $auditModel = get_class($model);
        $updateData = $model->toArray();
        $this->removeTimeStamp($updateData);
        $this->prepareDataAndSave($oldData, $updateData, self::CREATE, $auditModel);
    }

    public function updated(Model $model): void
    {
        $auditModel = get_class($model);
        $oldData = $model->getOriginal();
        $updateData = $model->toArray();
        $this->removeTimeStamp($oldData);
        $this->removeTimeStamp($updateData);
        $this->prepareDataAndSave($oldData, $updateData, self::UPDATE, $auditModel);
    }

    public function deleted(Model $model): void
    {
        $auditModel = get_class($model);
        $oldData = $model->getOriginal();
        $auditModel = get_class($model);
        $updateData = null;
        $this->removeTimeStamp($oldData);
        $this->prepareDataAndSave($oldData, $updateData, self::DELETE, $auditModel);
    }

    public function removeTimeStamp(array &$array): void
    {
        if (array_key_exists('password', $array)) {
            unset($array['password']);
        }
        if (array_key_exists('remember_token', $array)) {
            unset($array['remember_token']);
        }
        if (array_key_exists('created_at', $array)) {
            unset($array['created_at']);
        }
        if (array_key_exists('updated_at', $array)) {
            unset($array['updated_at']);
        }
        if (array_key_exists('deleted_at', $array)) {
            unset($array['deleted_at']);
        }
        if (array_key_exists('deleted_by', $array)) {
            unset($array['deleted_by']);
        }
        if (array_key_exists('updated_by', $array)) {
            unset($array['updated_by']);
        }
        if (array_key_exists('created_by', $array)) {
            unset($array['created_by']);
        }
    }

}
