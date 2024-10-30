
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
                                <h1>Liste des parkings</h1>
                                <a href="{{ route('addParking') }}" class="btn btn-primary mb-3">Ajouter un parking</a>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Capacité</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($parkings as $parking)
                                        <tr>
                                            <td>{{ $parking->id }}</td>
                                            <td>{{ $parking->nom }}</td>
                                            <td>{{ $parking->capacite }}</td>
                                            <td>
                                                <a href="{{ route('parkings.show', $parking->id) }}" class="btn btn-sm btn-info">Voir</a>
                                                <a href="{{ route('parkings.edit', $parking->id) }}" class="btn btn-sm btn-warning">Modifier</a>   <form action="{{ route('parkings.destroy', $parking->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce parking ?')">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
{{--                            @foreach ($parkings as $parking)--}}
{{--                                <a href="{{ route('parkings.show', $parking) }}">{{ $parking->nom }}</a>--}}
{{--                                <!-- Display links to individual parking details pages -->--}}
{{--                            @endforeach--}}
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
