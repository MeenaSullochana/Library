<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
         include "plugin/css.php";
      ?>
</head>

<body>


    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-chevrons-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <header>
        <!-- header-area-start -->
        <!-- Start Top Header -->

        @include("header.top_header")
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->

        @include("header.middile_navigation")
        @include("header.navigation")
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->

        @include("header.mobile_navigation")
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->

    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Guidelines</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- faq-area-start -->
        <section class="faq-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-1">
                        <div class="tpfaq__content mr-50">
                            <h2 class="tpfaq__title text-danger">General Guidelines</h3>
                            <p style="text-align: justify;"><b> Registration and Application </b>Register on the dedicated portal and submit applications for book selection as per the announced schedule. Ensure each book has an International Standard Book Number (ISBN) for eligibility.
                            </p>
                            <p><b>Authorization for Distribution (For Distributors and Publisher cum Distributors)</b> Attach an authorization letter from publishers, confirming the right to distribute their books, ensuring legal and transparent distribution processes.</p>
                            <p><b>Submission of Materials</b> Upload digital excerpts (20-25 pages in epub or pdf format) for initial review. Also, provide specified numbers of print copies for detailed evaluation and verification of metadata.</p>
                            <p><b>Copies to be Submitted for Review and Selection</b> 5 copies. Archiving purpose: To comply with the Delivery of Books (Public Libraries) Act, 1954, send one copy of all published books to Connemara Public Library. Additionally, send one copy to state libraries such as Anna Centenary Library,Chennai and Kalaignar Centenary Library in Madurai for archiving of Books. 
                                Review purpose:  send two copies for review of books in Chennai for review. Address to be sent: Anna Centenary Library, Chennai.
                                </p>
                            <p><b>Quality Assurance</b> Ensure submissions meet the prescribed quality standards in paper, printing, and binding. Non-compliant books will be rejected.</p>
                            <p><b>Pricing and Negotiation</b> Be prepared for price negotiations, adhering to the Price Index developed by the Directorate of Public Libraries, taking into account cost factors including paper quality, printing,binding, prepress work, royalty, translation cost etc.</p>
                            <p><b>Prohibition of Unfair Practices</b> Engaging in unfair practices will lead to disqualification from the procurement process for a specified period.</p>
                            <p><b> Payment of Application Fee</b> An application fee is required for each book submission to ensure serious submissions and cover evaluation costs.</p>
                            <p><b>Adherence to Selection Process</b> Selection is based on evaluations from the Selection Committee, subject experts, librarians, and users, using a consolidated point marking system.</p>
                            <p><b>Delivery Commitments</b> Ensure timely delivery of required copies to designated libraries once selected for procurement.</p>
                            <p><b>Ethical Standards</b> Maintain high ethical standards; strictly prohibit and penalize copyright infringement, false representation, and low-quality publications to preserve the integrity and quality of library collections.</p>
                            <p><b>Central Facility for Sending purcharsed  Books</b> It is mandatory to send selected books to the “central facility” in Chennai, from where the official delivery partner distributes the books  to various libraries across Tamil Nadu.
                            </p>
                            <p><b>Duration of availability for Chosen Books for purchase</b> Chosen books will be available for purchase for two years. If not selected within this period, books will be removed from the list in chronological order and archived.</p>
                            <p><b>Policy and Government Order Review</b> Regularly review the Transparent Book Procurement Policy and government orders for updates and detailed information to stay informed and aligned.
                            </p>
                            <p>These guidelines are designed to streamline the procurement process, promoting transparency, ensuring quality, and enhancing the diversity of library collections.</p>
                            <ul>
                            
                               
                            </ul>

                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-area-end -->
    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>

</body>

</html>
