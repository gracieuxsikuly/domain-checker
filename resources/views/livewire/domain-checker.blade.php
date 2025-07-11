<div>
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">🔍 Vérificateur de nom de domaine</h2>

            <div class="input-group mb-3">
                <input type="text" wire:model.defer="name" class="form-control" placeholder="Ex : gracieux">
                <button class="btn btn-primary d-flex align-items-center justify-content-center" wire:click="check"
                    wire:loading.attr="disabled">
                    <span wire:loading wire:target="check" class="spinner-border spinner-border-sm me-2" role="status"
                        aria-hidden="true"></span>
                    Vérifier
                </button>
            </div>

            <div wire:loading wire:target="check" class="col-md-12 alert alert-info mt-3">
                ⏳ Vérification en cours, veuillez patienter...
            </div>
            @if($errorMessage)
            <div class="alert alert-warning mt-3">
                ⚠️ {{ $errorMessage }}
            </div>
            @endif
          @if($searchedDomain && $errorMessage === null && $availability !== null)
    <div class="alert {{ $availability['available'] ? 'alert-success' : 'alert-danger' }}">
        <strong>{{ $searchedDomain }}</strong> :
        @if($availability['available'])
            ✅ Disponible
        @else
            ❌ Déjà pris
            @if($availability['registered_at'])
                (enregistré en {{ date('Y', $availability['registered_at']) }})
            @endif
        @endif
    </div>
@endif



            @if($suggestions)
            <h5 class="mt-4">Autres extensions :</h5>
            <ul class="list-group">
                @foreach($suggestions as $s)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="{{ $s['available'] ? 'text-success' : 'text-danger text-decoration-line-through' }}">
                        {{ $s['domain'] }}
                    </span>
                    <span
                        class="{{ $s['available'] ? 'badge bg-secondary' : 'badge bg-secondary text-decoration-line-through'}}">
                        ${{ $s['price'] }}
                    </span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

</div>