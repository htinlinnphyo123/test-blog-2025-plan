<?php

namespace BasicDashboard\Web\Dashboard\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Articles\Resources\ArticleResource;
use BasicDashboard\Foundations\Domain\Articles\Repositories\ArticleRepositoryInterface;

class DashboardService extends BaseController
{
    public function __construct(
        private ArticleRepositoryInterface $articleRepositoryInterface
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }

    protected function getOnlineUsers() : Collection
    {
        $activeUsers = $this->fetchOnlineUsers(); 
        $formatUsers = $activeUsers->each(function($user){
            $user->last_activity = $this->formatLastActivity($user->last_activity);
            $user->user_agent = $this->formatuserAgent($user->user_agent);
        });
        return $formatUsers;
    }

    /**
     * Fetch online users
     * @return \Illuminate\Support\Collection
     */
    public function fetchOnlineUsers() : Collection
    {
        return DB::table('sessions')
            ->join('users', 'sessions.user_id', '=', 'users.id')
            ->whereNotNull('sessions.user_id')
            ->select(
                'users.name',
                'sessions.last_activity',
                'sessions.user_agent',
                'sessions.ip_address'
            )
            ->distinct()
            ->limit(5)
            ->get();
    }

    protected function formatLastActivity($timestamp): string
    {
        return $timestamp ? Carbon::parse($timestamp)->diffForHumans() : null;
    }

    public function formatuserAgent(string $userAgent) : string
    {
        // Simplify user_agent (e.g., just show browser name)
        if (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'Chrome') === false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Edge') !== false) {
            return 'Edge';
        } else {
            return 'Other';
        }
    }

}