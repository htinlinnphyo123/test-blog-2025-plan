<?php

namespace BasicDashboard\Spa\ContactForm\Services;

use Exception;
use Illuminate\Http\JsonResponse;
use BasicDashboard\Spa\Common\BaseSpaController;
use BasicDashboard\Spa\ContactForm\Resources\ContactFormResource;
use BasicDashboard\Foundations\Domain\ContactForms\Repositories\ContactFormRepositoryInterface;

/**
 *
 * A ContactFormService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class ContactFormService extends BaseSpaController
{

    public function __construct(
        private ContactFormRepositoryInterface $contactFormRepositoryInterface,
    )
    {
    }

    public function store(array $params): JsonResponse
    {
        try {
            $contactForm = $this->contactFormRepositoryInterface->insert($params);
            return response()->json([
                'status' => true,
                'message' => 'Contact Form Created Successfully',
                'data' => $contactForm
            ], 201);
        }catch (Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(), 
            ]);
        }
    }

}
