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
    // public function __construct()
    // {
    //     // Mets ta vraie clé ici
    //     $this->apiKey ="at_LXhHecolDmeWI128AOITbHX3T3Cto";
    //     //  env('WHOISXML_API_KEY');
    // }

     public function checkDomain($domain)
    {
        try {
        return $this->whois->loadDomainInfo($domain) === null;
    } catch (WhoisException $e) {
        // Exception liée au WHOIS
        throw new \Exception("Erreur WHOIS : domaine non pris en charge ou indisponible.");
    } catch (\Throwable $e) {
        // Toutes autres exceptions (ex : erreur réseau, mauvais format, etc.)
        throw new \Exception("Erreur lors de la vérification du domaine.");
    }
        // // On crée une clé unique pour ce domaine
        // $cacheKey = 'domain_check_' . $domain;

        // // Si le résultat est déjà en cache → on le retourne directement
        // if (Cache::has($cacheKey)) {
        //     return Cache::get($cacheKey);
        // }
        // try {
        //     // Requête API WHOISXML
        //     $response = Http::timeout(5)->get('https://www.whoisxmlapi.com/whoisserver/WhoisService', [
        //         'domainName' => $domain,
        //         'apiKey' => $this->apiKey,
        //     ]);
        //     $data = $response->json();
        //     // On vérifie si le domaine est disponible
        //     $available = isset($data['WhoisRecord']['dataError']) && $data['WhoisRecord']['dataError'] === 'MISSING_WHOIS_DATA';

        //     // On stocke le résultat dans le cache pour 10 minutes (600 secondes)
        //     Cache::put($cacheKey, $available, now()->addMinutes(10));

        //     return $available;
        // } catch (\Exception $e) {
        //     return false;
        // }
    }

//    public function checkDomain($domain)
// {
//     try {
//         $response = Http::timeout(10)->get('https://www.whoisxmlapi.com/whoisserver/WhoisService', [
//             'domainName' => $domain,
//             'apiKey' => $this->apiKey,
//         ]);

//         $data = $response->json();

//         // Analyse basique du contenu (tu peux améliorer si besoin)
//         return isset($data['WhoisRecord']['dataError']) && $data['WhoisRecord']['dataError'] === 'MISSING_WHOIS_DATA';
//     } catch (\Exception $e) {
//         return false;
//     }
// }

    public function checkAll($name, $excludedExt = null)
    {
        $results = [];
       $extensions = Extension::limit(5)->get();
      foreach ($extensions as $ext) {
        if ($excludedExt && strtolower($ext->extension) === strtolower($excludedExt)) {
            continue; // Ignore l'extension déjà saisie
        }
        $domain = strtolower($name) . '.' . $ext->extension;
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
