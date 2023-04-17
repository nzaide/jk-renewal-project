<?php

namespace App\View\Components\Modals\JobOffer\Search;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Domain extends Component
{
    /**
     * Domains.
     *
     * @var Collection
     */
    public $domains;

    /**
     * Modal ID.
     *
     * @var string
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($domains, $id)
    {
        $this->domains = $domains;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.job-offer.search.domain');
    }
}
