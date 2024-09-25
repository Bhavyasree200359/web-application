<?php 
include('connect.php'); 

if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $role = $_POST['role'];

    $optin = isset($_POST['optin']) ? implode(", ", $_POST['optin']) : '';

    $stmt = $conn->prepare("INSERT INTO test (name, email, message, role, optin) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $message, $role, $optin);

    if ($stmt->execute()) {
        echo "<script>alert('Success');</script>";
    } else {
        echo "<script>alert('Fail');</script>";
    }

   
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
       @media only screen and (max-width: 799px) {
        .hamburger {
    display: block !important; 
    cursor: pointer;
    margin-right: 10px;
}
#explore{
  min-width: 100% !important;
}
.career-div2{
  min-width: 100%;
}
        }
    </style>
 
    
</head>
<body>


<div class="nav-bar" >

    
    
    <div class="nav-items">
        <img class="logo" src="logo.png" alt="Logo">
        <div class="logo-text">T3chPulse</div>
    </div>
    <img src="hamburger.png" class="hamburger" onclick="toggleMenu()" style="background-color:white;width:40px;height:40px;border-radius:20px;display:none">
        

    <div class="nav-links" >
        <a class="home-link" href="#home" >Home</a>
        <a class="explore-link" href="#explore" >Explore</a>
        <a class="career-link" href="#career" >Careers</a>
        <a class="contact-link" href="#contact-form" >Contact</a>
    </div>

</div>
    
        <div id="home">
    <div class="home-div1">
        <h1 class="home-head">Kickstart Your IT Career with T3chPulse Insights</h1>

        <p class=" home-para">Discover industry insights, resources, and opportunities to shape your career in technology. Stay informed with our regular trend reports, which highlight the latest developments and their potential impacts on various industries.</p>

        <button class="start-button" onclick="scrollToBlogForm()">Get Started</button>

        <a class="join-us-link"href="#career" >Come join us!</a>
    </div>

    <div class="home-div2">
        <img class="home-img" src="home-img.jpg">
    </div>
</div>
    <p id="explore" class="section-heading">Explore 
    </p> 
    <div id="home1" >
    <div class="explore-div">
        <img class="explore-img"src="start-today-img.jpg" >
        <div>
            <p class="explore-para"><strong style="font-size:2rem">Get Started on Your Journey</strong><br>Enhance your skills with our carefully selected resources and tutorials.</p>
        </div>
    </div>
    <div class="explore-div">
        <img class="explore-img" src="stay-focus-img.png">
        <div>
            <p class="explore-para"><strong style="font-size:2rem">Stay Focused and Simplified</strong><br>Access beginner-friendly materials tailored for straightforward learning.</p>
        </div>
    </div>
      </div>
    <p id="career" class="section-heading">Careers 
    </p> 
    
    <div id="home1">  
    <div class="career-img-div"><img class="career-img"src="join-us.png
    " ></div>
    
        <div class="career-div2">
        <h1 class="career-heading">Exciting Career Opportunities at TechPulse</h1>
        <p class="career-para">Join Our Dynamic Team and Shape the Future of Technology. Explore Open Vacancies and Start Your Journey with Us Today! Choose the career path that excites you and join us by clicking the apply button below.
            
        </p>
        <button class="apply-button" onclick="scrollToContactForm()"  >Apply</button>
        

        

        </div>
        
        </div>
    <p id="contact-form" class="section-heading">Contact Us 
    </p> 
    <form method="POST" >
    <div class="contact-div">
  <div class="name-email-div">
    <div class="name-div">
      <p class="name">Name</p>
      <input class="name-input"type="text" name="name" placeholder="Your name" required>
    </div>
    <div class="email-div">
      <p class="email">Email</p>
      <input class="email-input"type="email" name="email" placeholder="Your email" required>
    </div>
  </div>
  <div class="role-div">
    <p class="role">Role</p>
    <select class="select-role"name="role" required >
      <option value="" disabled selected>Select your role</option>
      <option value="Designer">Designer</option>
      <option value="Developer">Developer</option>
      <option value="Other">Other</option>
    </select>
  </div>

 
  <div class="message-div">
    <p class="message">Message</p>
    <textarea name="message" placeholder="Your message" required ></textarea>
  </div>



  <div class="optin-div">
  <p class="optin">Opt-in</p>
    <div class="box" >
      <input class="box-input" type="checkbox" name="optin[]" value="Marketing Emails">
      <label class="label" >Marketing Emails</label>
    </div>
    <div class="box" >
      <input class="box-input" type="checkbox" name="optin[]" value="News and Updates Emails" >
      <label class="label" >News and Updates Emails</label>
    </div>
    <div class="box" >
      <input class="box-input" type="checkbox" name="optin[]" value="Production Process Emails" >
      <label class="label" >Production Process Emails</label>
    </div>
  </div>

  <input class="submit-button"type="submit" value="Submit" name="submit">
</div>
    </form>
    
    <footer class="footer">
    
        © 2024 T3chPulse. All rights reserved.
    </footer>
</body>
<script>
    function scrollToContactForm() {
        
        window.location.href = '#contact-form';
    }
    function scrollToBlogForm() {
        
        window.location.href = '#explore';
    }
    document.addEventListener('DOMContentLoaded', function() {
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active'); 
    }

    document.querySelector('.hamburger').addEventListener('click', toggleMenu);

    const navItems = document.querySelectorAll('.nav-links a');
    navItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.remove('active');
        });
    });
});


    
</script>


</html>