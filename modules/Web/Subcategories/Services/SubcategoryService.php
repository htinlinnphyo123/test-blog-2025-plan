<?php

namespace BasicDashboard\Web\Subcategories\Services;

use BasicDashboard\Foundations\Domain\Categories\Category;
use BasicDashboard\Foundations\Domain\Subcategories\Repositories\SubcategoryRepositoryInterface;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Subcategories\Resources\SubcategoryEditResource;
use BasicDashboard\Web\Subcategories\Resources\SubcategoryResource;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 *
 * A SubcategoryService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class SubcategoryService extends BaseController
{
    const VIEW = 'admin.subcategory';
    const ROUTE = 'subcategories';
    const LANG_PATH = "subcategory.subcategory";

    public function __construct(
        private SubcategoryRepositoryInterface $subcategoryRepository,
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): View
    {
        $subcategoryList = $this->subcategoryRepository->getSubcategoryList($request);
        $subcategoryList = SubcategoryResource::collection($subcategoryList)->response()->getData(true);
        return $this->returnView(self::VIEW . ".index", $subcategoryList, $request);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        $viewCategories = Category::all(['id','name']);
        return view(self::VIEW . '.create',compact('viewCategoriess'));
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store($request): RedirectResponse
    {
        try {
            $this->subcategoryRepository->beginTransaction();
            $this->subcategoryRepository->insert($request);
            $this->subcategoryRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_created'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->subcategoryRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        $subcategory = $this->subcategoryRepository->edit($id);
        $subcategory = new SubcategoryEditResource($subcategory);
        $subcategory = $subcategory->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . ".edit", $subcategory);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id): View | RedirectResponse
    {
        $subcategory = $this->subcategoryRepository->show($id);
        $subcategory = new SubcategoryResource($subcategory);
        $subcategory = $subcategory->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . '.show', $subcategory);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update($request, string $id): RedirectResponse
    {
        try {
            $this->subcategoryRepository->beginTransaction();
            $this->subcategoryRepository->update($request, $id);
            $this->subcategoryRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_updated'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->subcategoryRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy($request): RedirectResponse
    {
        try {
            $this->subcategoryRepository->beginTransaction();
            $this->subcategoryRepository->delete($request['id']);
            $this->subcategoryRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_deleted'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->subcategoryRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}
