<br><br>
<div class="">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="">
        <h3>Registro</h3>
        <hr>
        <form class="" action="registro" method="post">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group">
               <label for="firstname">Nombre(s)</label>
               <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group">
               <label for="lastname">Apellidos</label>
               <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
              </div>
            </div>
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
               <label for="email">Correo electrónico</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>
            
            <div class="col-xs-12 col-sm-6">
              <div class="form-group">
               <label for="password">Contraseña</label>
               <input type="password" class="form-control" name="password" id="password" value="">
             </div>
           </div>
           <div class="col-xs-12 col-sm-6">
             <div class="form-group">
              <label for="password_confirm">Confirmar contraseña</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
            </div>
          </div>
          <?php if (isset($validation)): ?>
            <div class="col-xs-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Crear cuenta</button>
            </div>
            <div class="col-xs-12 col-sm-8 text-right">
              <a href="/login">Ya tengo cuenta</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
