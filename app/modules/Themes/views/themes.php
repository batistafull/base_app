<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body row">
                <h1>Themes</h1>
                <?php foreach ($templates as $key => $value) { ?>
                    <div class="col-md-3">
                        <div class="card stretch-card grid-margin">
                            <img src="<?= $base_url ?>/app/components/Themes/templates/<?= $value['name'] ?>/<?= $value['screenshot'] ?? '' ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['name'] ?></h5>
                                <p class="card-text"></p>
                                <?php if(THEME_NAME == $value['name']){ ?>
                                    <button type="button" class="btn btn-success" disabled>Current Theme</button>
                                <?php }else{ ?>
                                    <a href="<?= $base_url ?>Themes/changeThemes?theme_name=<?= $value['name'] ?>" class="btn btn-primary">Change Theme</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
