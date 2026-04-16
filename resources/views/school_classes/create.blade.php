@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="fw-bold mb-0 text-primary">
                        <i class="fas fa-school me-2"></i> Ajouter une Nouvelle Classe
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('school-classes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Cycle d'enseignement</label>
                                <select id="level_type" name="level_type" class="form-select border-0 bg-light" onchange="updateYears()" required>
                                    <option value="" selected disabled>Choisir le cycle</option>
                                    <option value="primary">Primaire</option>
                                    <option value="middle">Moyen</option>
                                    <option value="secondary">Lycee</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Niveau (Année)</label>
                                <select id="grade_level" name="grade_level" class="form-select border-0 bg-light" required>
                                    <option value="" selected disabled>Choisir le niveau</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Section (Groupe)</label>
                                <input type="text" name="section" class="form-control border-0 bg-light" placeholder="Ex: 1, A, أو G1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Année Scolaire</label>
                                <input type="text" name="academic_year" class="form-control border-0 bg-light" value="2025-2026" required>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary py-2 fw-bold" style="border-radius: 10px; background: linear-gradient(45deg, #4e73df, #224abe);">
                                <i class="fas fa-plus-circle me-2"></i> Enregistrer la Classe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateYears() {
    const level = document.getElementById('level_type').value;
    const yearSelect = document.getElementById('grade_level');
    
    // Réinitialiser les options
    yearSelect.innerHTML = '<option value="" selected disabled>Choisir le niveau</option>';

    let years = [];
    if (level === 'primary') {
        years = ['1ère Année Primaire (1AP)', '2ème Année Primaire (2AP)', '3ème Année Primaire (3AP)', '4ème Année Primaire (4AP)', '5ème Année Primaire (5AP)'];
    } else if (level === 'middle') {
        years = ['1ère Année Moyen (1AM)', '2ème Année Moyen (2AM)', '3ème Année Moyen (3AM)', '4ème Année Moyen (4AM)'];
    } else if (level === 'secondary') {
        years = ['1ère Année Secondaire (1AS)', '2ème Année Secondaire (2AS)', '3ème Année Secondaire (3AS)'];
    }

    years.forEach(year => {
        let option = document.createElement('option');
        option.value = year;
        option.text = year;
        yearSelect.add(option);
    });
}
</script>
@endsection