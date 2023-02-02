<?php
    require_once('./Config/Connection.php');
    require_once('./Functionalities/Helpers.php');
    session_start();

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./Assets/Styles.css">
    <link rel="shortcut icon" href="./Assets/Img/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7483adbd94.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <title>BurguerStore</title>
</head>
<body>
    <section id="login">
        <i class="fas fa-times close"></i>
        <div class="div_forms">
            <?php if(isset($_SESSION['identity'])) : ?>
                <form action="./Functionalities/Update.php" method="POST" autocomplete="off">
                    <h2>Actualizar datos</h2>
                    
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    <input type="number" name="dni" placeholder="Dni" required>
                    <input type="text" name="address" placeholder="Direccion" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="submit" value="Actualizar datos">

                    

                    <a href="./Functionalities/Logout.php" class="logout">Cerrar sesión</a>
                </form>


            <?php else: ?>
                <form action="./Functionalities/Login.php" method="POST" autocomplete="off" class="div_forms--login">
                    <h2>Login</h2>
                    <?php if(isset($_SESSION['login_failed'])) : ?>
                        <div class="failed">
                            <?= $_SESSION['login_failed'] ?>
                        </div>
                    <?php endif; ?>
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="submit" value="Ingresar">
                </form>

                <form action="./Functionalities/Register.php" method="POST" autocomplete="off">
                    <h2>Registro</h2>
                    <?php if(isset($_SESSION['register_success'])) : ?>
                        <div class="success">
                            Registro exitoso!!!
                        </div>
                    <?php elseif(isset($_SESSION['register_failed'])): ?>
                        <div class="failed">
                            Registro fallido
                        </div>
                    <?php endif; ?>
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    <input type="number" name="dni" placeholder="Dni" required>
                    <input type="text" name="address" placeholder="Direccion" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="submit" value="Registrarse">
                </form>
            <?php endif; ?>
        </div>
        
    </section>

    <section id="cart">
        <i class="fas fa-times close closeCart"></i>
        <div class="cart_table">
            <h2>Mi carrito de compras</h2>

            <?php if(isset($_SESSION['carrito'])) : ?>
                <table class="table w-100 m-auto">
                    <thead class="fs-3 text-center">
                        <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                        <?php foreach ($_SESSION['carrito'] as $key): ?>
                            <tr class="fs-3 text-center">
                                <td class="w-25">
                                    <img style="width: 3rem;" src="./Assets/Img/<?= $key['img'] ?>">
                                </td>
                                <td class="w-25">
                                    <?= $key['name'] ?>
                                </td>
                                <td class="w-25"><?= $key['price'] ?></td>
                                <td class="w-25"><?= $key['quantity'] ?></td>
                            </tr>
                        <?php endforeach; ?>                    
                    </tbody>
                </table>
                        <?php $sum = 0;
                            foreach ($_SESSION['carrito'] as $cart): ?>
                                <?php $sum += $cart['price'];  ?>
                            <?php endforeach; ?>

                        <a href="./Functionalities/ClearCart.php">Vaciar carrito</a>
                        <h4>Total a pagar: <?= $sum ?> $</h4>
            <?php else: ?>
                <h4>No hay productos agregados al carrito</h4>
            <?php endif; ?>
            
        </div>
    </section>

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
                <?php if(logged()) : ?>
                   
                    <button class="div-contact-header-2-cart">(<?php isset($_SESSION['carrito']) ? print_r(count($_SESSION['carrito'])) : print_r("0") ?>)<i class="fas fa-shopping-cart"></i></button>
                    <button class="div-contact-header-2-a"><?= $_SESSION['identity']['email'] ?></button>
                <?php else: ?>
                    <button class="div-contact-header-2-a">Login</button>    
                <?php endif; ?>
                
            </div>
        </div>
        
    </section>


    <header id="header">
        <div class="center">
            <img src="./Assets/Img/Logo.png" alt="Logo">

            <button class="btn_navbar"><i class="fas fa-bars"></i></button>

            <nav id="navbar" class="active">
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
            <div class="center">
                <h2 class="section-title">-Sobre nosotros-</h2>
                <div data-aos="fade-right">
                <div class="about-info">
                    <img src="./Assets/Img/Logo.png" alt="Logo">
                    <div>
                        <h2>Somos Burguer Store</h2>
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
            <?php if(!logged()) : ?>
                <p>Tenés que estar logueado para agregar productos al carrito</p>
            <?php endif; ?>
            <div data-aos="fade-up">
                <div class="menu-container">
                    <?php
                        $query = mysqli_query($connection,"SELECT * FROM burguers ORDER BY price ASC");
                        while ($view = mysqli_fetch_assoc($query)):                    
                    ?>
                        
                        <div class="menu-container__card">
                            <img src="./Assets/Img/<?= $view['image'] ?>">
                            <?php if(logged()) : ?>
                            <form action="./Functionalities/Cart.php" method="POST">
                                <input type="text" name="id" value="<?= $view['id'] ?>" class="ipt_img">
                                <input type="text" name="name" value="<?= $view['name'] ?>" class="ipt_name" readonly >
                                <input type="text" name="price" value="<?= $view['price'] ?>" class="ipt_price" readonly >
                                <input type="text" name="image" value="<?= $view['image'] ?>" class="ipt_img">

                                <button type="submit">Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
                                
                                    
                            </form>
                            <?php else: ?>
                                <input type="text" name="name" placeholder="<?= $view['name'] ?>" class="ipt_name" readonly >
                                <input type="text" name="price" placeholder="<?= $view['price'] ?>" class="ipt_price" readonly >
                                <input type="text" name="image" placeholder="<?= $view['image'] ?>" class="ipt_img">

                                <button>Añadir al carrito <i class="fas fa-shopping-cart"></i></button>
                            <?php endif; ?>
                            
                            
                            
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
                <div class="swiper reviews-slider">

                    <div class="swiper-wrapper">
                        
                            <div class="swiper-slide box">
                                <img src="./Assets/Img/Person1.jfif" alt="">
                                <h3>Tiziano</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis optio dignissimos eaque aliquid explicabo.</p>
                            </div>
                            <div class="swiper-slide box">
                                <img src="./Assets/Img/Person2.jfif" alt="">
                                <h3>Yamila</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis optio dignissimos eaque aliquid explicabo.</p>
                            </div>
                            <div class="swiper-slide box">
                                <img src="./Assets/Img/Person3.jfif" alt="">
                                <h3>Marcelo</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis optio dignissimos eaque aliquid explicabo.</p>
                            </div>
                            <div class="swiper-slide box">
                                <img src="./Assets/Img/Person4.jfif" alt="">    
                                <h3>Rodrigo</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis optio dignissimos eaque aliquid explicabo.</p>
                            </div>
                            <div class="swiper-slide box">
                                <img src="./Assets/Img/Person5.jfif" alt="">
                                <h3>Mónica</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis optio dignissimos eaque aliquid explicabo.</p>
                            </div>
                            <div class="swiper-slide box">
                                <img src="./Assets/Img/Person6.jfif" alt="">
                                <h3>Mariana</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates blanditiis optio dignissimos eaque aliquid explicabo.</p>
                            </div>
                            </div>
                    </div>


                    <div class="swiper-pagination"></div>
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
                                <p>Av. Lorem Ipsum 1200, CABA</p>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./Main.js"></script>
    


   
</body>
</html>

