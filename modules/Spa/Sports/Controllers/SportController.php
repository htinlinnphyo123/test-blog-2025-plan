<?php

namespace BasicDashboard\Spa\Sports\Controllers;

use BasicDashboard\Spa\Common\BaseSpaController;
use BasicDashboard\Spa\Sports\Services\SportService;
use BasicDashboard\Spa\Sports\Validation\IndexSportRequest;
use BasicDashboard\Spa\Sports\Validation\ShowSportRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



/**
 *
 * A SportController is responsible for receive request and return response.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class SportController extends BaseSpaController
{
    public function __construct(
        private SportService $sportService
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(IndexSportRequest $request): JsonResponse
    {
        return $this->sportService->index($request->all());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////


    public function detail(ShowSportRequest $request): JsonResponse
    {
        return $this->sportService->show($request->slug);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

}
