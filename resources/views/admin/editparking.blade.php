
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
                                <h1>Modifier le parking</h1>
                                <form action="{{ route('parkings.update', $parking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $parking->nom }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Détails</label>
                                        <textarea class="form-control" id="details" name="details" rows="3" required>{{ $parking->details }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="capacite">Capacité</label>
                                        <input type="number" class="form-control" id="capacite" name="capacite" value="{{ $parking->capacite }}" min="1" required>
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
