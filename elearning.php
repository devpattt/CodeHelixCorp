
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='elearning.css' rel='stylesheet'>
    <link rel="stylesheet" href="index.css">
    <title>e-learning</title>
</head>
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
<body>

    <nav>
        <div class="logo">
            <a href="#">CodeHelixCorp</a>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="about.php">About us</a>
        </div>
    </nav>

    <div class="main">
        <div class="info">
            <h1>CodeHelixCorp<br>E-Learning Materials</h1>
            <p>Embark on a journey through the digital realm, where cyber sentinels stand guard and knowledge reigns supreme, 
                in our eLearning material on cybersecurity.</p>
         
        </div>
       
    </div>

    <div class="separator">
        <h4>E-Learning Materials</h4>
    </div>

    <div class="featured" id="Featu">
    <div class="item">
        <img src="img/pikpik1.png">
        <div class="details">
            <h3>Tips on how to secure your privacy online</h3>
            <div class="item-info">
                <h4>E-Learning Material #1</h4>
            </div>
            <p>Learn essential practices for protecting your personal information on the internet. This includes using strong, unique passwords, enabling two-factor authentication, being cautious with public Wi-Fi, and regularly updating your software and privacy settings to keep your data secure.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/pipik2.png">
        <div class="details">
            <h3>Learn to be safe Online</h3>
            <div class="item-info">
                <h4>E-Learning Material #2</h4>
            </div>
            <p>Access a comprehensive collection of resources designed to enhance your understanding of cyber security. These materials include tutorials, articles, and interactive content covering a wide range of topics from basic security principles to advanced threat mitigation techniques.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/pikpik3.png">
        <div class="details">
            <h3>Cyber security learning materials</h3>
            <div class="item-info">
                <h4>E-Learning Material #3</h4>
            </div>
            <p>Understand the various types of cyber security threats, including malware, ransomware, phishing, and DDoS attacks. Learn how these threats operate, their potential impact, and the best practices for preventing and responding to such incidents.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/pikpik4.png">
        <div class="details">
            <h3>Cyber security threats</h3>
            <div class="item-info">
                <h4>E-Learning Material #4</h4>
            </div>
            <p>Gain a foundational understanding of cyber security, including its importance, key concepts, and the roles and responsibilities of individuals and organizations in maintaining digital security. This section provides a broad overview suitable for beginners.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/pikpik5.png">
        <div class="details">
            <h3>Understand Cyber Security</h3>
            <div class="item-info">
                <h4>E-Learning Material #5</h4>
            </div>
            <p> Delve into curated learning materials that offer in-depth knowledge on specific cyber security topics. These resources are structured to help learners build a solid foundation and progress to more complex subjects in the field of cyber security.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>

    <div class="item">
        <img src="img/e-learning 33.png">
        <div class="details">
            <h3>Cyber Security Learning Material</h3>
            <div class="item-info">
                <h4> E-Learning Material #6</h4>
            </div>
            <p>Revisit critical tips for protecting your online privacy, emphasizing practical steps and tools. This includes advice on managing digital footprints, securing communications, and understanding the privacy policies of the services you use.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/e-learning 2.png">
        <div class="details">
            <h3>Tips on how to secure your privacy online</h3>
            <div class="item-info">
                <h4>E-Learning Material #7</h4>
            </div>
            <p> Explore a variety of learning materials tailored for different levels of expertise. Whether you are a beginner or an advanced user, find resources that cater to your needs, including video tutorials, hands-on labs, and detailed guides.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/e-learning 3.png">
        <div class="details">
            <h3>Cyber security learning materials</h3>
            <div class="item-info">
                <h4>E-Learning Material #8</h4>
            </div>
            <p>Engage with a diverse set of educational content aimed at improving your cyber security skills. This section offers access to webinars, e-books, and practice scenarios that simulate real-world security challenges.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/pikpik3.png">
        <div class="details">
            <h3>Cyber security learning materials</h3>
            <div class="item-info">
                <h4>E-Learning Material #9</h4>
            </div>
            <p>Immerse yourself in extensive learning resources designed to deepen your knowledge of cyber security. This includes case studies, research papers, and expert interviews that provide insights into the latest trends and developments in the cyber security landscape.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
    <div class="item">
        <img src="img/pikpik3.png">
        <div class="details">
            <h3>Cyber security learning materials</h3>
            <div class="item-info">
                <h4>E-Learning Material #10</h4>
            </div>
            <p>Explore a variety of learning materials tailored for different levels of expertise. Whether you are a beginner or an advanced user, find resources that cater to your needs, including video tutorials, hands-on labs, and detailed guides.</p>
            <a href="#" onclick="openModal('Product 1', 250)">Buy Now <i class='bx bx-link-external'></i></a>
        </div>
    </div>
</div>


    <footer>
        <div class="socials">
            <i class='bx bxl-facebook-square'></i>
            <i class='bx bxl-instagram'></i>
            <i class='bx bxl-twitter'></i>
            <i class='bx bxl-linkedin-square'></i>
        </div>
        <p>Copyright ©2024, All rights reserved.</p>
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
    <script src="script.js"></script>

</body>

</html>
