<?php require_once 'template/public/inc/header.php';
$user = (isset($_SESSION['user']) ? $_SESSION['user'] : []);
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="css-user/profile.css">

<style>
section {
  display: flex;
  flex-wrap: wrap;
  background-image: url("https://media.istockphoto.com/id/1286354786/vector/dark-prism-textured-abstract-background.jpg?s=170667a&w=0&k=20&c=BjdLgLPbEZT_SAv11uan7CeFdIJVmliFQb6KEZz71aY=");
  background-size: 100%;
  background-attachment: fixed;
  padding-left: 5px;
  padding-right: 5px;
}

.div-vanban {
  color: white;
  width: 90%;
  max-width: 800px;
  margin-top: 80px;
  margin: 80px auto;
  border: 1px white solid;
  padding: 40px;
  border-radius: 20px;
}
</style>


<section id="advertisement" style="background-color: black;">
    <div class="container-sm"></div>
</section>

<section>
    <div class="div-vanban">
      <h1>NIKE Customer information</h1>
      <p>Customer Privacy Policy is a statement that explains how our website collects, processes, stores, shares,
        protects and uses your personal and sensitive information. customers through their interactions with the
        website.</p>
      <h3>Purpose of customer information privacy policy</h3>
      <p>The purpose of the customer information privacy policy is to:</p>
      <ol>
        <li>Inform customers about privacy data collection and how it is used.</li>
        <li>Provide customers with the option to opt out of data collection.</li>
        <li>Allow customers to access, modify or dispute the accuracy of their data.</li>
        <li>Assure customers that their data is safe and secure.</li>
        <li>Compliance with legal regulations on privacy of personal information.</li>
      </ol>
      <h3>Types of Information Collected</h3>
      <p>Our shoe sales website may collect the following types of information from customers:</p>
      <ol>
        <li>Personal Information: Including name, address, phone number, email, date of birth, gender and other
          information voluntarily provided by customers when registering for an account, placing an order, contacting or
          participate in website promotions.</li>
        <li>Payment information: Including bank account number, payment card number, security code and related
          information when customers pay for orders on the website.</li>
        <li>Information about website activity: Includes visit history, purchase history, interaction history with
          content and advertising on the website.</li>
        <li>Device and connection information: Including IP address, browser type, operating system type, device type
          and related information when customers visit the website.</li>
      </ol>
      <h3>Cookie Policy</h3>
      <p>Cookie is a small file that is stored on a customer's computer or mobile device when accessing a website.
        Cookies help the website identify customers and remember their preferences and choices.</p>
      <p>Our website that sells shoes uses cookies for the following purposes:</p>
      <ol>
        <li>Improving user experience: Cookies help the website display content tailored to the interests and needs of
          customers, such as languages, regions, favorite products...</li>
        <li>Effective analysis and evaluation: Cookies help the website to track the number of visits, bounce rate,
          conversion rate and other metrics to evaluate the effectiveness of the website and marketing campaigns.</li>
        <li>Advertising and Marketing: Cookies help the website to display advertisements and marketing content tailored
          to the preferences and purchasing behavior of customers, and measure the effectiveness of those advertisements
          and content. .</li>
      </ol>
      <p>Customers can accept or refuse to use cookies when accessing the website. However, if you refuse cookies, some
        website features and services may not work properly.</p>
      <h3>Instances where data can be released</h3>
      <p>Our shoe selling website commits not to sell, rent, exchange or share customer's personal information to any
        third party without the customer's consent, unless there is a in the following cases:</p>
      <ol>
        <li>There is a request from a competent state agency in accordance with the law.</li>
        <li>Having express consent of customers when participating in promotions or cooperating with website partners.
        </li>
        <li>Necessary to protect the legitimate rights and interests of the website or customers in the event of a
          dispute or complaint.</li>
        <li>Needed to perform transactions or provide services to customers, e.g. delivery, payment, warranty...</li>
      </ol>
      <h3>How information is collected, shared or even sold</h3>
      <p>Our shoe selling website collects customers' personal information through the following forms:</p>
      <ol>
        <li>Customers voluntarily provide information when registering an account, placing an order, contacting or
          participating in promotions of the website.</li>
        <li>The customer voluntarily allows the website to use cookies to collect information about the customer's
          activity on the website and device and connection.</li>
        <li>Customers voluntarily provide payment information when paying for orders on the website.</li>
      </ol>
      <p>Our shoe sales website only shares customers' personal information with third parties in the cases outlined
        above. Our shoe sales website never sells customers' personal information to anyone.</p>
    </div>
  </section>

<?php require_once 'template/public/inc/footer.php' ?>
