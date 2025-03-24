<?php

namespace BasicDashboard\Web\Currencies\Services;

use BasicDashboard\Foundations\Domain\Currencies\Repositories\CurrencyRepositoryInterface;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Currencies\Resources\CurrencyResource;

/**
 *
 * A CurrencyService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class CurrencyService extends BaseController
{
    const VIEW = 'admin.currency';
    const ROUTE = 'currencies';
    const LANG_PATH = "currency.currency";

    public function __construct(
        private CurrencyRepositoryInterface $currencyRepository,
    ) {}

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): View
    {
        $currencyList = $this->currencyRepository->getCurrencyList($request,null);
        $currencyList = CurrencyResource::collection($currencyList)->response()->getData(true);
        // return $this->returnView(self::VIEW .".index", $currencyList, $request);
        return $this->returnView(self::VIEW . ".index", $currencyList, $request);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        return view(self::VIEW . '.create');
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store($request): RedirectResponse
    {
        try {
            $this->currencyRepository->beginTransaction();
            $this->currencyRepository->insert($request);
            $this->currencyRepository->commit();

            return redirect()->route('countries.show', ['country' => customEncoder($request['country_id'])])->with([
                'message' => __(self::LANG_PATH . '_created'),
                'responseType' => 'success',
            ]);
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->currencyRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        $currency = $this->currencyRepository->edit($id);
        $currency = new CurrencyResource($currency);
        $currency = $currency->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . ".edit", $currency);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id): View | RedirectResponse
    {
        $currency = $this->currencyRepository->show($id);
        $currency = new CurrencyResource($currency);
        $currency = $currency->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . '.show', $currency);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update($request, string $id): RedirectResponse
    {
        try {
            $this->currencyRepository->beginTransaction();
            $this->currencyRepository->update($request, $id);
            $this->currencyRepository->commit();
            return redirect()->route('countries.show', ['country' => customEncoder($request['country_id'])])->with([
                'message' => __(self::LANG_PATH . '_updated'),
                'responseType' => 'success',
            ]);
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->currencyRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy($request): RedirectResponse
    {
        try {
            $countryId = $this->currencyRepository->show($request['id'])->country->id;
            $this->currencyRepository->beginTransaction();
            $this->currencyRepository->delete($request['id']);
            $this->currencyRepository->commit();
            return redirect()->route('countries.show', ['country' => customEncoder($countryId)])->with([
                'message' => __(self::LANG_PATH . '_deleted'),
                'responseType' => 'success',
            ]);
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->currencyRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}
