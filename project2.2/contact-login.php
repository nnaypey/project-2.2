<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Contact</title>
</head>

<body>
    <!--
            Navbaru
        -->
    <nav class="navbar">
        <a class="logo" href="homepage-login.php"><img class="logo" src="image/logo.png" alt="logo"></a>
        <a href="#" class="toggle-button">
            <span class="bars"></span>
            <span class="bars"></span>
            <span class="bars"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="homepage-login.php">Home</a></li>
                <li><a href="airpressure.php">Air pressure</a></li>
                <li><a href="rainfall.php">Rainfall</a></li>
                <li><a href="includes/logout.inc.php">Log out</a></li>
            </ul>
        </div>
    </nav>
    <!--
          Main section     
        -->

    <div class="contact-form" method="POST" action="contact-login.inc.php">
        <h1>Contact Us</h1>
        <form method="POST" action="includes/contact-login.inc.php">
            <div class="txtb">
                <label for="firstname">First Name :</label>
                <input name="firstname" type="text" placeholder="Enter your first name..." required>
            </div>

            <div class="txtb">
                <label for="lastname">Last Name :</label>
                <input name="lastname" type="text" placeholder="Enter your last name..." required>
            </div>

            <div class="txtb">
                <label for="email">E-mail :</label>
                <input name="email" type="email" placeholder="Enter your email..." required>
            </div>

            <div class="txtb">
                <label for="message">Message :</label>
                <textarea name="message" cols="30" rows="10" placeholder="Enter your message..." required></textarea>
            </div>
            <input type="submit" class="btn" value="Send message">
        </form>
    </div>

    <!--
         Footer
        -->
    <footer>
        <div class="main-content">
            <div class="left box">
                <h2>About us</h2>
                <div class="content">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam cumque doloribus, excepturi earum totam repellat perspiciatis omnis quos reiciendis iste corporis. Odit harum commodi enim repellat, distinctio dolorem doloribus mollitia.</p>
                    <div class="social">
                        <a href="https://www.facebook.com/ui.ac.id"><span class="fab fa-facebook-f"></span></a>
                        <a href="https://twitter.com/univ_indonesia"><span class="fab fa-twitter"></span></a>
                        <a href="https://www.instagram.com/univ_indonesia/"><span class="fab fa-instagram"></span></a>
                        <a href="https://www.youtube.com/user/UIUpdate2"><span class="fab fa-youtube"></span></a>
                        <a href="https://www.linkedin.com/school/university-of-indonesia/"><span class="fab fa-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <div class="center box">
                <h2>Contact</h2>
                <div class="content">
                    <div class="place">
                        <span class="fas fa-map-marker-alt"></span>
                        <span class="text">Kampus Baru UI Depok, Jawa Barat, Indonesia</span>

                    </div>
                    <div class="Phone">
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">+62 815 15000 002</span>
                    </div>
                    <div class="email">
                        <span class="fas fa-envelope"></span>
                        <span class="text">sipp@ui.ac.id</span>
                    </div>
                    <div class="contact">
                        <a href="contact-login.php"><span class="fas fa-paper-plane"></span></a>
                        <span class="text">Contact us</span>
                    </div>
                </div>
            </div>

            <div class="right box">
                <div class="content1">
                    <div class="location">
                        <h2>Location</h2>
                        <iframe class="location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.241647226428!2d106.82485951519585!3d-6.362763795395721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec1a804e8b85%3A0xd7bf80e1977cea07!2sUniversity%20of%20Indonesia!5e0!3m2!1snl!2snl!4v1611779990650!5m2!1snl!2snl"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <center>
                <span class="credit"> Created By IIT |</span>
                <span class="far fa-copyright"><span>2021 All right reserved.</span></span>
            </center>
        </div>
    </footer>


    <script src="main.js"></script>
</body>

</html>