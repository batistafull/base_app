<div class="page-header flex-wrap">
    <div class="header-left">
        <a href="#" class="decoration-none">
            <h3 class="m-0 pe-3 font-weight-bold text-dark ">Clientes</h3>
        </a>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">

        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text bg-blue-dreamed" onclick="$('#collapseAddClintes').collapse('toggle')">
            <i class="mdi mdi-plus-circle bg-blue-dreamed-dark"></i>Agregar</button>
    </div>
</div>
<div class="card card-body">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-stripe table-hover">
                    <thead>
                        <tr>
                            <th class="card-title">Nombre</th>
                            <th class="card-title">Empresa</th>
                            <th class="card-title">Correo</th>
                            <th class="card-title">Teléfono</th>
                            <th class="card-title">Tipo</th>
                            <th class="card-title"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?= $base_url ?>clientes/detail/39284a1c-d0ed-40c7-833a-b31f7acf0aa9">aaa</a></td>
                            <td>aaa</td>
                            <td>test@test.com</td>
                            <td>1234567890</td>
                            <td>CLIENT</td>
                            <td><a class="btn bg-blue-dreamed-dark btn-sm text-white" href="<?= $base_url ?>clientes/set_clients_update/39284a1c-d0ed-40c7-833a-b31f7acf0aa9">edit</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>