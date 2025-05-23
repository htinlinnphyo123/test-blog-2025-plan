<?php

namespace BasicDashboard\Web\ContactForms\Services;

use BasicDashboard\Foundations\Domain\ContactForms\Repositories\ContactFormRepositoryInterface;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\ContactForms\Resources\ContactFormResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

/**
 *
 * A ContactFormService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class ContactFormService extends BaseController
{
    const VIEW = 'admin.contactForm';
    const ROUTE = 'contactForms';
    const LANG_PATH = "contactForm.contactForm";

    public function __construct(
        private ContactFormRepositoryInterface $contactFormRepositoryInterface,
    )
    {
    }
    public function index(array $request): View
    {
        return $this->returnView(self::VIEW.".index", [],[]);
    }

}
