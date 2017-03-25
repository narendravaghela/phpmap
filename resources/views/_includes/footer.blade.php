<footer id="footer" class="footer-bs">
    <div class="row">
        <div class="col-md-3 footer-brand animated fadeInLeft">
            <h2>{{ config('app.name') }}</h2>
            <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
            <p>© {{ date('Y') }} {{ config('app.name') }} - All rights reserved.</p>
        </div>
        <div class="col-md-4 footer-nav animated fadeInDown">
            <div class="col-md-6">
                <h5>PHPMap</h5>
                <ul class="list">
                    <li><a href="/about">About</a></li>
                    <li><a href="/sponsors">Sponsors</a></li>
                    <li><a href="/terms">Terms & Conditions</a></li>
                    <li><a href="/privacy">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Follow Us</h5>
                <ul class="list">
                    <li><a href="/about">About</a></li>
                    <li><a href="/sponsors">Sponsors</a></li>
                    <li><a href="/terms">Terms & Condition</a></li>
                    <li><a href="/privacy">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 footer-social animated fadeInDown">
            <h5>Follow Us</h5>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">RSS</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-ns animated fadeInRight">
            <h4>Newsletter</h4>
            <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
            <p>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                </span>
            </div>
            </p>
        </div>
    </div>
</footer>