<app-web>
    <style>
        .bg-green {
            background-color: #C6BE4D;
        }


        .color-darkgreen {
            color: #464202;
        }

        @media (min-width: 992px) {

            .bg {
                background: url('img/bg.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
            }

            .custom-vh-100 {
                height: 100vh;
            }
        }
    </style>
    <section class="bg d-flex justify-content-start align-items-center custom-vh-100">
        <div class="container ">
            <div class="row">
                <div class="col-xl-5 text-center text-md-start">
                    <h1 class="display-6 h6 mb-3 mt-5 mt-md-0">¡Descubre una forma deliciosa de comer de manera saludable!</h1>
                    <img class="img-fluid d-md-none text-center" src="{{ asset('img/banner-movil.png') }}" alt="">
                    <h2 class="h6 mb-3">¡Regístrate para recibir las últimas novedades sobre alimentación saludable!</h2>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-12 col-sm-7 col-md-5 col-lg-4 col-xl-4">
                    @if ($registrationSuccessful == false)
                        <form wire:submit.prevent="save" class="shadow-lg p-3 rounded-3 bg-white ">
                            <x-input.group label="Nombres:" for="name" :error="$errors->first('name')">
                                <x-input.text wire:model="name" :error="$errors->first('name')" id="name" />
                            </x-input.group>
                            <x-input.group label="Apellidos:" for="last_name" :error="$errors->first('last_name')">
                                <x-input.text wire:model="last_name" :error="$errors->first('last_name')" id="last_name" />
                            </x-input.group>
                            <x-input.group label="Email:" for="email" :error="$errors->first('email')">
                                <x-input.text wire:model="email" :error="$errors->first('email')" id="email" />
                            </x-input.group>
                            <x-input.group label="Teléfono:" for="phone" :error="$errors->first('phone')">
                                <x-input.text wire:model="phone" :error="$errors->first('phone')" id="phone" maxlength="9" />
                            </x-input.group>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-green text-black">Enviar</button>
                            </div>
                        </form>
                    @else
                        <div class="shadow-lg p-3 rounded-3 bg-white text-center py-5">
                            <h4>¡Gracias por registrarte! <br>
                                Se te enviará un correo con las novedades de la aplicación.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="bg-green">
        <div class="container py-5">
            <div class="row justify-content-around">
                <div class="col-11 col-xl-4 align-self-center">
                    <img class="img-fluid" src="{{ asset('img/phone-app.png') }}" alt="">
                </div>
                <div class="col-11 col-xl-6  color-darkgreen">
                    <h2 class="h3 text-center text-md-start fw-bold mb-3">¿Qué ofrecemos?</h2>
                    <ol class="h6 ">
                        <li class="mb-2"><b>Recomendaciones personalizadas:</b> Pronto podrás disfrutar de
                            recomendaciones
                            personalizadas de
                            platos y dietas adaptadas a tus preferencias y objetivos de salud. Queremos asegurarnos de
                            brindarte una experiencia única y relevante en tu viaje hacia una alimentación saludable.
                        </li>
                        <li class="mb-2"><b>Novedades exclusivas:</b> Al registrarte, te mantendremos al tanto de las
                            últimas
                            novedades,
                            actualizaciones y lanzamientos de la aplicación. Serás el primero en enterarte de nuevas
                            funciones, recetas destacadas, consejos de expertos y más.
                        </li>
                        <li class="mb-2"><b>Acceso anticipado:</b> Como miembro registrado, tendrás la oportunidad de
                            obtener acceso
                            anticipado a la aplicación antes de su lanzamiento oficial. Podrás explorar las
                            características y funcionalidades exclusivas y compartir tus comentarios para ayudarnos a
                            mejorar aún más.
                        </li>
                        <li class="mb-2"><b>Participación en la comunidad:</b> Únete a una comunidad activa de
                            entusiastas de la
                            alimentación saludable. Comparte tus ideas, sugerencias y recetas favoritas con otros
                            usuarios. Juntos, podemos crear un espacio colaborativo donde todos podamos aprender y
                            crecer en nuestros objetivos de bienestar.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
</app-web>
