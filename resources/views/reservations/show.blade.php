
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.Head')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            @include('layouts.Nav')
        </div>

        <!-- top navigation -->
        @include('layouts.Header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>


                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Plain Page</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="container">
                                <h1>Détails de la réservation</h1>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Réservation #{{ $reservation->id }}</h5>
                                        <p class="card-text"><strong>Date:</strong> {{ $reservation->date }}</p>
                                        <p class="card-text"><strong>Heures:</strong> {{ $reservation->heures }}</p>
                                        <p class="card-text"><strong>Montant:</strong> {{ $reservation->montant }}</p>
                                        <p class="card-text"><strong>Parking nom:</strong> {{ $reservation->parking->nom }}</p>
                                        <p class="card-text"><strong>Parking détails:</strong> {{ $reservation->parking->details }}</p>
                                    </div>
                                </div>
{{--                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning mt-3">Modifier</a>--}}
                                <a href="{{ route('reservations.user') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        @include('layouts.Footer')
    </footer>
    <!-- /footer content -->
</div>
</div>

<!-- jQuery -->
@include('layouts.Jquery')
</body>
</html>
