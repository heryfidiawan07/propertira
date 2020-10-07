<footer class="main-footer">
    <div class="row">
        <div class="col-md-5 my-3">
            <h6 class="mb-3">KIRIM PESAN</h6>
            <form method="POST" action="" id="visitor_message">
                @csrf
                <input type="text" name="name" class="form-control form-control-sm mb-1" placeholder="Nama">
                <input type="text" name="phone" class="form-control form-control-sm mb-1" placeholder="Nomor HP">
                <input type="text" name="email" class="form-control form-control-sm mb-1" placeholder="Email">
                <input type="text" name="subject" class="form-control form-control-sm mb-1" placeholder="Subject">
                <textarea name="message" class="form-control form-control-sm mb-1" placeholder="Pesan"></textarea>
                <input type="submit" class="btn bg-parent text-white btn-sm pl-3 pr-3" value="Kirim">
            </form>
        </div>
        <div class="col-md-3 my-3">
            <h6 class="mb-3">KONTAK</h6>
            {!! $setting != null ? '<a href="$setting->whatsapp_link" class="d-block font-weight-bold text-success"><i class="fab fa-whatsapp"></i> '.$setting->whatsapp.'</a>' : '' !!}
            {!! $setting != null ? '<a href="tel:+62'.$setting->hp.'" class="d-block font-weight-bold text-primary"><i class="fas fa-phone"></i> '.$setting->hp.'</a>' : '' !!}
            {!! $setting != null ? '<a href="mailto:'.$setting->email.'" class="d-block font-weight-bold text-danger"><i class="fas fa-envelope"></i> '.$setting->email.'</a>' : '' !!}
            <div class="mt-2">
                <a href=""><i class="fab fa-facebook text-20"></i></a>
                <a href=""><i class="fab fa-instagram text-20 ml-2"></i></a>
            </div>
        </div>
        <div class="col-md-4 my-3">
            <h6 class="mb-3">TENTANG</h6>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <hr>
    <div class="footer-left">
        Copyright &copy; {{date('Y')}}
    </div>
    <div class="footer-right">Ira Property Syariah</div>
</footer>