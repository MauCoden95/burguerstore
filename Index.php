<?php
    require_once('./Config/Connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Styles.css">
    <link rel="shortcut icon" href="./Assets/Img/Logo.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7483adbd94.js" crossorigin="anonymous"></script>
    <title>BurguerStore</title>
</head>
<body>
    <section id="div-contact-header">
        <div class="center">
            <div class="div-contact-header-1">
                <h3><i class="fas fa-envelope"></i> burguershop@email.com</h3>
                <h3><i class="fas fa-phone"></i> (54 11) 4999-1200</h3>
            </div>
            <div class="div-contact-header-2">
                <a href="" class="fab fa-facebook"></a>
                <a href="" class="fab fa-instagram"></a>
                <a href="" class="fab fa-twitter"></a>
                <a href="" class="fab fa-linkedin"></a>
                <a href="" class="div-contact-header-2-a">Login</a>
            </div>
        </div>
        
    </section>


    <header id="header">
        <div class="center">
            <img src="./Assets/Img/Logo.png" alt="Logo">

            <nav id="navbar">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#about">Nosotros</a></li>
                    <li><a href="#promo">Promos</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#reviews">Reseñas</a></li>
                    <li><a href="#contact">Contacto</a></li>
                </ul>
            </nav>

            <div class="header-info">
                <h3>Días abierto:</h3>
                <p>Lunes a viernes 10 a 00</p>
            </div>
        </div>
    </header>


    <section id="banner">
        <div class="center">
            <h1>Probá nuestra <span>Fantasy Burguer</span></h1>
            <img src="./Assets/Img/Banner.png" alt="Hamburguesa">
        </div>
    </section>


    <section id="about">
        <div data-aos="fade-right">
            <div class="center">
                <h2 class="section-title">-Sobre nosotros-</h2>
                <div class="about-info">
                    <img src="./Assets/Img/Logo.png" alt="Logo">
                    <div>
                        <h2>Somos BurguerStore</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni, ipsa numquam cupiditate repellat ullam veritatis, consequuntur hic quas tenetur eveniet aliquid vitae. Incidunt excepturi deleniti dolore magnam molestiae quidem perferendis.
                        </p>
                        <div class="check-about">
                            <span><i class="fas fa-check-square"></i> Ingredientes frescos</span>
                            <span><i class="fas fa-check-square"></i> Buenos precios</span>
                            <span><i class="fas fa-check-square"></i> Queso natural</span>
                            <span><i class="fas fa-check-square"></i> Productos veganos</span>
                        </div>
                    </div>
                </div>

                <div class="about-services">
                    <div class="about-service__card">
                        <img src="./Assets/Img/fast-delivery.png" alt="Delivery">
                        <h4>Delivery rápido</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="about-service__card">
                        <img src="./Assets/Img/best-price.png" alt="Delivery">
                        <h4>Buenos precios</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="about-service__card">
                        <img src="./Assets/Img/burguer.png" alt="Delivery">
                        <h4>Buena calidad</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        
    </section>


    <section id="promo">
        
        <div class="center">
            <h2 class="section-title">-Nuestras promos-</h2>
            <div data-aos="fade-left">
                <div class="div-promos">
                    <img src="./Assets/Img/Promo1.png" alt="Promo1">
                    <img src="./Assets/Img/Promo2.png" alt="Promo2">
                    <img src="./Assets/Img/Promo3.png" alt="Promo3">
                </div> 
            </div>
           
            <div data-aos="fade-right">
                <div class="div-promos">
                    <img src="./Assets/Img/Promo4.png" alt="Promo4">
                    <img src="./Assets/Img/Promo5.png" alt="Promo5">
                    <img src="./Assets/Img/Promo6.png" alt="Promo6">
                </div>
            </div>
            
        </div>
    </section>



    <section id="menu">
        <div class="center">
            <h2 class="section-title">-Menú-</h2>
            <div data-aos="fade-up">
                <div class="menu-container">
                    <?php
                        $query = mysqli_query($connection,"SELECT * FROM burguers");
                        while ($view = mysqli_fetch_assoc($query)):                    
                    ?>
                        
                        <div class="menu-container__card">
                            <img src="./Assets/Img/<?= $view['image'] ?>">
                            <h2><?= $view['name'] ?></h2>
                            <p><?= $view['price'] ?> $</p>
                            <a href="">Añadir al carrito <i class="fas fa-shopping-cart"></i></a>
                        </div>


                    <?php endwhile; ?>
                </div>
            </div>
            
        </div>
    </section>
   

    <section id="reviews">
        <div class="center">
            <h2 class="section-title">-Que dicen nuestros clientes-</h2>
            <div data-aos="fade-right">
                <div class="review-container">
                    <div class="review-card">
                        <img src="./Assets/Img/Person1.jfif" alt="Persona1">
                        <h2>Roberto</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae laudantium veniam, amet vero earum nostrum pariatur totam modi!</p>
                        <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                    </div> 
                    
                    <div class="review-card">
                    <img src="./Assets/Img/Person2.jfif" alt="Persona1">
                        <h2>Jimena</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae laudantium veniam, amet vero earum nostrum pariatur totam modi!</p>
                        <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></span>
                    </div> 

                    <div class="review-card">
                    <img src="./Assets/Img/Person3.jfif" alt="Persona1">
                        <h2>Maximiliano</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae laudantium veniam, amet vero earum nostrum pariatur totam modi!</p>
                        <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                    </div> 
                </div>
            </div>
           
        </div>
    </section>



    <section id="contact">
        <div class="center">
            <h2 class="section-title">-Contacto-</h2>
            <div data-aos="fade-left">
                <div class="contact-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26278.126707582323!2d-58.41389539245921!3d-34.58479111157971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca99c609fc2f%3A0x392ca99351808a75!2sRecoleta%2C%20CABA!5e0!3m2!1ses-419!2sar!4v1674781404751!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="contact-div">
                        <div class="contact-div__info">
                            <div>
                                <i class="fas fa-envelope"></i>
                                <h5>Email</h5>
                                <p>burguershop@email.com</p>
                            </div>

                            <div>
                                <i class="fas fa-phone"></i>
                                <h5>Teléfono</h5>
                                <p>(54 11) 4999-1200</p>
                            </div>

                            <div>
                                <i class="fas fa-map-marked-alt"></i>
                                <h5>Dirección</h5>
                                <p>Av. Lorem Ipsum 1200</p>
                            </div>
                        </div>

                        <form action="" autocomplete="off">
                            <input type="text" name="name" placeholder="Ingrese su nombre">
                            <input type="email" name="email" placeholder="Ingrese su correo">
                            <input type="number" name="phone" placeholder="Ingrese su teléfono">
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </section>



    <footer id="footer">
        <div class="center">
            <div class="footer-nav">
                    <a href="#">Inicio</a>
                    <a href="#about">Nosotros</a>
                    <a href="#promo">Promos</a>
                    <a href="#menu">Menu</a>
                    <a href="#reviews">Reseñas</a>
                    <a href="#contact">Contacto</a>
            </div>

            <div class="footer-copy">
                Burguer Store &copy;2023 Todos los derechos reservados
            </div>
        </div>
    </footer>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./Main.js"></script>
</body>
</html>