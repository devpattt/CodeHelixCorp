<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeHelixCorp</title>
    <link rel="stylesheet" href="index.css">
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            position: relative;
        }
        .modal-content h2 {
            margin-top: 0;
            color: black;
        }
        .modal-content form {
            display: flex;
            flex-direction: column;
            color: black;
        }
        .modal-content form input,
        .modal-content form select,
        .modal-content form button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }
        .modal-content form button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .modal-content form button:hover {
            background-color: #0056b3;
        }
        .close-btn {
            background-color: red;
            color: black;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .button-container {
            display: flex;
        }
        .button-container a {
            margin-right: 10px; /* Adjust the spacing between links */
        }
    </style>
</head>
<body>
    <!-- header -->
    <header>
        <div class="logo">CodeHelixCorp</div>
        <nav>
            <ul class="menu">
                <li><a href="#list">Home</a></li>
                <li><a href="elearning.php">E-Learning Materials</a></li> 
                <li><a href="about.php">About Us</a></li>
                <li><a href="reg.php" class="logout-btn">Log-out</a></li>
            </ul>
        </nav>
    </header>
    <!-- slider -->
    <div class="slider">
        <div class="list">
            <div class="item active">
                <img src="Img/14.png" alt="CodeHelix Corp Image 1">
                <div class="content">
                    <p>Welcome at</p>
                    <h2>CodeHelix Corp</h2>
                    <p>
                        In 2024, CodeHelix was founded by a group of students driven by their enthusiasm and determination to make a mark in the tech world. The name CodeHelix is derived from the word “Helix” which typically refers to a three-dimensional curve or spiral shape, However in a broader sense “Helix” can symbolize growth, progress, and continuous development, as it suggest a spiral motion indicating advancement and evolution.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="img/6.png" alt="CodeHelix Corp Image 2">
                <div class="content">
                    <p>CodeHelixCorp</p>
                    <h2>Mission</h2>
                    <p>
                        At CodeHelix, our mission is to provide individuals and businesses with the necessary tools, resources, and knowledge they need, ensuring their safety and success in this digital world.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="img/8.png" alt="CodeHelix Corp Image 3">
                <div class="content">
                    <p>CodeHelixCorp</p>
                    <h2>Vision</h2>
                    <p>
                        At CodeHelix, we see a future where everyone, from individuals and businesses, can navigate the digital world packed with knowledge and tools.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="img/7.png" alt="CodeHelix Corp Image 4">
                <div class="content">
                    <p>CodeHelixCorp</p>
                    <h2>Products</h2>
                    <p>
                        Learning Materials - Extensive collection of learning materials, including comprehensive tutorials, guides, and resources covering a wide range of topics such as cybersecurity essentials, and digital literacy <br>
                        <br>
                        Community and Mentorship - Foster a strong sense of community among users by providing forums, discussion boards, and mentorship programs where learners can connect with peers and industry professionals. Encourage collaboration, peer-to-peer learning, and knowledge sharing.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="img/9.png" alt="CodeHelix Corp Image 5">
                <div class="content">
                    <p>CodeHelixCorp</p>
                    <h2>Unique Selling Proposition</h2>
                    <p>
                        At CodeHelix, we're not just another online learning platform. What sets us apart is our unwavering commitment to providing a truly personalized and interactive learning experience. Unlike other options on the market, we don't believe in a one-size-fits-all approach to education. Our product is built around the idea that every learner is unique, with different goals, backgrounds, and learning styles.
                    </p>
                </div>
            </div>
        </div>
        <!-- button arrows -->
        <div class="arrows">
            <button id="prev">&lt;</button>
            <button id="next">&gt;</button>
        </div>
        <!-- thumbnail -->
        <div class="thumbnail">
            <div class="item active">   
                <img src="img/pikpik1.png" alt="E-Learning #1">
                <div class="content">
               
                </div>
            </div>
            <div class="item">
                <img src="img/pipik2.png" alt="E-Learning #2">
                <div class="content">
             
                </div>
            </div>
            <div class="item">
                <img src="img/pikpik3.png" alt="E-Learning #3">
                <div class="content">
                
                </div>
            </div>
            <div class="item">
                <img src="img/pikpik4.png" alt="E-Learning #4">
                <div class="content">
                
                </div>
            </div>
            <div class="item">
                <img src="img/pikpik5.png" alt="E-Learning #5">
                <div class="content">
              
                </div>
            </div>
        </div>
    </div>

    <div class="about" id="about">
        <div class="left">
            <img src="img/pipik2.png" alt="About Us Image">
        </div>
        <div class="right">
            <h5>CodeHelixCorp</h5>
            <p>In today's digital age, mastering the skills to protect yourself online is essential.
                 As we navigate through various online platforms, understanding how to safeguard our personal 
                 information and privacy becomes increasingly important. By learning to be safe online, you empower 
                 yourself with the knowledge to prevent cyber threats, secure your data, and maintain your digital well-being. Embrace the importance of online safety and make informed decisions to protect yourself in the vast digital landscape.</p>
        </div>
    </div>

    <div class="attraction" id="att">
        <div class="header">
            <div class="info">
                <h5>View More</h5>
            </div>
        </div>
        <div class="attract-items">
            <div class="item">
                <img src="img/e-learning 3.png" alt="Product Image 1">
                <div class="info">
                    <h4>ALL IN PACKAGE </h4>
                    <p>One time purchase of ₱250</p>
                    <div class="button-container">
                        <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/e-learning 2.png" alt="Product Image 2">
                <div class="info">
                    <h4>ALL IN PACKAGE </h4>
                    <p>One time purchase of ₱250</p>
                    <div class="button-container">
                        <a href="#" onclick="openModal('Product 2', 250)">Buy Now <i class='bx bx-link-external'></i></a>
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/pikpik5.png" alt="Product Image 3">
                <div class="info">
                    <h4>ALL IN PACKAGE</h4>
                    <p>One time purchase of ₱250</p>
                    <div class="button-container">
                        <a href="#" onclick="openModal('Product 3', 250)">Buy Now <i class='bx bx-link-external'></i></a>
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <h5>Philippines</h5>
        <div class="top">
            <div class="social-links">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-linkedin-square'></i></a>
            </div>
        </div>
        <div class="separator"></div>
        <div class="bottom">
            <div class="links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Cookies Setting</a>
            </div>
        </div>
    </footer>

     <!-- Modal -->
     <div class="modal" id="checkoutModal">
        <div class="modal-content">
            <button class="close-btn" onclick="closeModal()">X</button>
            <h2>Checkout</h2>
            <!-- Checkout form -->
            <form id="checkoutForm" onsubmit="return submitForm()">
                <input type="hidden" id="product" name="product">
                <input type="hidden" id="price" name="price">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="payment-method">Payment Method:</label>
                <select id="payment-method" name="payment-method" required>
                    <option value="" disabled selected>Select Payment Method</option>
                    <option value="gcash">GCash</option>
                    <option value="maya">Maya</option>
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
         function openModal(product, price) {
            document.getElementById('product').value = product;
            document.getElementById('price').value = price;
            document.getElementById('checkoutModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('checkoutModal').style.display = 'none';
        }

        function submitForm() {
            const email = document.getElementById('email').value;
            const paymentMethod = document.getElementById('payment-method').value;

            const data = new FormData();
            data.append('email', email);
            data.append('payment-method', paymentMethod);

            fetch('fetch_payment_details.php', {
                method: 'POST',
                body: data
            })
            .then(response => response.text())
            .then(data => {
                alert(`Payment Confirmation: \nEmail: ${email}\nPayment Method: ${paymentMethod}\n\nServer Response: ${data}`);
                closeModal();
            })
            .catch(error => {
                console.error('Error:', error);
            });

            return false;
        }

        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('checkoutModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        function fetchPaymentDetails(email, paymentMethod) {
            const data = new FormData();
            data.append('email', email);

            fetch('fetch_payment_details.php', {
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                } else {
                    document.getElementById('confirmationEmail').textContent = data.email;
                    document.getElementById('confirmationPaymentMethod').textContent = data.paymentMethod;
                    document.getElementById('confirmationModal').style.display = 'flex'; // Display the confirmation modal
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function submitForm() {
            const email = document.getElementById('email').value;
            const paymentMethod = document.getElementById('payment-method').value;

            const data = new FormData();
            data.append('email', email);
            data.append('payment-method', paymentMethod);

            fetch('submit_payment.php', {
                method: 'POST',
                body: data
            })
            .then(response => response.text())
            .then(data => {
                alert(`Payment Confirmation: \nEmail: ${email}\nPayment Method: ${paymentMethod}\n\nServer Response: ${data}`);
                closeModal();
                // Call fetchPaymentDetails after successful form submission
                fetchPaymentDetails(email, paymentMethod);
            })
            .catch(error => {
                console.error('Error:', error);
            });

            return false;
        }
    </script>
  <script src="index.js"></script>
</body>
</html>
</body>
</html>
