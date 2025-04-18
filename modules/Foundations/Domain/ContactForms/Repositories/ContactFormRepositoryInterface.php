<?php
namespace BasicDashboard\Foundations\Domain\ContactForms\Repositories;

use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use BasicDashboard\Foundations\Domain\ContactForms\ContactForm;


/**
 *
 * A ContactFormRepositoryInterface is declaration of methods inside of Repository.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

interface ContactFormRepositoryInterface extends BaseRepositoryInterface
{
    public function filterContactForm(array $params): Builder | ContactForm;
    public function getContactFormList($params): LengthAwarePaginator;
}