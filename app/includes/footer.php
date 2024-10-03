
    <!--footer-->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section about">
            <h2 class="logo-text"><span>Tiny Bloggers</span></h2>
            <p>
                Tiny Bloggers is a fictional blog desinged for narrating and publishing our inspirational News and Journals.  
                Young writers are encouraged to wirte in our inspirational and News Stories.
            </p>
        <div class="contact">
            <span><i class="fas fa-phone"></i> &nbsp; 088-192-269</span>
            <span><i class="fas fa-envelope"></i> &nbsp; tiny@bloggers.com</span>
        </div>
        </div>
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <br>
                <ul>
                    <a href="<?php echo BASE_URL . '/events.php' ?>">
                        <li>Events</li>
                    
                    <a href="">
                        <li>Gallery</li>
                    </a>
                    <a href="#">
                        <li>Terms and Conditions</li>
                    </a>
                </ul>
            </div>
            <div class="footer-section contact-form">
                <h2>Contact Us</h2>
                <br>
                <form action="index.php" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
                    <textarea rows="4" name = "message" class="text-input contact-input" placeholder="Your message..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i>
                        send
                    </button>

                </form>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; tinyblogger
        </div>
    </div>
    <!--//footer-->