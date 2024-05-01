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
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="bg-dark text-white">
                            <?php foreach ($listDefs as $header) { ?>
                                <th scope="col"><?= $header ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item) { ?>
                            <tr>
                                <?php foreach ($listDefs as $field) { ?>
                                    <td><?= $item[$field] ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>