<?php
namespace BasicDashboard\Foundations\Domain\Notifications\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;
use BasicDashboard\Foundations\Domain\Notifications\Notification;
use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;

/**
 *
 * A NotificationRepositoryInterface is declaration of methods inside of Repository.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

interface NotificationRepositoryInterface extends BaseRepositoryInterface
{
    public function filterNotification(array $params): Builder | Notification;
    public function getNotificationList($param) : LengthAwarePaginator;
    public function getPopUpNotification() : String;

}
