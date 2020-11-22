@extends('layout/header')

<body class="antialiased">
    <form action="{{ route('autorizacion') }}" method="POST" >
        {{ csrf_field() }}
        <div class="containeralign-items-center">
            <div class="row mt-5 ">
                <div class="col-sm-12 text-center d-flex justify-content-center">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                        <div class="card-header">
                            Ingreso al Sistema
                        </div>
                        <div class="card-body">
                            <label for="email"></label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="email">
                            <label for="email"></label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="password">
                        </div>
                        <div class="card-footer">
                            <button  type="submit" class="btn btn-success btn-block">Entrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
@extends('layout/footer')
