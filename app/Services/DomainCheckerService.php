<?php
namespace App\Services;

use App\Models\Extension;
use Iodev\Whois\Factory;

class DomainCheckerService
{
    protected $whois;

    public function __construct()
    {
        $this->whois = Factory::get()->createWhois();
    }

    public function checkDomain($domain)
    {
        return $this->whois->loadDomainInfo($domain) === null;
    }

    public function checkAll($name)
    {
        $results = [];

        $extensions = Extension::all();
        foreach ($extensions as $ext) {
            $domain = strtolower($name) . "." . $ext->extension;
            $available = $this->checkDomain($domain);
            $results[] = [
                'domain' => $domain,
                'available' => $available,
                'price' => $ext->prix,
                'old_price' => $ext->old_price,
                'currency' => $ext->currency,
            ];
        }

        return $results;
    }
}
