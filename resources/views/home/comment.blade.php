<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .contact-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            width: 800px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Contact Form Styles */
        .contact-form {
            flex: 1;
            padding-right: 20px;
        }

        /* Contact Information Styles */
        .contact-info {
            flex: 1;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Form Group Styles */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        /* Label Styles */
        .form-group label {
            display: block;
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 5px;
        }

        /* Input Styles */
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Submit Button Styles */
        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Contact Information Styles */
        .contact-info h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .contact-info p {
            margin: 0;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <center>
            @if (Session::has('message'))
            <div class="alert alert-success text-center d-flex">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif
            <section class="contact-container">
                <!-- Contact Form -->
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form action="{{route('commentspost')}}" method="post">
                        @csrf
                        <!-- Input: Name -->
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <!-- Input: Email -->
                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <!-- Input: Message -->
                        <div class="form-group">
                            <label for="message">Your Message:</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit">Send Message</button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <p><strong>Email:</strong> info@example.com</p>
                    <p><strong>Phone:</strong> +1 (123) 456-7890</p>
                    <p><strong>Address:</strong> 123 Main Street, Cityville</p>
                </div>
            </section>
        </center>
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2023 Created By Brijesh Fotariya <br>

                Distributed By <a href="https://github.com/brijeshlembits" target="_blank">Brijesh Fotariya</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>