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
    public $errorMessage;

    public function check()
    {
        $this->reset(['searchedDomain', 'availability', 'suggestions', 'errorMessage']);

        $this->validate([
            'name' => 'required|min:2'
        ]);

        $service = new DomainCheckerService();

        try {
            if (str_contains($this->name, '.')) {
                [$base, $ext] = explode('.', strtolower($this->name), 2);
                $this->searchedDomain = $base . '.' . $ext;
                $this->availability = $service->checkDomain($this->searchedDomain);
                $this->suggestions = $service->checkAll($base, $ext);
            } else {
                $this->searchedDomain = strtolower($this->name) . '.com';
                $this->availability = $service->checkDomain($this->searchedDomain);
                $this->suggestions = $service->checkAll($this->name);
            }
        } catch (\Exception $e) {
            $this->availability = null; // annule l'affichage
            $this->errorMessage = $e->getMessage();
        }
    }



    public function render()
    {
        return view('livewire.domain-checker');
    }
}
