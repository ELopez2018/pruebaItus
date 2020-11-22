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
                            <span>PRUEBA ITUS</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                              </div>
                            <input class="form-control" type="text" name="buscar" id="buscar" placeholder="Busqueda">
                            </div>
                        </div>
                        <div class="col-sm-2 text-center align-content-center justify-content-center align-items-center">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary">Desc</button>
                                <button type="button" class="btn btn-secondary">Asc</button>
                              </div>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info btn-block">Buscar</button>
                        </div>
                    </div>

                </form>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Email</th>
                                <th scope="col">Primer Nombre</th>
                                <th scope="col">Segundo Nombre</th>
                                <th scope="col">
                                   Avatar
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                              <tr>
                                <td>{{ $user['id']  }}</td>
                                <td>{{ $user['email']  }}</td>
                                <td>{{ $user['first_name']  }}</td>
                                <td>{{ $user['last_name']  }}</td>
                                <td>
                                    <img src="https://randomuser.me/api/portraits/men/81.jpg" alt="" class="img-thumbnail rounded-circle">
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{-- {{ $data->links() }} --}}
                          {{-- <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                              <li class="page-item ">
                                <span class="page-link">Anterior</span>
                              </li>
                              <li class="page-item active"><a class="page-link" href="#">1</a></li>
                              <li class="page-item ">
                                <span class="page-link">
                                  2
                                  <span class="sr-only">(Actual)</span>
                                </span>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                              </li>
                            </ul>
                          </nav> --}}

                    </div>
                </div>
            </div>

        </div>

</body>
@extends('layout/footer');
