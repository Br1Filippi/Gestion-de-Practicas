@extends('templates.master')

@section('contenido-principal')

<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <div class="col-8">
            <h3><strong>Informe de *Practicante*</strong></h3>
        </div>
        <div class="col-2 d-flex justify-content-end aling-items-center">
            <a href="{{route('practicas.practicantes')}}" class="btn text-white btn-warning  d-flex justify-content-center align-items-center">
                <i class="material-icons text-white mx-1" >arrow_back</i>
                <strong>Volver</strong>
            </a>
        </div>
    </div>
    
    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            <div class="card custom-card shadow-sm" style="width: 80%;">
                <div class="card-body overflow-auto" style="max-height: 80vh;">

                    <h5><strong>1. ACTIVIDADES ENCOMENDADAS AL ALUMNO</strong></h5>
                    <p class="mb-0">Resumen de las principales actividades o tareas encomendadas al alumno.</p>
                    <textarea class="w-100" rows="5"></textarea>

                    <h5><strong>2. DEBILIDADES Y FORTALEZAS</strong></h5>
                    <p class="mb-1">Debilidades y fortalezas que presentó el alumno en la realización de las labores encomendadas (respecto de la formación teórico-práctica entregada en su formación académica, considerando los 4 semestres cursados que se contemplan
                        para cumplir con los requisitos de la Práctica Profesional).</p>
                    <p class="mb-0"><strong>Debilidades: </strong></p>
                    <p>Describir en forma breve, clara y precisa lo que considera han sido las materias que a su juicio faltó ahondar, no se entregó, se entregó pero con poca profundidad.</p>
                    <p class="mb-0"><strong>Fortalezas: </strong></p>
                    <p>Describir en forma breve, clara y precisa lo que considera han sido las materias, que a su juicio ayudaron al alumno a enfrenar adecuadamente las labores encomendadas. </p>
                    <textarea class="w-100" rows="10"></textarea>

                    
                    <h5><strong>3. CONSIDERACIONES PERSONALES</strong></h5>
                    <p class="mb-0">A su juicio qué cosas cree importantes que la Carrera tome en consideración para que los alumnos enfrenten adecuadamente su Práctica Profesional, tanto en el aspecto de la formación técnica, como en la formación personal (humana).</p>
                    <p>¿Qué cree que faltó?</p>
                    <textarea class="w-100" rows="5"></textarea>

                    <h5><strong>3. SUGERENCIAS</strong></h5>
                    <p class="mb-0">Proponga aquello que a su juicio, la Universidad Técnica Federico Santa María debería considerar para sus alumnos enfrenten adecuadamente su Práctica Profesional. Además, podría incluir temas sobre Trabajos de Titulación, que estén
                        vinculados a la Empresa. 
                    </p>
                    <textarea class="w-100" rows="5"></textarea>

                </div>  
                <div class="card-footer d-flex justify-content-end bg-white">
                    <div class="col-1">
                        <button type="submit" class="btn btn-success d-flex justify-content-center align-items-center">
                            <i class="material-icons">task</i>
                            <strong>Evaluar</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection