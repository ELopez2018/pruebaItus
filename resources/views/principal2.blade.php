@extends('layout/header');
<body class="antialiased">

        {{ csrf_field() }}
        <div class="containeralign-items-center">
            <div class="row mt-5 ">
                <div class="col-sm-12 text-center d-flex justify-content-center">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 50%;">
                        <div class="card-header">
                            BIENVENIDO
                        </div>
                        <div class="card-body">
                            <span>usuario</span>
                        </div>
                        <div class="card-footer">
                            <p> <a href="{{ route('principal') }}" rel="noopener noreferrer">Regresar</a>  </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="{{ route('paginado.query') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                              </div>
                            <input class="form-control" type="text" name="buscar" id="buscar" placeholder="Busqueda por email">
                            </div>
                        </div>
                        <div class="col-sm-2 text-center align-content-center justify-content-center align-items-center">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="orden" id="desc" value="desc" checked>
                                <label class="form-check-label" for="desc">
                                  Desc
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="orden" id="asc" value="asc">
                                <label class="form-check-label" for="asc">
                                  Asc
                                </label>
                              </div>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info inline">Buscar</button>
                            <a href="{{ route('paginado.reset') }}"><button type="button"  class="btn btn-danger  inline" >Reset</button></a>
                        </div>
                    </div>

                </form>


                <div class="row">
                    <div class="table-responsive" id="mydatatable-container">
                        <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>id</th>
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Creacion</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>
                                        <input id="id" name="id" alias="alias" class="form-control" type="text" placeholder="búsqueda/filtro" />
                                    </th>
                                    <th>
                                        <input id="email" name="email" class="form-control" type="text" placeholder="búsqueda/filtro" />
                                    </th>

                                    <th>
                                        <input  id="nombre" name="name" class="form-control" type="text" placeholder="búsqueda/filtro" />
                                    </th>

                                    <th>
                                        <input id="creacion"  name="created_at" class="form-control" type="text" placeholder="búsqueda/filtro" />
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach ($data as $user)
                              <tr>
                                <td class=" text-center">{{ $user['id']  }}</td>
                                <td class="">{{ $user['email']  }}</td>
                                <td class="">{{ $user['name']  }}</td>
                                <td class="">{{ $user['created_at']  }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $data->links() }}
                    </div>
                </div>
            </div>

        </div>
        <style>
            #mydatatable tfoot input{
                width: 100% !important;
            }
            #mydatatable tfoot {
                display: table-header-group !important;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mydatatable tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="búsqueda/filtro.." />' );
                } );

                var table = $('#mydatatable').DataTable({
                    "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                    "responsive": false,
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    },
                    "order": [[ 0, "desc" ]],
                    "initComplete": function () {
                        this.api().columns().every( function () {
                            var that = this;

                            $( 'input', this.footer() ).on( 'keyup change', function () {
                                if ( that.search() !== this.value ) {
                                    that
                                        .search( this.value )
                                        .draw();
                                    }
                            });
                        })
                    }
                });

                console.log(table);
            });
        </script>
</body>
@extends('layout/footer');
