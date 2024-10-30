
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
                                <h1>Liste des réservations</h1>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Heures</th>
                                        <th>Montant</th>
                                        <th>Parking</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->id }}</td>
                                            <td>{{ $reservation->date }}</td>
                                            <td>{{ $reservation->heures }}</td>
                                            <td>{{ $reservation->montant }}</td>
                                            <td>{{ $reservation->parking->nom }}</td>
                                            <td>{{ $reservation->statut }}</td>
                                            <td>
                                                @if(auth()->user()->isAdmin())
                                                    @if($reservation->statut === 'en_attente')
                                                        <form action="{{ route('reservations.approve', $reservation->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-sm btn-success">Approuver</button>
                                                        </form>
                                                        <form action="{{ route('reservations.decline', $reservation->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-sm btn-danger">Refuser</button>
                                                        </form>
                                                    @endif
                                                @endif
                                                <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-sm btn-info">Voir</a>
                                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
