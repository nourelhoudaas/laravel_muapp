@extends('base')

@section('title', 'Dashboard Direction')

@section('content')

    <body>
        <div class="container2">

            <!-- start section aside -->
            @include('./navbar.sidebar')
            <!-- end section aside -->

            <!-- main section start -->
            <main>

                <h1> Department of {{ $nom_d }}</h1>

                {{-- <div class="date">
                    <input type="date">
                </div> --}}

                <div class="insights">
                    <!-- start Employees -->
                    <div class="sales">
                        <span class="material-symbols-outlined">groups</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Employees</h3>
                                <h1>{{ $totalEmpDep }}</h1>
                            </div>

                        </div>

                    </div>
                    <!-- end Employees -->

                    <!-- start Absence -->
                    <div class="expenses">
                        <span class="material-symbols-outlined">trending_down</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Absence</h3>
                                <h1>0</h1>
                            </div>
                        </div>

                    </div>
                    <!-- end Absence -->

                    <!-- start Presence -->
                    <div class="income">
                        <span class="material-symbols-outlined">trending_up</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Presence</h3>
                                <h1>{{ $totalEmpDep }}</h1>
                            </div>

                        </div>

                    </div>
                    <!-- end Presence -->
                </div>
                <!-- end inside -->

                <!-- start resent order -->

                <div class="recent_order">
                    <h1>List Employees</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>NOM</th>
                                <th>PRENOM</th>
                                <th>Poste</th>
                                <th>Sous direction</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($empdep as $emp)
                                <tr>
                                    <td>
                                        <a href="{{ route('BioTemplate.detail', ['id' => $emp->id_nin]) }}">{{ $emp->Nom_emp }}</a>
                                    </td>
                                    <td>{{ $emp->Prenom_emp }}</td>
                                    <td>{{ $emp->Nom_post }}</td>
                                    <td>{{ $emp->Nom_sous_depart }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- end resent order -->
            </main>
            <!-- main section end -->

            <!-- right section start -->

            <!-- end top -->

            <!-- start recent update -->
            <!-- ------------------------------ -->
            <!-- end recent update -->

        </div>
        <!-- end right section -->

        </div>

        <!-- appel script -->
        <script src="script.js"></script>
    </body>

    </html>
@endsection
