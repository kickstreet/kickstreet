<br><br>
<div class="">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="">
        <h3>Iniciar sesión</h3>
        <hr>
        <?php if (session()->get('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <form class="" action="/login" method="post">
          <div class="form-group">
           <label for="email">Correo electronico</label>
           <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
          </div>
          <div class="form-group">
           <label for="password">Contraseña</label>
           <input type="password" class="form-control" name="password" id="password" value="">
          </div>
          <?php if (isset($validation)): ?>
            <div class="col-xs-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Iniciar</button>
            </div>
            <div class="col-xs-12 col-sm-8 text-right">
              <a href="/registro">Registrarme</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
