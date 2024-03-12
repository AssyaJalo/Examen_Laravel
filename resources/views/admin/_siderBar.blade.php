<div id="layoutSidenav" >
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-primary text-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav ">
                            <a class="nav-link" href="{{ route('register') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                Tableau De Bord
                            </a>
                            
                            <a class="nav-link" href="{{ route('listeVehicule') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-car" aria-hidden="true"></i></div>
                                Gestion des Vehicules
                            </a>
                            <a class="nav-link" href="{{ route('listeChauffeur') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-id-card" aria-hidden="true"></i></i></div>
                                Chauffeurs
                            </a>
                            <a class="nav-link" href="{{ route('listeClient') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></i></div>
                              Clients
                            </a>
                            <a class="nav-link" href="{{ route('listeLocation') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></i></div>
                                Gestion des Locations
                            </a>
                            <a class="nav-link" href="{{ route('listeTarif') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></i></div>
                                Gestion des Tarifs
                            </a>
                            <a class="nav-link" href="{{ route('listeEvaluation') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></i></div>
                                Evaluations
                            </a>
                            <a class="nav-link" href="{{ route('CountVehicule') }}" >
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></i></div>
                                Suivus
                            </a>
                        </div>
                    </div>
                    
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-2">

 