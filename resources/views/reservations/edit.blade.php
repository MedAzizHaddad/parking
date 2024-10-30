
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
                                <h1>Modifier la réservation</h1>
                                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="datetime-local" class="form-control" id="date" name="date" value="{{ date('Y-m-d\TH:i', strtotime($reservation->date)) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="heures">Heures</label>
                                        <input type="number" class="form-control" id="heures" name="heures" value="{{ $reservation->heures }}" min="1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="montant">Montant</label>
                                        <input type="number" class="form-control" id="montant" name="montant" value="{{ $reservation->montant }}" min="0" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="parking_id">Parking</label>
                                        <select class="form-control" id="parking_id" name="parking_id" required>
                                            @foreach($parkings as $parking)
                                                <option value="{{ $parking->id }}" {{ $reservation->parking_id == $parking->id ? 'selected' : '' }}>
                                                    {{ $parking->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </form>
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
