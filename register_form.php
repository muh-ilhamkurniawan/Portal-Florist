    <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
    .input-borders{
        border-radius:30px;
    }
    </style>
	<div class="container-fluid">
		<form id="signup_form" onsubmit="return false" class="login100-form">
            <div class="billing-details jumbotron">
                <div class="section-title text-center">
                    <h2>Daftar di sini</h2>
                </div>
                <div class="form-group ">
                    <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="Nama Depan">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="l_name" id="l_name" placeholder="Nama Belakang">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="email" name="email"  placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="Kata Sandi">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="Konfirmasi Kata Sandi">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="No HP">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="address1" id="address1" placeholder="Desa">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="address2" id="address2" placeholder="Kecamatan">
                </div>
                <div style="form-group">
                    <input class="primary-btn btn-block"  value="Daftar" type="submit" name="signup_button">
                </div>
        </form>
                <div class="login-marg">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" id="signup_msg"> </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
    </div> 