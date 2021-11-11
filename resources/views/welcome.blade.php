@extends('layouts.template') {{-- use el template.blade.php --}}

@section('extras')
    @foreach ($extras as $extra)
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="{{$extra->foto}}" alt="..."  />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Carlos Tontaquimba</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">{{$extra->conocimientos}}</p>
        {{-- <p class="masthead-subheading font-weight-light mb-0">Desarrollador web <br>Técnico en mantenimiento y reparación de computadoras<br>Editor de imágenes</p> --}}
    </div>
    @endforeach
        
@endsection

@section('content')
    @foreach ($proyectos as $proyecto)
        <!-- Portfolio Item 1-->
        <div class="col-md-6 col-lg-4 mb-5">
            <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal{{$proyecto->id}}">
                <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                    <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                </div>
                <img class="img-fluid" src="{{$proyecto->imagen}}" alt="..." />
            </div>
        </div>
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal{{$proyecto->id}}" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$proyecto->nombre}}</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="{{$proyecto->imagen}}" alt="..." width="320px" height="320px"/>
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">{{$proyecto->descripcion}}</p>
                                    <a href="{{$proyecto->url}}" class="btn btn-primary">
                                        <i class="fas fa-times fa-fw"></i>
                                        Visitar proyecto
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endforeach
@endsection

@section('contact')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<section class="page-section bg-primary text-white mb-0" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">Contáctame</h2>
         <!-- Icon Divider-->
         <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form action="{{route('contactos.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Nombre/Apellido</label>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Correo</label>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" name="telefono" id="telefono" type="number" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Teléfono</label>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="mensaje" id="mensaje" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Mensaje</label>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                   
                    <button class="btn btn-primary btn-xl " id="" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('about')
    @foreach ($extras as $extra)
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">¿ Quién soy ?</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row text-justify">
                    <div class="col-lg-12"><p class="lead">{{$extra->acercade}}</p></div>
                </div>
            </div>
        </section>
    @endforeach
@endsection

@section('habilities')
    <section class="page-section portfolio" id="habilities">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">HABILIDADES</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <div class="container">
                    <div class="row">
                    <div class="col">
                        <!-- Carousel wrapper -->
                            <div
                            id="carouselMultiItemExample"
                            class="carousel slide carousel-dark text-center"
                            data-mdb-ride="carousel"
                            >

                            <!-- Inner -->
                            <div class="carousel-inner py-4">
                            
                            <!-- Single item -->
                            <div class="carousel-item active">
                                <div class="container">
                                <div class="row">
                                    @foreach ($habilidades as $habilidad)
                                    <div class="col-lg-4">
                                        <div class="card">
                                                <img
                                                src="{{$habilidad->imagen}}"
                                                class="card-img-top"
                                                alt="..."
                                                />

                                            
                                            <div class="card-body">
                                            <h5 class="card-title">{{$habilidad->descripcion}}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                
                                
                                </div>
                                </div>
                            </div>

                            </div>
                            <!-- Inner -->
                            </div>
                            <!-- Carousel wrapper -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection