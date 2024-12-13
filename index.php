<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Project Work </title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">City Tourism</div>
            <div class="hamburger" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <ul class="navbar">
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="user.php">User</a></li>
                <li><a href="view_jobs.php">Jobs</a></li>
                <li><a href="view_student.php">Students</a></li>
                <li><a href="view_tourism.php">Tourism</a></li>
                <li><a href="view_business.php">Business</a></li>
                <li><a href="#contact">Contact</a></li>
                
            </ul>
        </nav>
    </header>

    <div class="welcome-section">
        <div class="welcome-message">
            <h1>Welcome to Our Website!</h1>
            <p>Explore the beauty of City Tourism. From amazing attractions to exciting business opportunities, we’re
                here to guide you through every aspect of this wonderful city.</p>
            <button onclick="alert('Let’s Get Started!')">Get Started</button>
        </div>
    </div>
    <main class="main-content">
        <section class="module">

            <h2>Tourism</h2>
            <p>As its name implies, this module is responsible for all tourism-related operations in the city, including
                hotels, restaurants, tourist attractions, ATMs, theatres, and so on. A user authenticated by the
                administration module becomes the primary user of this module.</p>
        </section>

        <section class="module">
            <h2>Student</h2>
            <p>This module helps students move around the city. It provides students with all academic information, such
                as the locations of outstanding educational institutes, libraries, coaching centers, colleges,
                universities, and so on.</p>
        </section>

        <section class="module">
            <h2>Job Applicant</h2>
            <p>This module contains key information on the city's job opportunities in different departments. In
                addition, users have access to a wide range of job-related data from a variety of industries. The main
                goal of this module is to help the city administration struggle with unemployment issues.</p>
        </section>

        <section class="module">
            <h2>Business</h2>
            <p>This module focuses on providing news, information, and opportunities in the city connected to business.
                People can obtain information on the city's business centres and industries.</p>
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 <strong>Moez Rehman</strong> | Web Developer & Freelancer</p>
            <p>Transforming your ideas into stunning, user-friendly digital experiences. , I create websites that not only look great but also perform seamlessly across all devices.</p>
            <p>Whether you’re a startup, a small business, or an individual with a vision, let’s collaborate to bring your projects to life.</p>
            <div class="social-links">
              <a href="#" target="_blank" title="LinkedIn">LinkedIn</a> |
              <a href="#" target="_blank" title="GitHub">GitHub</a> |
              <a href="#" title="Email">Email</a>
            </div>
          </div>
    </footer>

    <script>
        function toggleMenu() {
            const navbar = document.querySelector('.navbar');
            navbar.classList.toggle('active');
        }
    </script>
</body>

</html>