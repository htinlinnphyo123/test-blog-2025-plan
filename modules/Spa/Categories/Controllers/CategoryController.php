<?php

namespace BasicDashboard\Spa\Categories\Controllers;

use BasicDashboard\Mobile\Categories\Validation\CategoryDetailRequest;
use BasicDashboard\Spa\Common\BaseSpaController;
use BasicDashboard\Spa\Categories\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



/**
 *
 * A CategoryController is responsible for receive request and return response.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class CategoryController extends BaseSpaController
{
    public function __construct(
        private CategoryService $categoryService
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(Request $request): JsonResponse
    {
        return $this->categoryService->index($request->all());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////


    public function detail(CategoryDetailRequest $request): JsonResponse
    {
        return $this->categoryService->show($request->id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function getFooterStickyNotification() : JsonResponse
    {
        return $this->categoryService->getFooterStickyNotification();
    }



}
