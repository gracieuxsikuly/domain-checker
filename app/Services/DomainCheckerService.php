<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Extension;
use Illuminate\Support\Facades\Cache;
use Iodev\Whois\Exceptions\WhoisException;
use Iodev\Whois\Factory;

class DomainCheckerService
{
    protected $apiKey;
 protected $whois;

    public function __construct()
    {
        $this->whois = Factory::get()->createWhois();
    }

     public function checkDomain($domain)
    {
        try {
            $info = $this->whois->loadDomainInfo($domain);

        if ($info === null) {
            return [
                'available' => true,
                'registered_at' => null
            ];
        }

        return [
            'available' => false,
            'registered_at' => $info->getCreationDate() // retourne un timestamp
        ];
    } catch (WhoisException $e) {
        // Exception liée au WHOIS
       throw new \Exception("Cette extension de domaine n'est pas prise en charge. Veuillez essayer avec une autre comme .com, .net, .org, etc.");

    } catch (\Throwable $e) {
        // Toutes autres exceptions (ex : erreur réseau, mauvais format, etc.)
       throw new \Exception("Problème technique lors de la vérification. Veuillez réessayer dans quelques instants ou changer de domaine.");
    }
    }
    public function checkAll($name, $excludedExt = null)
    {
        $results = [];
       $extensions = Extension::all();
      foreach ($extensions as $ext) {
        if ($excludedExt && strtolower($ext->extension) === strtolower($excludedExt)) {
            continue; // Ignore l'extension déjà saisie
        }
        $domain = strtolower($name) . '.' . $ext->extension;
        $available = $this->checkDomain($domain);

        $results[] = [
            'domain' => $domain,
            'available' => $available['available'], 
            'price' => $ext->prix,
            'old_price' => $ext->old_price,
            'currency' => $ext->currency,
        ];
    }

        return $results;
    }
}
