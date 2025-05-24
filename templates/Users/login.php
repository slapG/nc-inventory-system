<div class="d-flex justify-content-center align-items-center" 
style="height: 100vh; background-image: url('<?= $this->Url->assetUrl('#') ?>'); background-size: 800px; background-position: center; background-repeat: no-repeat;">

<div class="login-box">
  <div class="login-logo">
    <img src="<?= $this->Url->assetUrl('img/nc_logo.png')?>" alt="Logo" class="brand-image elevation-3" style="opacity: 1; height: 200px;">
  </div>
<div class="card shadow card-outline card-success" >
    <div class="card-header text-center">
      <a href="#" class="h1"><b>NC</b> INVENTORY </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        <?= $this->Form->create(null, ['id' => 'login-form'])?>
      
        <div class="input-group mb-3">
            <?= $this->Form->text('email', [
                'class' => 'form-control', 
                'placeholder' => 'Enter Email', 
                'id' => 'email', 
                'required' => true
            ]); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        
        <div class="input-group mb-3">
            <?= $this->Form->password('password', [
                'class' => 'form-control', 
                'placeholder' => ' Enter Password', 
                'id' => 'password', 
                'required' => true
            ]); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
          </div>
          <?= $this->Form->end() ?>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
 <?= $this->Html->script('login.js') ?>