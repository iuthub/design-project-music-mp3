<footer>
    <div class="layout">
        <div class="f-footer">
            <div class="container-fluid">
                <div class="row f-padding">
                    <div class="footer-info col-md-6 col-sm-12">
                    <h2>OUR INFORMATION</h2>
                        <div class="f-left-layout">
                            <p>
                                <i class="fa fa-map-marker"></i>
                                Office : 9, Ziyolilar str.,<br>
                                M.Ulugbek district,<br> Tashkent city<br>
                            </p> 
                            <br>
                            <p>
                                <i class="fa fa-address-card"></i>
                                     Phone  : +998 71 289-99-99<br>
                                     Fax    : +998 71 269-00-58<br>
                                     Email  : info@inha.uz<br>
                           </p>
                        </div>
                    </div>

                    <div class="footer-signup col-md-6 col-sm-12">
                        <h2> LEAVE MESSAGE </h2>
                        <form action="{{route('send.message')}}" method="get" id="signup" class="form">
                            <div class="Input">
                                <div class="field">
                                    <label class="float-left">Name*</label>
                                    <input type="text" placeholder="  Username" name="name" id="name" required>
                                </div>
                                <div class="field">
                                    <label class="float-left">Email*</label>
                                    <input type="email" placeholder="  user@example.com" name="email" id="email" required>
                                </div>
                                <div class="field"> 
                                    <label class="float-left">Message*</label>
                                    <textarea name="message" placeholder=" Loremepsum............"  id="message" required></textarea>
                                </div>
                                 <article class="f-button">
                                    <button type="submit" form="signup" value="Sumbit">Send Message</button>
                                </article>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
        <div class="copyright">
            <i class="fa fa-copyright">  2018  Music </i>
        </div>
</footer>