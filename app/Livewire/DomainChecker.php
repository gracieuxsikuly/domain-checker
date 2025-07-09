<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\DomainCheckerService;
class DomainChecker extends Component
{
    public $name;
    public $searchedDomain;
    public $availability;
    public $suggestions = [];

    public function check()
    {
        $this->validate([
            'name' => 'required|min:2'
        ]);

        $service = new DomainCheckerService();
        $this->searchedDomain = strtolower($this->name) . '.org';
        $this->availability = $service->checkDomain($this->searchedDomain);
        $this->suggestions = $service->checkAll($this->name);
    }

    public function render()
    {
        return view('livewire.domain-checker');
    }
}
