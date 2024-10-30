
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

                                    <!-- Your parking details content here -->
                                <div class="container">
                                    <h1>Détails du parking</h1>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $parking->nom }}</h5>
                                            <p class="card-text"><strong>Détails:</strong> {{ $parking->details }}</p>
                                            <p class="card-text"><strong>Capacité:</strong> {{ $parking->capacite }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('parkings.edit', $parking->id) }}" class="btn btn-warning mt-3">Modifier</a>
                                    <a href="{{ route('parkings.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
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
