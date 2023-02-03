





<!-- PROJECT LOGO -->
<br />
<div align="center">
<br />
  <a href="https://proteksyon.ml/">
    <img src="https://i.imgur.com/9ZOK5iN.png" alt="Logo" width="350">
  </a>
<br /><br />
  <p align="center">
    Creating an easiest way to share your social media links!
    <br />
    <a href="https://proteksyon.ml/"><strong>View Demo »</strong></a>
    <br />
    <br />
    <a href="https://proteksyon.ml/user">User</a>
    ·
    <a href="https://proteksyon.ml/establishment">Establishment</a>
    ·
    <a href="https://proteksyon.ml/scanner">Scanner</a>
    ·
    <a href="https://proteksyon.ml/admin ">Admin</a>
    ·
    <a href="https://github.com/mashwishi/proteksyon/issues">Report Bug</a>
    ·
    <a href="https://github.com/mashwishi/proteksyon/issues">Request Feature</a>
  </p>
</div>


[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about">About</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    <li><a href="#built-with">Built With</a></li>
    </li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contributors">Contributors</a></li>
  </ol>
</details>

<!-- GETTING STARTED -->
## About
"Proteksyon" is the name given to the "Multi-Platform Contact Tracing with QR Verification System". This solution aims to provide a comprehensive and user-friendly approach to contact tracing, utilizing QR codes and cross-platform compatibility to ensure widespread adoption and accessibility. With a focus on privacy and security, Proteksyon has been designed to effectively combat the spread of infectious diseases, while also protecting sensitive personal information.

The "Multi-Platform Contact Tracing with QR Verification System" is an innovative solution designed to help mitigate the spread of infectious diseases through contact tracing. By leveraging QR codes and cross-platform compatibility, this system provides a convenient and efficient means of tracing individuals who may have come into close contact with an infected individual. With a focus on privacy and security, this system has been developed to ensure that sensitive personal information is protected, while still providing the necessary data for effective contact tracing efforts.

"Proteksyon" is a web-based solution built using the PHP Object-Oriented Programming (OOP) language and the MySQL relational database management system. To enhance its capabilities, the system also leverages service workers to provide a Progressive Web Application (PWA) experience. This combination of technologies enables Proteksyon to deliver a highly responsive and reliable contact tracing experience, while also providing robust storage and management of contact tracing data. With its user-friendly interface and cutting-edge technology, Proteksyon represents a significant step forward in the fight against infectious diseases.

"Proteksyon" was created as part of a thesis or website development project, with the goal of providing an effective solution for contact tracing in the context of infectious disease outbreaks. By utilizing PHP OOP, MySQL, and service workers, the Proteksyon team was able to build a highly scalable and user-friendly platform for contact tracing. The system has been designed to deliver a comprehensive solution for tracking close contacts and mitigating the spread of infectious diseases, while also ensuring the privacy and security of sensitive personal information. As a result of their efforts, the Proteksyon team has made a significant contribution to the field of contact tracing and infectious disease management.

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/mashwishi/proteksyon.git
   ```
2. Import database to your MySQL, File name:
   ```sh
   proteksyon.sql
   ```
3. Enter your database connection at `db_conn.php`
    ```php
    $sName = "localhost";
    $uName = "root";
    $pass = "";
    $db_name = "proteksyon";
    ```
4. Login the admin with the sample credentials
    ```sh
     Website: https://proteksyon.ml/admin 
     Email: admin@proteksyon.ph
     Password: admin
    ```

### Built With

This section list of major frameworks/libraries we used to our your project. 

* [![php][php]][php]
* [![mysql][mysql]][mysql]

<!-- ROADMAP -->
## Roadmap

- [x] User Module
- [x] Admin Module
- [x] Establishment Module
- [x] Scanenr Module
- [x] Email Verification
- [x] Captcha
- [x] Print Module
- [x] Export Module
- [x] Time log Module
- [x] Establishment Time Module

See the [open issues](https://github.com/mashwishi/proteksyon/issues) for a full list of proposed features (and known issues).


<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the GNU License. See `LICENSE.txt` for more information.


<!-- Contributors / Collaborators -->
## Contributors / Collaborators

[@Mashwishi](https://github.com/Mashwishi), [@Exarus](https://github.com/Exaruss)

<!-- Partners -->
## Partners

<!-- Sponsors -->
## Sponsors





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/mashwishi/proteksyon.svg?style=for-the-badge
[contributors-url]: https://github.com/mashwishi/proteksyon/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/mashwishi/proteksyon.svg?style=for-the-badge
[forks-url]: https://github.com/mashwishi/proteksyon/network/members
[stars-shield]: https://img.shields.io/github/stars/mashwishi/proteksyon.svg?style=for-the-badge
[stars-url]: https://github.com/mashwishi/proteksyon/stargazers
[issues-shield]: https://img.shields.io/github/issues/mashwishi/proteksyon.svg?style=for-the-badge
[issues-url]: https://github.com/mashwishi/proteksyon/issues
[license-shield]: https://img.shields.io/github/license/mashwishi/proteksyon.svg?style=for-the-badge
[license-url]: https://github.com/mashwishi/proteksyon/blob/main/LICENSE

[product-screenshot]: images/screenshot.png

[php]: https://img.shields.io/badge/php-5851EB?style=for-the-badge&logo=php&logoColor=white
[php]: https://www.php.net/

[mysql]: https://img.shields.io/badge/MySQL-E17511?style=for-the-badge&logo=mysql&logoColor=42759C 
[mysql]: https://www.mysql.com/
