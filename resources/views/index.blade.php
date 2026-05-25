@extends('layouts.admin')

@section('template_title') Principal @endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    <div class="container-fluid">
        <div class="row"><!--begin::Row-->
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{$workerCount}}</h3>
                        <p>Trabajadores</p>
                    </div>
                    <i class="fa-solid fa-person-chalkboard small-box-icon" fill="currentColor"></i>
                    <path
                        d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                    ></path>
                    <!-- <a href="{{url('worker')}}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Más información <i class="bi bi-link-45deg"></i>
                    </a> -->
                </div>
                <!--end::Small Box Widget 1-->
            </div>

            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>{{$studentCount}}</h3>
                        <p>Estudiantes</p>
                    </div>
                    <i class="fa-solid fa-user-graduate small-box-icon" fill="currentColor"></i>
                    <path
                        d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"
                    ></path>
                    <!-- <a  href="{{url('student')}}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Más información <i class="bi bi-link-45deg"></i>
                    </a> -->
                </div>
                <!--end::Small Box Widget 2-->
            </div>

            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 3-->
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h3>{{$visitorCount}}</h3>
                        <p>Visitantes</p>
                    </div>
                    <i class="fa-solid fa-person-military-to-person small-box-icon" fill="currentColor"></i>
                    <path
                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                    ></path>
                    <!-- <a href="{{url('visitor')}}"class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                        Más información <i class="bi bi-link-45deg"></i>
                    </a> -->
                </div>
                <!--end::Small Box Widget 3-->
            </div>
        </div>
        <!--end::Row-->

        <!-- ------------------------------->
        <!-- PRIMERA GRÁFICA: Entradas por día (comunidad y visitantes)-->
        <!-- ----------------------------- -->

        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Ingreso al plantel<h3>
            </div>

            <div class="card-body">
                <canvas id="graficaEntradas" height="100"></canvas>
            </div>
        </div>

        <script>
            console.log(@json($workerData));
            const ctx1 = document.getElementById('graficaEntradas').getContext('2d');
            const grafica1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: @json($dias),
                    datasets: [
                    {
                        label: 'Trabajadores',
                        data: @json($workerData),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    },
                    {
                        label: 'Estudiantes',
                        data: @json($studentData),
                        backgroundColor: 'rgba(75, 192, 192, 0.6)'
                    },
                    {
                        label: 'Visitantes',
                        data: @json($visitorData),
                        backgroundColor: 'rgba(255, 99, 132, 0.6)'
                    }
                ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1 }
                        }
                    }
                }
            });
        </script>

    <!-- ----------------------------- -->
    <!-- SEGUNDA GRÁFICA: Estudiantes por oferta en la semana -->
    <!-- ----------------------------- -->
    <div class="card mt-5 card-outline card-info">
      <div class="card-header">
          <h3 class="card-title">Ingreso al plantel</h3>
      </div>
      <div class="card-body">
          <canvas id="graficaOfertasSemana" height="120"></canvas>
      </div>
    </div>

    <script>
        const ctx2 = document.getElementById('graficaOfertasSemana').getContext('2d');
        const grafica2 = new Chart(ctx2, {
            // Para usar una gráfica de barras, solo cambia la propiedad type de 'line' a 'bar':
            type: 'bar',
            data: {
                labels: @json($dias),
                datasets: @json($dataset)
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    },
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

    <!-- ----------------------------- -->
    <!-- TERCERA GRÁFICA: Estudiantes por oferta en la semana -->
    <!-- ----------------------------- -->
    <div class="card mt-5 card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Estudiantes por carrera (semana)</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Carrera</th>
                        <th>Total de ingresos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tablaCarreras as $row)
                    <tr>
                        <td>{{ $row->carrera }}</td>
                        <td>{{ $row->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
