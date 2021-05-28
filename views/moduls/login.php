<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                    <div class="brand-logo">
                        <img src="views/images/logo-header-mini.png" alt="logo">
                    </div>
                    <h4>DEKKERAPP</h4>
                    <h6 class="font-weight-light"></h6>
                    <form class="pt-3" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail">Correo</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="ti-user text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg border-left-0" name="email" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="ti-lock text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control form-control-lg border-left-0" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="my-3">

                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">ACCEDER</button>
                        </div>
                        <?php

                        $login = new ControllerFunctions();
                        $login->ctrAccesoUser();

                        ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 login-half-bg d-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">SAN FRANCISCO DEKKERLAB</p>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>